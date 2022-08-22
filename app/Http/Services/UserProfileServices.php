<?php

namespace App\Http\Services;

use App\Models\PaymentOption;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileServices
{

    public function profileUpdate($request)
    {
        $data = ['success' => false, 'code' => 404, 'data' => '', 'message' => __('return.something.wrong')];

        $user = User::where('id', Auth::id())->first();

        $userData['first_name'] = $request->get('first_name');
        $userData['last_name'] = $request->get('last_name');
        $userData['email'] = $request->get('email');
        $userData['phone'] = $request->get('phone');
        $userData['country'] = $request->get('country');
        // $userData['dob'] = Carbon::parse($request->get('dob'))->toDateString();
        $userData['gender'] = $request->get('gender');

        if (!empty($request->image)) {

            $userData['image'] = fileUpload($request['image'], path_image(), $user->image);
        }

        $update = $user->update($userData);

        if ($update) {

            $data['success'] = true;
            $data['data'] = $user;
            $data['message'] = __('Your information successfully updated');

            return $data;
        }
        return $data;

    }

    # add additional address

    public function addressStore($request)
    {
        $data = ['success' => false, 'code' => 404, 'data' => '', 'message' => __('return.something.wrong')];

        $user = User::where('id', Auth::id())->with(['officeAddress', 'homeAddress'])->first();

        $userAddressData = $this->getAddressData($request);

        if ($userAddressData['is_office_address']) {
            if ($user->officeAddress) {

                $data['message'] = 'Your Office address already exists';
                return $data;
            }

        } else {
            if ($user->homeAddress) {

                $data['message'] = 'Your home address already exists';
                return $data;
            }
        }

        $address = UserAddress::create($userAddressData);

        if ($address) {

            $message = $userAddressData['is_office_address'] ? 'office address ' : 'home address ';

            $data['success'] = true;
            $data['data'] = $address;
            $data['message'] = __('Your ' . $message . 'successfully saved');

            return $data;
        }
        return $data;

    }

    private function getAddressData($request)
    {
        $userAddressData['user_id'] = Auth::id();
        $userAddressData['full_name'] = $request->full_name;
        $userAddressData['email'] = $request->email;
        $userAddressData['phone'] = $request->phone;
        $userAddressData['country'] = $request->country;
        $userAddressData['street'] = $request->street;
        $userAddressData['city'] = $request->city;
        $userAddressData['district'] = $request->district;
        $userAddressData['postal_code'] = $request->postal_code;

        $userAddressData['is_office_address'] = $request->is_office_address ? $request->is_office_address : false;

        return $userAddressData;
    }

    public function addressUpdate($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('return.something.wrong')];

        $address = UserAddress::where('id', $request->edit_id)->first();

        if ($address) {
            $userAddressData = $this->getAddressData($request);

            $update = $address->update($userAddressData);

            if ($update) {

                $message = $userAddressData['is_office_address'] ? 'office address ' : 'home address ';
                $data['success'] = true;
                $data['data'] = $address;
                $data['message'] = __('Your ' . $message . 'successfully updated');

                return $data;
            }
            return $data;
        }
        $data['message'] = "Address doesn't exists";
        return $data;
    }

    //    ******************* End Profile update ******************

    /*
     * Password Update
     */

    public function passwordUpdate($request)
    {
        $data = ['success' => false, 'code' => 404, 'data' => '', 'message' => __('return.something.wrong')];

        $user = User::where(['id' => Auth::id()])->first();

        $userData['password'] = Hash::make($request->get('password'));

        $update = $user->update($userData);

        if ($update) {

            $data['success'] = true;
            $data['code'] = 200;
            $data['data'] = $user;
            $data['message'] = __('password successfully updated');

            return $data;
        }

        return $data;

    }

    //    ******************* End Password update ******************

    //    ******************* payment option ******************

    public function paymentOption($request)
    {

        $cardData = $this->getPaymentData($request);

        return app(StripePaymentService::class)->saveCardInformation($cardData);


    }

    private function getPaymentData($request)
    {
        $cardData['user_id'] = Auth::id();
        $cardData['payment_method'] = $request->payment_method;
        $cardData['payment_method'] = $request->payment_method;
        $cardData['type'] = $request->type;
        $cardData['card_no'] = $request->card_no;
        $cardData['name'] = $request->name;
        $cardData['ccv'] = $request->ccv;
        $cardData['exp_month'] = $request->exp_month;
        $cardData['exp_year'] = $request->exp_year;

        return $cardData;
    }

}
