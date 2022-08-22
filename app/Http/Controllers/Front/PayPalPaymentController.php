<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment as ModelsPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Notification;


class PayPalPaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        return view('front.payment.paypal');
    }
    public function payWithpaypal(Request $request)
    {

        $order = Order::where('id', session('order_id'))->first();
        if(!$order)
        {

            \Session::put('error', 'Order timeout');
            return Redirect::to('/');
        }
        // dd($order->total_order );
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // $item_1 = new Item();

        // $item_1->setName('Item 1') /** item name **/
        //     ->setCurrency('USD')
        //     ->setQuantity(1)
        //     ->setPrice( $order->total_order ); /** unit price **/

        // $item_list = new ItemList();
        // $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency(allSettings('currency_name') ? allSettings('currency_name') : 'USD')
            ->setTotal($order->total_order );

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            // ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('payment.confirmation', app()->getLocale())) /** Specify return URL **/
            ->setCancelUrl(route('payment', app()->getLocale()));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

            // dd($payment->create($this->_api_context));
        /** dd($payment->create($this->_api_context));exit; **/
        try {


            $payment->create($this->_api_context);
// dd(   $payment);
            $paypalPayment = ModelsPayment::create([

                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'payment_id' => $payment->id,
                'intent' => $payment->intent,
                'amount' =>$order->total_order,
                // 'currency' =>  $payment->transactions->amount->currency,
                'transaction_id' => $payment->id,
                'payment_method' => $payment->payer->payment_method,
                'payment_method_type' =>  $payment->payer->payment_method,
                 'status' =>$payment->state,
            ]);

            $orderData['is_order_successful'] = true;
            $orderData['payment_status'] = PAYMENT_SUCCESS;
            $orderData['order_status'] = ORDER_PROCESSING;
            $orderData['payment_method'] = $payment->payer->payment_method;
            $orderData['order_status'] = ORDER_PROCESSING;
            $orderData['payment_id'] = $paypalPayment->id;

            $order->update($orderData);

            session()->forget('order_id');
            session('payment_id' ,$payment->id);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function getPaymentStatus()
    {

        $request=request();//try get from method

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if (empty($request->PayerID) || empty($request->token)) {

            Session::put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');
            //add update record for cart
            $email='yangcheebeng@hotmail.com';
	        Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));
            return Redirect::to('products');  //back to product page

        }

        Session::put('error', 'Payment failed');
        return Redirect::to('/');

    }

}
