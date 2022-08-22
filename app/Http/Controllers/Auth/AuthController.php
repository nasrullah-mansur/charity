<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\UserLoginRequest;
use App\Model\Upazila;
use App\Http\Services\AuthenticationService;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

session()->regenerate();

class AuthController extends Controller

{

    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

# ********************** user Register Process ****************************


    public function signUp(Request $request)
    {
        $current_url = session::get('current_url');
        if ($request->isMethod('POST')) {

            if ($request->has('agree')) {

                app(SignUpRequest::class);

                $signUp = $this->authenticationService->signUp($request);

                if ($signUp['success'] == true) {

                    if (isset($current_url) && $current_url == route('home', app()->getLocale())) {

                        return redirect()->route('sign.in', app()->getLocale());

                    } else {
//                        \auth($signUp['data']);
                        return redirect::to($current_url);
                    }

                }

                toast($signUp['message'], 'warning');
                return redirect()->route('sign.up');
            }

            toast(__('page.select_t_p'), 'warning');
            return \redirect()->back();

        }

        return view('front.auth.sign_up', ['page_title' => 'sign up']);
    }


# ********************** User   LogIn Process ****************************

    public function signIn(Request $request)
    {
        $current_url = session::get('current_url');
        if ($request->isMethod('POST')) {

            $validator = app(UserLoginRequest::class);

            $auth = $this->authenticationService->signIn($request);

            if ($auth['success'] == true) {

                toast($auth['message'], 'success');

                if (isset($current_url) && $current_url != route('home', app()->getLocale())) {

                    return redirect::to($current_url);

                } else {
                    return redirect()->route('home', app()->getLocale());
                }
            }

            toast($auth['message'], 'warning');
            return \redirect()->route('sign.in', app()->getLocale());

        }

//        if (Auth::check()) {
//
//            return \redirect()->route('user.dashboard', app()->getLocale());
//        }

        return view('front.auth.sign_in', ['page_title' => 'sign in']);

    }

    # user logout

    public function logout(Request $request)
    {
        Auth::logout();

        toast('successfully logout , thanks', 'success');
        return \redirect()->route('home', app()->getLocale());

    }

    public function adminlogin(Request $request){

        if($request->isMethod('POST')){
            app(LoginRequest::class);

            $admin = $this->authenticationService->login($request, 'admin');

            if( $admin['success'] == true){

                toast($admin['message'], 'success');
                return redirect()->route('admin.dashboard');
            }

            toast($admin['message'], 'warning');
        }

        return view ('admin.auth.login');

    }


    public function adminLogout()
    {
        $auth = $this->authenticationService->logout(GUARD_ADMIN);

        if ($auth['success'] = true) {
            return \redirect()->route('home', app()->getLocale())->with('success', $auth['message']);
        }
        return \redirect()->route('home', app()->getLocale())->withErrors('success', $auth['message']);
    }


# ****************************Reset Password**************************

    public function resetPassword(Request $request)
    {
        $current_url = session::get('current_url');

        if ($request->isMethod('POST')) {

            $success =$this->authenticationService->sendPasswordResetLink($request);  // send email to reset password

            if ($success['success'] == true) {

                return redirect::to($current_url)->with('success', __($success['message']));
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


    # social signup/sign in


    public function redirectToProvider($lang, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $current_url = session::get('current_url');

        $socialiteUser = Socialite::driver($provider)->user();

        $existingUser = User::where('email', $socialiteUser->getEmail())->first();

        if ($existingUser) {

            $existingUser->update(['image' => $socialiteUser->user['picture']]);
            auth()->login($existingUser);
            $user = Auth::user();

            toast('welcome to' . ' ' . allSettings('company_name'));
            if ($current_url) {
                return redirect::to($current_url);
            }
            return redirect()->route('home', app()->getLocale());

        } else {

            $newUserData['name'] = $socialiteUser->getName();
            $newUserData['email'] = $socialiteUser->getEmail();
            $newUserData['password'] = Hash::make(randomOrderNumber(13));
            $newUserData['image'] = $socialiteUser->user['picture'];

            $newUser = User::create($newUserData);

            auth()->login($newUser);

            $user = Auth::user();


            toast('welcome to' . ' ' . allSettings('company_name'));

            if ($current_url) {
                return redirect::to($current_url);

            }
            return redirect()->route('home', app()->getLocale());

        }
    }

}


