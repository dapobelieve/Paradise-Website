<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Record;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TestController extends Controller
{
    public function index()
    {
        $dt = Carbon::now();
        $user = User::find(1);

        $user->roles()->sync([1]);

        dd($user->roles);


//        $records = $user->records()
//            ->where('created_at', '>=', $dt->subDays(30))
//            ->get();
//
//        $stats = (new Collection([
//            'monthly' => $records->filter(function (Record $record) {
//                return $record->created_at->diffInDays(Carbon::now()) <= 30;
//            }),
//            'weekly'  => $records->filter(function (Record $record) {
//                return $record->created_at->diffInDays(Carbon::now()) <= 7;
//            }),
//            'today'   => $records->filter(function (Record $record) {
//                return $record->created_at->diffInHours(Carbon::now()) <= 24;
//            }),
//        ]))->map(static function (Collection $records) {
//            return [
//                'total' => $records->count(),
//                'sum'   => $records->sum(static function (Record $record) {
//                    return $record->price;
//                }),
//            ];
//        })->toArray();


        dd($stats);
    }

}