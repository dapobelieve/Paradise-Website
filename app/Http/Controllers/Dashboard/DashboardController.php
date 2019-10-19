<?php

namespace App\Http\Controllers\Dashboard;

use App\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
   public function create(Request $request)
   {
       $record = Record::create([
            'user_id' => $request->user,
            'service' => $request->service,
            'price' => (float) $request->price,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'NOT PAID',
            'ref' => str_random(12)
       ]);
   }
    public function agentStatistics(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Agent')) {
            $records = $user->records()
                ->where('created_at', '>=', Carbon::now()->startOfMonth())
                ->get();
            $stats = (new Collection([
                'month' => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->startOfMonth());
                }),
                'week'  => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->startOfWeek());
                }),
                'yesterday' => $records->filter(function (Record $record) {
                    $yesterday =  new Carbon($record->created_at->toDateString());
                    return $yesterday->equalTo(Carbon::yesterday());
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

//            $todaysRecords = $user->records()
//                ->latest()
//                ->where('created_at', '>=', Carbon::now()->startOfDay())
//                ->get();
            $todaysRecords = $user->records()
                ->latest()
                ->where('created_at', '>=', Carbon::now()->startOfDay())
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
}
