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

    public function today(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {

            $records = DB::select('SELECT users.name, 
                                    sum(price) AS amount, 
                                    count(records.id) AS transactions 
                                    FROM role_user, records
                                    JOIN users 
                                    ON records.user_id = users.id
                                    WHERE users.id = role_user.user_id
                                    AND role_user.role_id = 2
                                    AND records.created_at >= curdate()
                                    GROUP BY records.user_id');
            return response()->json([
                'stats' => $records,
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

            $records = DB::select('SELECT users.name, 
                                    sum(price) AS amount, 
                                    count(records.id) AS transactions 
                                    FROM role_user, records
                                    JOIN users 
                                    ON records.user_id = users.id
                                    WHERE users.id = role_user.user_id
                                    AND role_user.role_id = 2
                                    AND records.created_at >= subdate(curdate(), 1)
                                    AND records.created_at < curdate()
                                    GROUP BY records.user_id');
            return response()->json([
                'stats' => $records,
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }

    }

    public function week(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {

            $records = DB::select('SELECT users.name, 
                                    round(sum(price), 2) AS amount, 
                                    count(records.id) AS transactions 
                                    FROM role_user, records
                                    JOIN users 
                                    ON records.user_id = users.id
                                    WHERE users.id = role_user.user_id
                                    AND role_user.role_id = 2
                                    AND records.created_at >= DATE_ADD(curdate(), INTERVAL (-weekday(curdate())) DAY)
                                    GROUP BY records.user_id');
            return response()->json([
                'stats' => $records,
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }

    }

    public function thirtyDays(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {
            $records = DB::select('SELECT users.name, 
                                    round(sum(price), 2) AS amount, 
                                    count(records.id) AS transactions 
                                    FROM role_user, records
                                    JOIN users 
                                    ON records.user_id = users.id
                                    WHERE users.id = role_user.user_id
                                    AND role_user.role_id = 2
                                    AND records.created_at >= CURDATE() - INTERVAL 30 DAY
                                    GROUP BY records.user_id');
            return response()->json([
                'stats' => $records,
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }
    }

    public function users(Request $request)
    {
        $user = User::get();

        return view('admin.add-user')->with('users', $user);
    }
}
