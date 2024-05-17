<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $total =  DB::table('meeting_lists')
            ->join('meetings', 'meetings.id', '=', 'meeting_lists.id_meeting')
            ->where('meeting_lists.status_payment', '=', 2)
            ->select('*')
            ->get();
        $totalFund = 0;
            foreach($total as $t) {
                $totalFund += $t->fund;
            }
        return view('admin.dashboard.index', [
            'title' => 'Bảng điều khiển',
            'allUser' => DB::table('users')
            ->select('*')
            ->get(),
            'getUserPositive' => DB::table('users')
            ->select('*')
            ->orderByDesc('numberofactivity')
            ->limit(5)
            ->get(),
            'allActivities' => DB::table('activities')
            ->select('*')
            ->get(),
            'allMeeting' => DB::table('meetings')
            ->select('*')
            ->get(),
            'total' => $totalFund
        ]);
    }
}
