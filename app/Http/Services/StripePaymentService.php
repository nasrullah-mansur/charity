<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Donate;
use App\Models\Campaign;
use App\Models\Transaction;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use Cartalyst\Stripe\Api\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class StripePaymentService
{
    public function postPaymentWithStripe(Request $request)
    {
        $data = ['success' => false, 'data' => [], 'message' => 'Something went wrong'];

        $stripe = Stripe::make(config('services.stripe.stripe_secret'));

        $campaign = Campaign::where('id', session('campaign_id'))->first();

        if (!$campaign) {
            $data['message'] = "Campaign doesn't exists";
            return $data;
        }

        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->get('card_no'),
                    'exp_month' => $request->get('exp_month'),
                    'exp_year' => $request->get('exp_year'),
                    'cvc' => $request->get('ccv')
                ],
            ]);

            if (!isset($token['id'])) {

                $data['message'] = 'The Stripe Token was not generated correctly';
                return $data;
            }

            $amount = session('donate_amount');

            $charge = $stripe->charges()->create([

                'card' => $token['id'],
                'currency' => allSettings('currency_name'),
                'amount' => $amount ?  (float)$amount : 100,
                'description' => 'Add in wallet',
            ]);

            if ($charge['status'] == 'succeeded') {
                /**db code*/
                $donate = Donate::create([
                    'user_id' => Auth::id(),
                    'campaigner_id' => $campaign->user_id,
                    'campaign_id' => $campaign->id,
                    'payment_id' => $charge['id'],
                    'amount' => $charge['amount'] / 100,
                    'amount_refunded' => $charge['amount_refunded'],
                    'application_fee' => $charge['application_fee'] ? $charge['application_fee'] : 0,
                    'application_fee_amount' => $charge['application_fee_amount'] ?  $charge['application_fee_amount'] : 0,
                    'transaction_id' => $charge['balance_transaction'],
                    'payment_method' => $charge['payment_method'],
                    'payment_method_type' => isset($charge['payment_method_details']['card']) ? $charge['payment_method_details']['card']['brand'] : null,
                    'status' => $charge['status'],
                ]);

                $transaction = Transaction::create([
                    'user_id' => $campaign->user_id,
                    'campaign_id' => $campaign->id,
                    'amount' => $charge['amount'] / 100,
                    'payment_method' => $charge['payment_method'],
                    'payment_method_type' => isset($charge['payment_method_details']['card']) ? $charge['payment_method_details']['card']['brand'] : null,
                    'is_withdraw' => false
                ]);

                $campData['raised_amount'] =  $campaign->raised_amount + $charge['amount'] / 100;

                if ($campaign->end_with_goal_achieve) {

                    if ((float)$campaign->goal_amount  <=   (float)$campData['raised_amount']) {
                        $campData['status'] =  CAMPAIGN_COMPLETED;
                    }
                }
                $campaign->update($campData);

                //                return Response('Payment Successfully Done', Response::HTTP_ACCEPTED);

                $data['success'] = true;
                $data['data'] = '';
                $data['message'] = 'Payment Successfully Done';

                return $data;
            } else {
                //                return Response('Payment Error', Response::HTTP_BAD_REQUEST);

                $data['message'] = 'payment error!';
                return $data;
            }
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
            return $data;
        }
    }

    public function transfer($request)
    {

        $stripe = Stripe::make(config('services.stripe.stripe_secret'));
        try{

        $transfer = $stripe->transfers()->create([
            'amount'    => $request->value,
            'currency'  => allSettings('currency_name'),
            'destination' => $request->account,
        ]);
        return $transfer;

        } catch(\Exception $e){
            session()->put('error', $e->getMessage());
            return false;
        }
    }

    public function saveCardInformation($cardData)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('return.something.wrong')];

        $card = PaymentOption::where('user_id', Auth::id())->first();

        if ($card) {

            $update = $card->update($cardData);

            if ($update) {

                $data['success'] = true;
                $data['data'] = $card;
                $data['message'] = 'Your card information successfully updated';

                return $data;
            }
            return $data;
        } else {

            $card = PaymentOption::create($cardData);

            if ($card) {

                $data['success'] = true;
                $data['data'] = $card;
                $data['message'] = 'Your card information successfully saved';

                return $data;
            }
            return $data;
        }
    }
}
