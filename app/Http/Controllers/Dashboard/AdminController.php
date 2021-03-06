<?php

namespace App\Http\Controllers\Dashboard;

use App\Record;
use App\Role;
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
                                    GROUP BY records.user_id, users.name');
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
                                    GROUP BY records.user_id, users.name');
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

            $records = DB::select('SELECT users.name, round(sum(price), 2) AS amount,count(records.id) AS transactions 
                                    FROM role_user, records
                                    JOIN users 
                                    ON records.user_id = users.id
                                    WHERE users.id = role_user.user_id
                                    AND role_user.role_id = 2
                                    AND records.created_at >= DATE_ADD(curdate(), INTERVAL (-weekday(curdate())) DAY)
                                    GROUP BY records.user_id, users.name');
            return response()->json([
                'stats' => $records,
            ]);
        }else {
            return response()->json([
                'message' => 'Invalid User'
            ], 401);
        }

    }

    public function search(Request $request, User $user)
    {
        $start =  $request->query()['start'];
        $end = $request->query()['end'];

        $userRecords = $user->records()->whereBetween('created_at', [$start, $end])->get();


        return response()->json([
            'user' => $user->name,
            'records' => $userRecords,
            'start' => $start,
            'end' => $end
        ]);
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
                                    GROUP BY records.user_id, users.name');
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
        $user = User::where('id', '!=', 1)->get();
        return view('admin.add-user')->with('users', $user);
    }

    public function agents(Request $request, User $user)
    {
        if ($user->roles()->get()->contains('name', 'Admin')) {

            $users = Role::with('users')->where('name', 'Agent')->get()->pluck('users')->flatten();

            return response()->json([
                'data' => $users
            ]);
        }
    }

    public function editUser(Request $request, User $user)
    {
        return view('admin.edit-user')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required|in:2,3'
        ]);

        $user->roles()->sync([$request->role]);

        return redirect()->back()->with('success', 'User Role updated');
    }
}
