<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AccountInfo;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Model\Purchase;
use App\Models\Campaign;
use App\Models\Donate;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
     $info['users'] = User::orderBy('id', 'desc')->take(8)->get();
     $info['donation'] = Donate::sum('amount');
     $info['donation_this_month'] = Donate::whereMonth('created_at', Carbon::now()->format('m'))->sum('amount');
     $info['approval_campaign'] = Campaign::where(['status' => \CAMPAIGN_PENDIGN, 'is_approved' => false])->count();
     $info['total_active_campaign'] = Campaign::where(['status' => CAMPAIGN_RUNNING, 'is_approved' => true])->count();
     $info['latest_campaign'] = Campaign::orderBy('id', 'desc')->take(5)->get();


        return view('admin.dashboard.index', ['info' =>$info, 'title' => 'Dashboard', 'menu' => 'Dashboard']);
    }


}
