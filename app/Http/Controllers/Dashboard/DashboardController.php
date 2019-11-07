<?php

namespace App\Http\Controllers\Dashboard;

use App\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    /**
     * create a new transaction 
     * @param  Request $request [transaction details]
     * @return [Array]           [Record Instance]
     */
   public function create(Request $request)
   {
       $record = Record::create([
            'user_id' => $request->userId,
            'service' => $request->service,
            'price' => (float) $request->price,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'NOT PAID',
            'ref' => 'PRD_'.strtoupper(str_random(12))
       ]);

       return response()->json([
            'status' => 201,
            'message'=> 'Created'
       ]);
   }
    
    public function agentStatistics(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Agent')) {
            $records = $user->records()
                ->where('created_at', '>=', Carbon::now()->subDays(30))
                ->get();
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

    public function cashierStatistics (Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Cashier')) {
            $records = Record::where('status', 'PAID')
                ->whereNotNull('paid_at')
                ->where('created_at', '>=', Carbon::now()->subDays(30))
                ->get();
            $stats = (new Collection([
                'month' => $records->filter(function (Record $record) {
                    return $record->created_at->greaterThanOrEqualTo(Carbon::now()->subDays(30));
                }),
                'week'  => $records->filter(function (Record $record) {
                    return  $record->created_at->greaterThanOrEqualTo(Carbon::now()->startOfWeek());
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
                ->where('status', 'NOT PAID')
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

    public function searchRecords($query)
    {
        $records = Record::where(function ($q) use ($query) {
            $q->where('service', 'like', '%'.$query.'%')
            ->orWhere('ref', 'like', '%'.$query.'%');
        })
        ->where('status', 'NOT PAID')
        ->where('created_at', '>=', Carbon::now()->startOfDay())
        ->get()
        ->toArray();

        dd($records);
    }

    public function approve(Request $request, User $user, Record $record)
    {
        if ($user->roles()->get()->contains('name', 'Cashier')) {
            $record->update([
                'status' => 'PAID',
                'paid_at' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Record Updated'
            ], 200);
        }
    }
}
