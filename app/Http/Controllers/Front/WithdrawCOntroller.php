<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaypalWithdrawRequest;
use App\Http\Requests\StripeWithdrawRequest;
use App\Models\Campaign;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawCOntroller extends Controller
{

    # all withdraws
    public function index()
    {
        $withdraws = Withdraw::where('user_id', Auth::id())->get();

        return view('front.campaign.withdraw', ['withdraws' =>$withdraws, 'menu' => 'Withdraw']);
    }

    # withdraw details
    public function details ($id){
        $withdraw = Withdraw::where('id', decrypt($id))->first();

        if($withdraw){
            return view('front.campaign.withdraw_details',['menu' => 'Withdraw', 'withdraw' => $withdraw]);
        }

        return redirect()->back();
    }


    public function withdraw(Request $request)
    {
        $campaign = Campaign::where(['user_id' => Auth::id(), 'slug' => $request->slug])->where(function($query){

            $query->where('end_date' , '<', Carbon::now()->toDateString())
            ->orwhere('status',\CAMPAIGN_COMPLETED );
           }

        )->first();

        if($campaign){

            if($campaign->withdraw)
            {
                toast('Already withdraw or processing', 'warning');
                return redirect()->back();
            }

            if($request->withdraw_method == PAYMENT_PAYPAL){

                session()->put('withdraw_campaign_id', $campaign->id);
                return redirect()->route('user.paypal.withdraw');

            }elseif($request->withdraw_method == PAYMENT_STRIPE){

                session()->put('withdraw_campaign_id', $campaign->id);
                return redirect()->route('user.stripe.withdraw');

            }else{

                toast('something went wrong', 'warning');
                return redirect()->route('user.home');
            }

        }

        toast('something went wrong', 'warning');
        return redirect()->route('user.dashboard');


    }

    public function paypal(Request $request)
    {
        if($request->isMethod('post')){

            app(PaypalWithdrawRequest::class);

            $campaign = Campaign::where(['user_id' => Auth::id(), 'id' =>session('withdraw_campaign_id') ])->first();

            if( $campaign ){

                if($campaign->withdraw)
                {
                    toast('Already withdraw or processing', 'warning');
                    return redirect()->back();
                }

                $withData ['user_id'] = $campaign->user_id;
                $withData ['campaign_id'] = $campaign->id;
                $withData ['goal_amount'] = $campaign->goal_amount;
                $withData ['raised_amount'] = $campaign->raised_amount;
                $withData ['paypal_account'] = $request->paypal_account;

                $withData ['service_charge'] = $campaign->service_charge;
                $withData ['is_percentage_service_charge'] = $campaign->is_percentage_service_charge;

                $withData ['total_service_charge'] = totalServiceCharge( $campaign->id);
                $withData ['withdrawal_amount'] = withdrawalAmount( $campaign->id);

                $withData ['status'] = WITHDRAW_REQUEST;
                $withData ['is_approved'] = false;
                $withData ['withdraw_method'] = \PAYMENT_PAYPAL;
                $withData ['is_paypal_withdraw'] = true;

                $withdraw  = Withdraw::create($withData);

                if( $withdraw){

                    session()->forget('withdraw_campaign_id');

                    toast('Withdraw request sent to the '.allSettings('company_name'), 'success');
                    return redirect()->route('user.withdraw');

                }
                toast('Something went wrong', 'warning');
                return redirect()->route('user.dashboard');
            }

            toast('Something went wrong', 'warning');
            return redirect()->back();


        }

        $campaign = Campaign::where(['user_id' => Auth::id(), 'id' =>session('withdraw_campaign_id') ])->first();

        if($campaign){

            return view('front.campaign.paypal_withdraw', ['campaign' => $campaign, 'menu' => 'Withdraw']);
        }

        toast('Something went wrong', 'warning');
        return redirect()->back();

    }


    # stripe withdraw

    public function stripe(Request $request)
    {
        if($request->isMethod('post')){

            app(StripeWithdrawRequest::class);

            $campaign = Campaign::where(['user_id' => Auth::id(), 'id' =>session('withdraw_campaign_id') ])->first();

            if( $campaign ){

                if($campaign->withdraw)
                {
                    toast('Already withdraw or processing', 'warning');
                    return redirect()->back();
                }

                $withData ['user_id'] = $campaign->user_id;
                $withData ['campaign_id'] = $campaign->id;
                $withData ['goal_amount'] = $campaign->goal_amount;
                $withData ['raised_amount'] = $campaign->raised_amount;
                $withData ['stripe_account'] = $request->stripe_account;
                $withData ['stripe_card_number'] = $request->stripe_card_number;

                $withData ['service_charge'] = $campaign->service_charge;
                $withData ['is_percentage_service_charge'] = $campaign->is_percentage_service_charge;

                $withData ['total_service_charge'] = totalServiceCharge( $campaign->id);
                $withData ['withdrawal_amount'] = withdrawalAmount( $campaign->id);

                $withData ['status'] = WITHDRAW_REQUEST;
                $withData ['is_approved'] = false;
                $withData ['withdraw_method'] = PAYMENT_STRIPE;
                $withData ['is_paypal_withdraw'] = false;
                $withdraw  = Withdraw::create($withData);

                if( $withdraw){
                    session()->forget('withdraw_campaign_id');

                    toast('Withdraw request sent to the '.allSettings('company_name'), 'success');
                    return redirect()->route('user.withdraw');

                }
                toast('Something went wrong', 'warning');
                return redirect()->route('user.dashboard');
            }

            toast('Something went wrong', 'warning');
            return redirect()->back();


        }

        $campaign = Campaign::where(['user_id' => Auth::id(), 'id' =>session('withdraw_campaign_id') ])->first();

        if($campaign){

            return view('front.campaign.stripe_withdraw', ['campaign' => $campaign, 'menu' => 'Withdraw']);
        }

        toast('Something went wrong', 'warning');
        return redirect()->back();
    }
}
