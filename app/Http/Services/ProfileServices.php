<?php

namespace  App\Http\Services;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Support\Facades\Hash;


class ProfileServices
{
    /*
     * * Profile Update
     */

    public function profileUpdate($request)
    {
        $data = ['success' =>false, 'data'=>'', 'message'=> 'Something went wrong, please try again, Thanks!'];

        $admin = Admin:: where('id', Auth::guard('admin')->user()->id)->first();

        $adminData['name'] = $request->get('name');
        $adminData['email'] = $request->get('email');
        $adminData['phone'] = $request->get('phone');
        $adminData['pl_bio'] = $request->get('pl_bio');
        $adminData['sl_bio'] = $request->get('sl_bio') ? $request->get('sl_bio') : $request->get('pl_bio');
        $adminData['country'] = $request->get('country');
        $adminData['city'] = $request->get('city');
        
        if (!empty($request->image)) {

            $old_img =  $admin->iamge;
            $adminData['image'] = fileUpload($request['image'], path_image(), $old_img);
        }

            $update = $admin->update($adminData);

        if ($update)
        {
            $data['success'] = true;
            $data['message'] = 'Profile successfully updated';
            $data['data'] = '';

            return $data;
        }

        return $data;

    }

    //    ******************* End Profile update ******************

    /*
     * Password Update
     */

    public function passwordUpdate($request)
    {
        $data = ['success' =>false, 'data'=>'', 'message'=> 'Something went wrong, please try again, Thanks!'];

        $admin = Admin:: where('id', Auth::guard('admin')->user()->id)->first();
        $adminData['password'] =Hash::make( $request->get('password'));

            $update = $admin->update($adminData);

            if ($update)
            {
                $data['success'] = true;
                $data['message'] = 'Password successfully updated';
                $data['data'] = '';

                return $data;
            }

            return $data;
    }
    //    ******************* End Password update ******************
}
