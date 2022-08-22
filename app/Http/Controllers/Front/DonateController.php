<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Campaign;
use App\Models\Currency;
use App\Models\Partner;
use App\Models\PaymentPlatform;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function donate(Request $request, $slug = null)
    {
        if($request->isMethod('post')){

            session()->put('donate_amount',$request->donate_amount);

            if($request->payment_platform == PAYMENT_STRIPE){
                return redirect()->route('stripe.payment');
            }
            else{
                return redirect()->route('donate.payment');

            }

        }

        $campaign = Campaign::where('slug', $slug)->first();
        if($campaign)
        {
            session()->put('campaign_id', $campaign->id);

            return redirect()->route('donate.payment');
        }

        return redirect()->back();
    }

    public function payment()
    {
        $campaign  = Campaign::where('id', session('campaign_id'))->first();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

         return view('front.donate.donate',['info' => $info, 'active' => 'Home', 'campaign' => $campaign]);

    }

}
