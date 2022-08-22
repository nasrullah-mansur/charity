<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Services\AuthenticationService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller

{

    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

# ********************** user Register Process ****************************


    public function signUp(Request $request, $donar = null)
    {
        if ($request->isMethod('POST')) {
            app(SignupRequest::class);
            $signUp = $this->authenticationService->signUp($request);

            if ($signUp['success'] == true) {

                    return redirect()->route('sign.in');
                }

            toast($signUp['message'], 'warning');
            return redirect()->route('sign.up');

        }

        if(Auth::id()){
            return redirect()->route('home');
        }


        return view('front.auth.sign_up', ['donar' => $donar, 'page_title' => 'sign up']);
    }


# ********************** User   LogIn Process ****************************

    public function signIn(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = app(SignInRequest::class);

            $auth = $this->authenticationService->signIn($request);

            if ($auth['success'] == true) {

                return redirect()->route('home', app()->getLocale());
            }

            toast($auth['message'], 'warning');
            return \redirect()->route('sign.in');

        }
        if(Auth::id()){
            return redirect()->route('home');
        }

        return view('front.auth.sign_in', ['page_title' => 'sign in']);

    }

    # user logout

    public function logout(Request $request)
    {
        Auth::logout();
        return \redirect()->route('home');

    }


# ****************************Reset Password**************************

    public function resetPassword(Request $request)
    {

        if ($request->isMethod('POST')) {

            $success =$this->authenticationService->sendPasswordResetLink($request);  // send email to reset password

            if ($success['success'] == true) {

                toast($success['message'], 'success');
            }
            toast($success['message'], 'warning');
            return redirect()->back();

        }

        return view('front.auth.reset_password');
    }


    public function passwordResetView($lang, $token)
    {
        $id['id'] = $token;
        return view('front.auth.password_update', ['id'=>$id, 'token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $current_url = session::get('current_url');

        app(ResetPasswordRequest::class);

        $update = app(authenticationService::class)->updatePassword($request);      // update password

        if ($update['success'] == true) {

            toast($update['message'], 'success');
            return \redirect()->route('sign.in', app()->getLocale());
        }

        toast($update['message'], 'warning');
        return redirect()->back();
    }

}


