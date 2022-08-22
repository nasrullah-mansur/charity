<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\ContactUs;
use App\Models\Newletter;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /*
     * * Get all users
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {


            $users = User::with(['donate'])->select('*');

            return datatables($users)->editColumn('created_at', function ($orders) {
                return Carbon::parse($orders->created_at)->format('d M, Y'); })->addColumn('orders', function ($users) {
                return isset($users->successOrder) ? count($users->successOrder) : '';

            })->addColumn('transaction', function ($users) {
                return isset($users->donate) ?'<level class = "btn btn-warning">'. number_format($users->donate->sum('amount'),2).' '.allSettings('currency').'</level>' : '';

            })->addColumn('name', function ($users) {
                return $users->first_name.' '.$users->last_name;

            })->editColumn('image', function ($users) {
                return '<img src="'.$users->image.'" alt="No Image" width="40" height="40"v/>' ;

//            })->addColumn('action', function ($users) {
//
////                $button = '&nbsp;&nbsp;&nbsp;<a type="button" href="javascript:;" data-id="' . $users->id . '" class="send_sms btn btn-info btn-sm "><i class="fas fa-sms"></i></a>';
//                $button = '&nbsp;&nbsp;&nbsp;<a type="button" href="'.route('admin.user.orders',$users->id ).'" class="btn btn-success  btn-sm"><i class="fas fa-eye"></i></a>';
//
//                return $button;

            })
                ->addIndexColumn()
                ->rawColumns(['created_at','name','transaction','image'])
                ->make(true);
        }



        return view('admin.users.users')->with(['menu' => 'CRM', 'page_title' => 'All Users']);
    }



    public function userOrders(Request $request, $user_id)
    {
        if ($request->ajax()) {

            $orders = Order::where('user_id', $user_id);

            return datatables($orders)->editColumn('created_at', function ($orders) {
                return Carbon::parse($orders->created_at)->format('d M Y  H:i');


            })->editColumn('shipping_id', function ($orders) {
                return $orders->shipping->city . ', ' . $orders->shipping->area;


            })->editColumn('payment_id', function ($orders) {
                return $orders->payment ? $orders->payment->payment_id : 'no payment';

            })->addColumn('payment_method', function ($orders) {
                return '<level class = "btn btn-info">'.$orders->payment_method.'</level>';

            })->editColumn('order_status', function ($orders) {

                if ($orders->order_status == ORDER_PENDING) {
                    $status = '<level class ="btn btn-warning">' . orderStatus($orders->order_status) . '</level>';

                } elseif ($orders->order_status == ORDER_PROCESSING) {
                    $status = '<level class ="btn btn-info">' . orderStatus($orders->order_status) . '</level>';

                } elseif ($orders->order_status == ORDER_SHIPPED) {
                    $status = '<level class ="btn btn-secondary">' . orderStatus($orders->order_status) . '</level>';

                } elseif ($orders->order_status == ORDER_DELIVERED) {
                    $status = '<level class ="btn btn-success">' . orderStatus($orders->order_status) . '</level>';

                } elseif ($orders->order_status == ORDER_RETURN) {
                    $status = '<level class ="btn btn-danger">' . orderStatus($orders->order_status) . '</level>';
                } else {
                    $status = '' ;
                }

                return $status ;

            })

//                ->addColumn('action', function ($orders) {
//
//                $button = '<a type="button"  href="' . route('admin.user.orders.invoice', $orders->id) . '" class=" btn btn-info btn-sm"><i class="fas fa-file-invoice"></i></a>';
//
//                return $button;
//
//            })
                ->addIndexColumn()
                ->rawColumns(['created_at', 'shipping_id', 'payment_method', 'order_status'])
                ->make(true);
        }
        return view('admin.users.orders',['user_id' => $user_id,'menu' => 'CRM', 'page_title' => 'All Users' ]);
    }


    # send sms

    public function sendSms(Request $request)
    {
        if (empty($request->message))
        {
            Alert::error('Oofs', 'Message field can not be empty');
            return redirect()->route('admin.all.users');
        }

        $sendSms = send_sms($request->phone_number, $request->message);
        if ($sendSms)
        {
            return redirect()->route('admin.all.users')->with('success', 'message send successful to '.$request->phone_number);
        }

        Alert::error('Oofs', 'Someting went wrong');
        return redirect()->route('admin.all.users');
    }


    public function userOrdersInvoice($id)
    {
        $order = Order::where('id', $id)->with('order_details')->first();
        $items = $order->order_details;

        return view('admin.users.invoice', ['order' => $order, 'items' => $items, 'menu' => 'Users', 'page_title' => 'User Orders']);
    }


     # get all subscriber users

    public function subscriber(Request $request)
    {
        if ($request->ajax()) {

            $users = Subscription::select('*');

            return datatables($users)->editColumn('created_at', function ($orders) {
                return Carbon::parse($orders->created_at)->format('d M, Y');

            })

//                ->addColumn('action', function ($users) {
//                $button = '&nbsp;&nbsp;&nbsp;<a type="button" href="javascript:;" data-id="' . $users->id . '" class="send_sms btn btn-info btn-sm "><i class="fas fa-sms"></i></a>';
//                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="'.route('admin.user.orders',$users->id ).'" class="btn btn-success  btn-sm"><i class="fas fa-eye"></i></a>';
//
//                return $button;
//            })

                ->addIndexColumn()
                ->rawColumns(['created_at'])
                ->make(true);
        }

        return view('admin.users.subscriber')->with(['menu' => 'CRM', 'page_title' => 'Subscriber']);
    }



    # get all message from users

    public function contacts(Request $request)
    {
        if ($request->ajax()) {

            $users = ContactUs::select('*');

            return datatables($users)->editColumn('created_at', function ($orders) {
                return Carbon::parse($orders->created_at)->format('d M, Y');

            })

//                ->addColumn('action', function ($users) {
//                $button = '&nbsp;&nbsp;&nbsp;<a type="button" href="javascript:;" data-id="' . $users->id . '" class="send_sms btn btn-info btn-sm "><i class="fas fa-sms"></i></a>';
//                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="'.route('admin.user.orders',$users->id ).'" class="btn btn-success  btn-sm"><i class="fas fa-eye"></i></a>';
//
//                return $button;
//            })

                ->addIndexColumn()
                ->rawColumns(['created_at'])
                ->make(true);
        }

        return view('admin.users.contact')->with(['menu' => 'CRM', 'page_title' => 'Contact']);
    }

}
