<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPasswordUpdateRequest;
use App\Http\Requests\AdminProfileUpdate;
use App\Model\District;
use App\Model\User;
use App\Http\Services\ProfileServices;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $profileService, $pageSettings;

    public function __construct(ProfileServices $profileService, Request $request)
    {
        $this->profileService = $profileService;

        $this->route = $request->route()->getAction();
        $this->page_title = isset($this->route['page_title']) ? $this->route['page_title'] : null;
        $this->task = isset($this->route['task']) ? $this->route['task'] : null;
        $this->pageSettings = array('page_title' => $this->page_title, 'task' => $this->task);
    }


    /*
     * * Find Auth profile
    */

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        $districts = null;
        return view('admin.profile.profile', ['admin' => $admin, 'districts' => $districts, 'menu' => 'profile', 'page_title' => 'Profile']);
    }

    // ************************** End find Profile ******************

    /*
     * * Update Profile
     */

    public function updateProfile(Request $request)
    {
        app(AdminProfileUpdate::class);

        $profile = $this->profileService->profileUpdate($request);       // call ProfileUpdate function from ProfileServoce class
        if ($profile['success'] == true) {

            toast( $profile['message'], 'success');
            return redirect()->route('admin.profile');
        }

        toast( $profile['message'], 'warning');
        return redirect()->route('admin.profile');
    }

    // ************************** End Update Profile ******************

    /*
     * * Update Password
     */


    public function updatePassword(Request $request)
    {
        app(AdminPasswordUpdateRequest::class);                      // input Password validation
        $user = $this->profileService->passwordUpdate($request);  // call PasswordUpdate function from ProfileServoce class

        if ($user['success'] == true) {

            toast( $user['message'], 'success');
            return redirect()->route('admin.profile');
        }

        toast( $user['message'], 'warning');
        return redirect()->route('admin.profile');
    }

    // ************************** End Update Profile ******************

    public function logout()
    {
        Auth::guard('admin')->logout();

        toast('You have succcessfully logout', 'success');
        return redirect()->route('home');
    }

}
