<?php

namespace App\Http\Services;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthenticationService
{

    # User Registration

    public function signUp($request)
    {
        $data = ['success' => false, 'code' => 404, 'data' => '', 'message' => __('return.something.wrong')];

        $userData['first_name'] = $request->first_name;
        $userData['last_name'] = $request->last_name;
        $userData['email'] = $request->email;
        $userData['password'] = Hash::make($request->password);
        $userData['role'] = $request->donar ? DONAR : CAMPAIGNER;

        $user = User::create($userData);
        if ($user) {

            $data = [
                'success' => true,
                'code' => 200,
                'data' => $user,
                'message' => __('Sign successfully completed, please signin now')
            ];

            return $data;
        }

        return $data;

    }

    #  User Login

    public function signIn($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Email or password not match')];

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $data['success'] = true;
            $data['data'] = Auth::user();
            $data['message'] = __('Welcome to '.allSettings('company_name'));

            return $data;

        }

        return $data;

    }

    # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Admin ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


    public function login($request, $guard)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Email or Password not match')];

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $data['success'] = true;
            $data['data'] = Auth::guard($guard)->user();
            $data['message'] = allSettings('company_name') ? 'Welcome to '.allSettings('company_name') : 'Welcome to chartyzai';

            return $data;

        }

        return $data;

    }

    # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ logout ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function logout($guard)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Email or Password not match')];

        if (Auth::guard($guard)->check()) {

            Auth::guard($guard)->logout();
            return [
                'success' => true,
                'message' => 'Successfully Logout, Thanks !',
            ];
        }
        return $data;
    }

    # forget password

    //**********************Reset Password*******************
    public function sendPasswordResetLink($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {

            do {
                $token = Str::random(32);
                $existsUser = User::where('reset_token', $token)->exists();

            } while ($existsUser);

            $updateToken = User::where('email', '=', $user->email)
                ->update(['reset_token' => $token]);

            if ($updateToken) {

                $tokenUser = User::where(['reset_token' => $token])->where(['email' => $user->email])->first();

                $mailTemplet = 'email.verify';

                $this->sendPasswordResetEmail($tokenUser, $mailTemplet);

                return [
                    'success' => true,
                    'message' => __('Reset password link sent to your email, please check'),
                    'data' => ''
                ];
            }
        }
        return [
            'success' => true,
            'message' => __('Account not found'),
            'data' => ''
        ];

    }

    public function updatePassword($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $pass = Hash::make($request->password);

        $user = User::where('reset_token', '=', $request->reset_token)->first();
        if ($user) {
            $update = $user->update([
                'password' => $pass,
                'reset_token' => null,
            ]);

            if ($update) {
                return [
                    'success' => true,
                    'message' => __('Password successfully updated, please login with new password, Thanks'),
                    'data' => $user,
                ];
            }

            return $data;

        }

        $data['message'] = 'Reset link time out or invalid link';
        return $data;


    }

    public function sendPasswordResetEmail($user, $mailTemplet, $mail_key = '')
    {
        $mailService = app(\App\Http\Services\MailService::class);

        $userName = $user->name;
        $userEmail = $user->email;
        $companyName = isset(allSettings()['company_name']) && !empty(allSettings()['company_name']) ? allSettings()['company_name'] : __('Company Name');
        $subject = __('Reset Password | :companyName', ['companyName' => $companyName]);
        $data['data'] = $user;
//        $data['key'] = $mail_key;
        $data['key'] = $user->reset_token;

        return $mailService->send($mailTemplet, $data, $userEmail, $userName, $subject);
    }


    # admin forget password
    //**********************Reset Password*******************
    public function AdminSendPasswordResetLink($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $user = Admin::where('email', '=', $request->email)->first();

        if ($user) {

            do {
                $token = Str::random(32);
                $existsUser = Admin::where('reset_token', $token)->exists();

            } while ($existsUser);

            $updateToken = Admin::where('email', '=', $user->email)
                ->update(['reset_token' => $token]);

            if ($updateToken) {

                $tokenUser = Admin::where(['reset_token' => $token])->where(['email' => $user->email])->first();

                $mailTemplet = 'email.admin_verify';

                $this->sendPasswordResetEmail($tokenUser, $mailTemplet);

                return [
                    'success' => true,
                    'message' => __('Reset password link sent to your email, please check'),
                    'data' => ''
                ];
            }
        }
        return [
            'success' => true,
            'message' => __('Account not found'),
            'data' => ''
        ];

    }

    public function AdminUpdatePassword($request)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $pass = Hash::make($request->password);

        $user = Admin::where('reset_token', '=', $request->reset_token)->first();

        if ($user) {
            $update = $user->update([
                'password' => $pass,
                'reset_token' => null,
            ]);

            if ($update) {
                return [
                    'success' => true,
                    'message' => __('Password successfully updated, please login with new password, Thanks'),
                    'data' => $user,
                ];
            }

            return $data;

        }

        $data['message'] = 'Reset link time out or invalid link';
        return $data;


    }

}

