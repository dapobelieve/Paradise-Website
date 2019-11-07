<?php

namespace App\Http\Controllers\Dashboard;

use App\Record;
use App\User;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    public function adminStats(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {
            $agents = User::whereHas('roles', function ($query) {
                $query->where('role_id', 2); //sales agent
            })->pluck('id')->toArray();

            $records = Record::whereIn('user_id', $agents)
            ->where('created_at', '>=', Carbon::now()->subDays(30))->get();
            $stats = (new Collection([
                'month' => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->subDays(30));
                }),
                'week'  => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->startOfWeek());
                }),
                'yesterday' => $records->filter(function (Record $record) {
                    $yesterday =  new Carbon($record->created_at->toDateString());
                    return Carbon::yesterday()->dayOfWeek == 0 ? 0 : $yesterday->equalTo(Carbon::yesterday());
                }),
                'today'   => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->startOfDay());
                }),
            ]))->map(static function (Collection $records) {
                return [
                    'total' => number_format((int) $records->count()),
                    'sum'   => number_format($records->sum(static function (Record $record) {
                        return $record->price;
                    }), 2),
                ];
            })->toArray();

            $todaysRecords = Record::latest()
                ->where('created_at', '>=', Carbon::now()->startOfDay())
                ->with('user:id,name')
                ->get();

            return response()->json([
                'stats' => $stats,
                'todaysRecords' => $todaysRecords
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }
    }

    public function yesterday(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {

            $records = DB::select('select users.name, 
                                    sum(price) as amount, 
                                    count(records.id) as transactions from records, users, role_user
                                    where records.user_id = users.id
                                    and users.id = role_user.user_id
                                    and role_user.role_id = 2
                                    and records.created_at >= subdate(curdate(), 1)
                                    and records.created_at < curdate()
                                    group by records.user_id');
            return response()->json([
                'stats' => $records,
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }

    }
}
