<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donate;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Resolvers\PaymentPlatformResolver;
use App\Services\PaypalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        //$this->middleware('auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function pay(Request $request)
    {

        $rules = [
            'value' => ['required', 'numeric'],
            'currency' => ['required', 'exists:currencies,iso'],
        ];

        $request->validate($rules);

        session()->put('donate_amount', $request->value);

        $paymentPlatform = $this->paymentPlatformResolver->resolveService($request->payment_platform);

        session()->put('paymentPlatformId', $request->payment_platform);
        return $paymentPlatform->handlePayment($request);
    }


    public function withdraw(Request $request)
    {
        $withdraw = Withdraw::where('id', $request->withdraw_id)->first();
        session()->put('paypal_withdraw_id', $withdraw->id);

        if($withdraw){

            if($withdraw->is_approved){

                toast("Allready withdraw is approved", 'warning');
                return redirect()->back();
            }

            $paymentPlatform = $this->paymentPlatformResolver->resolveService('paypal');
            session()->put('paymentPlatformId', $request->payment_platform);

            return $transfer =  $paymentPlatform->handleTransfer($request);

           }

        toast("Withdraw doesn't exists", 'warning');
        return redirect()->route('admin.withdraw');
    }


    public function withdrawapproval()
    {
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformId'));

            $success = $paymentPlatform->handleWithdrawApproval();
            if($success){}
        }

        return redirect()->route('home')->withErrors('We cannot retrieve your payment platform, try again');
    }


    public function approval()
    {
        $campaign = Campaign::where('id', session('campaign_id'))->first();

        if (!$campaign) {

            toast("something went wrong", 'warning');
            return redirect()->route('home');
        }

        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformId'));
            $payment  =  $paymentPlatform->handleApproval();

            $donate = Donate::create([

                'user_id' => Auth::id(),
                'campaigner_id' => $campaign->user_id,
                'campaign_id' => $campaign->id,
                'payment_id' => null,
                'amount' => session('donate_amount'),
                'application_fee' => 0,
                'application_fee_amount' =>  0,
                // 'transaction_id' => $charge['balance_transaction'],
                'payment_method' => 'paypal',
                'payment_method_type' => 'paypal',
                'status' => 'succeeded',
            ]);

            $transaction = Transaction::create([
                'user_id' => $campaign->user_id,
                'campaign_id' => $campaign->id,
                'amount' => session('donate_amount'),
                'payment_method' => 'paypal',
                'payment_method_type' => 'paypal',
                'is_withdraw' => false
            ]);

            $campData['raised_amount'] =  $campaign->raised_amount + session('donate_amount');

            if ($campaign->end_with_goal_achieve) {

                if ((float)$campaign->goal_amount  <=   (float)$campData['raised_amount']) {
                    $campData['status'] =  CAMPAIGN_COMPLETED;
                }
            }
            $campaign->update($campData);

            //                return Response('Payment Successfully Done', Response::HTTP_ACCEPTED);
            toast('Payment Successfully Done', 'success');
            return redirect()->route('home');
        }

        return redirect()->route('home')->withErrors('We cannot retrieve your payment platform, try again');
    }

    public function cancelled()
    {
        return redirect()->route('home')->withErrors('Payment is cancelled');
    }
}
