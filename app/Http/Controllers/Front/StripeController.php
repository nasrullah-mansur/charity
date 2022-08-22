<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StripPaymentRequest;
use App\Http\Services\StripePaymentService;
use App\Models\Partner;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;



class StripeController extends Controller
{
    private $authenticationService, $checkoutService, $stripePaymentService;

    function __construct(StripePaymentService $stripePaymentService)
    {
        $this->stripePaymentService = $stripePaymentService;
    }


    public function payment(Request $request)
    {
        if ($request->isMethod('POST')) {
            app(StripPaymentRequest::class);

            $payment = $this->stripePaymentService->postPaymentWithStripe($request);

            if ($payment['success'] == true) {
                toast('Payment has been succeeded, thanks', 'success');
                return redirect()->route('home');
            }

            return Response($payment['message'], Response::HTTP_ACCEPTED);
        }
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();
        return view('front.donate.stripe', ['info' =>$info ]);
    }

    public function transfer(Request $request)
    {
        $withdraw = Withdraw::where('id', $request->withdraw_id)->first();

        if($withdraw){

            if($withdraw->is_approved){

                toast("Allready withdraw is approved", 'warning');
                return redirect()->back();
            }
            $trasfer  =  $this->stripePaymentService->transfer($request);

            if($trasfer){

                $withdraw->update([
                    'is_approved' => true,
                    'withdraw_date' => Carbon::now()->toDateTimeString()
                ]);

                toast("Withdraw success", 'success');
                return redirect()->route('admin.withdraw');

            }

            toast(session('error'), 'warning');
            session()->forget('error');
            
            return redirect()->back();


        }

        toast("Withdraw doesn't exists", 'warning');
        return redirect()->back();
    }


}
