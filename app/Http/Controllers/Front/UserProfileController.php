<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CardRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Http\Services\UserProfileServices;
use App\Models\Campaign;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\PaymentOption;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Carbon\Carbon;
use Cartalyst\Stripe\Api\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class UserProfileController extends Controller
{

    private $userProfileService, $pageSettings;

    public function __construct(UserProfileServices $userProfileService, Request $request)
    {
        $this->userProfileService = $userProfileService;

    }

    /*
     * * Admin Profile
     */

    public function dashboard(Request $request)
    {
        $info['active_campaign'] = Campaign::where(['user_id' => Auth::id(), 'is_approved' => true, 'status' => \CAMPAIGN_RUNNING])->get();
        $info['total_collection'] = Transaction::where(['user_id' => Auth::id(), 'is_withdraw' => false])->sum('amount');
        $info['total_collection_this_week'] = Transaction::where(['user_id' => Auth::id(), 'is_withdraw' => false])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');

        return view('front.profile.dashboard', ['info' => $info,'menu' => 'dashboard','submenu' =>'profile']);

    }
    public function profile(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        return view('front.profile.profile', ['menu' => 'profile', 'user' => $user]);

    }

    # deactive account
    public function deactiveAccount()
    {
        $profile  =  User::where('id', Auth::id())->first();
        $profile->update(['status' => USER_DEACTIVE]);

        Auth::logout();
        toast('Your account successfully deactivated', 'success');

        return redirect()->route('home');
    }


    public function editUpdateProfile(Request $request)
    {
        if ($request->isMethod('post')) {

            app(UserProfileUpdateRequest::class);
            $user = $this->userProfileService->profileUpdate($request);

            if ($user['success'] == true) {

                toast($user['message'], 'success');
                return \redirect()->route('user.profile');

            }

            toast($user['message'], 'warning');
            return \redirect()->back();

        }

        $user = User::where('id', Auth::id())->first();
        return view('front.profile.edit_profile', ['menu' => 'profile', 'user' => $user]);

    }

    /*
     * * Update password
     */

    public function passwordChange(Request $request)
    {
        if ($request->isMethod('post')) {
            app(UserPasswordUpdateRequest::class);

            $userPassword = $this->userProfileService->passwordUpdate($request);
            if ($userPassword['success'] == true) {

                toast('Password successfully changed', 'success');
                return redirect()->route('user.profile');

            }

            toast('something wrong', 'warning');
            return redirect()->back();
        }


        $user = User::where(['id' => Auth::id()]);

        return view('front.profile.change_password', ['menu' => 'Change Password', 'submenu' =>'password','user' => $user]);

    }

    # address book

    public function address()
    {
        $address = User::where('id', Auth::id())->with(['officeAddress', 'homeAddress'])->first();

        return view('front.profile.address', ['active' => 'profile', 'address' => $address, 'submenu' => 'address']);
    }

    public function addressCreateStore(Request $request)
    {
        if ($request->isMethod('post')) {

            app(AddressRequest::class);
            $user = $this->userProfileService->addressStore($request);

            if ($user['success'] == true) {

                toast($user['message'], 'success');
                return \redirect()->route('user.address', app()->getLocale());
//                return \redirect()->back();

            }

            toast($user['message'], 'warning');
            return \redirect()->back();

        }

        return view('front.profile.add_address', ['active' => 'profile', 'submenu' => 'address']);
    }

    public function addressEditUpdate(Request $request)
    {
        if ($request->isMethod('POST')) {

            app(AddressRequest::class);
            $user = $this->userProfileService->addressUpdate($request);

            if ($user['success'] == true) {

                toast($user['message'], 'success');
                return \redirect()->route('user.address', app()->getLocale());
//                return \redirect()->back();

            }

            toast($user['message'], 'warning');
            return \redirect()->back();
        }

        $address = User::where('id', Auth::id())->with(['officeAddress', 'homeAddress'])->first();

        return view('front.profile.edit_address', ['active' => 'profile', 'submenu' => 'address', 'address' => $address]);

    }



#logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }


}
