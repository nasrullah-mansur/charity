<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class TransactionController extends Controller
{
    public function donation(Request $request)
    {
        if ($request->ajax()) {

            $donation = Donate::select('*');

            return datatables($donation)->editColumn('user_id', function($donation){

                return isset($donation->user) ? $donation->user->first_name.' '.$donation->user->last_name : '';

            })->editColumn('created_at',function($donation){
                return Carbon::parse($donation->created_at)->diffForHumans();

            })->editColumn('campaign_id',function($donation){
                return strlen($donation->campaign->pl_title) > 23 ? substr($donation->campaign->pl_title,0,23).'...' : $donation->campaign->pl_title ;

            })->addColumn('campaign_image',function($donation){
                return '<img  src="'.$donation->campaign->image.'" width="120" height="80"/>';
            })
                ->addIndexColumn()
                ->rawColumns(['user_id','created_at', 'campaign_id', 'campaign_image'])
                ->make(true);
        }

        return view('admin.transaction.donation', ['menu'=> 'Transaction', 'page_title' => 'Donation']);
    }

    public function withdraw(Request $request)
    {
        if ($request->ajax()) {

            $withdraw = Withdraw::select('*');

            return datatables($withdraw)->editColumn('user_id', function($withdraw){

                return isset($withdraw->user) ? $withdraw->user->first_name.' '.$withdraw->user->last_name : '';

            })->editColumn('created_at',function($withdraw){
                return Carbon::parse($withdraw->created_at)->diffForHumans();

            })->editColumn('campaign_id',function($withdraw){
                return strlen($withdraw->campaign->pl_title) > 23 ? substr($withdraw->campaign->pl_title,0,23).'...' : $withdraw->campaign->pl_title ;

            })->addColumn('campaign_image',function($withdraw){
                return '<img  src="'.$withdraw->campaign->image.'" width="120" height="80"/>';

            })->addColumn('action', function ($withdraw) {

                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="show" href="' . route('admin.withdraw.show', encrypt($withdraw->id)) . '" class="show btn btn-info btn-sm"><i class="far fa-eye-slash"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['user_id','created_at', 'campaign_id', 'campaign_image','action'])
                ->make(true);
        }

        return view('admin.transaction.withdraw', ['menu'=> 'Transaction', 'page_title' => 'Withdraw']);
    }

    public Function show($id)
    {
        $withdraw = Withdraw::where('id', decrypt($id))->first();
        if($withdraw)
        {
            return view('admin.transaction.show', ['withdraw' => $withdraw,'menu'=> 'Transaction', 'page_title' => 'Withdraw' ]);
        }

        return redirect()->back();
    }

    public function stripeWithdraw(Request $request){
        dd($request->all());
    }

    public function paypalWithdraw(Request $request){
        dd($request->all());
    }
    
}

