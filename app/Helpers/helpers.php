<?php

use App\Models\ContactUsSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneralSettings;
use App\Models\Translation;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\ServiceCharge;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Psy\CodeCleaner\FunctionContextPass;
use Symfony\Component\Translation\Reader\TranslationReader;

//********************General settings*****************

function lang()
{
    return session('lang') ? session('lang') : 'pl' ;
}

function allSettings($a = null)
{
    if ($a == null) {
        $general_setting = GeneralSettings::get();
        if ($general_setting) {
            $output = [];
            foreach ($general_setting as $setting) {
                $output[$setting->slug] = $setting->value;
            }
            return $output;
        }
        return false;

    } else {
        $general_setting = GeneralSettings::where(['slug' => $a])->first();
        if ($general_setting) {
            $output = $general_setting->value;
            return $output;
        }
        return false;
    }
}


# translation

function translation($a = null)
{
    if ($a == null) {
        $translation = Translation::get();
        if ($translation) {
            $output = [];
            foreach ($translation as $tran) {
                $output[$tran->slug] = $tran->value;
            }
            return $output;
        }
        return false;

    } else {
        $translation = Translation::where(['slug' =>lang().'_'.$a])->first();
        if ($translation) {
            $output = $translation->value;
            return $output;
        }
        return false;
    }
}

//*****************************file Upload*******************

function fileUpload($new_file, $path, $old_file_name = null, $width = null, $height = null)
{
    if (!file_exists(public_path($path))) {
        mkdir(public_path($path), 0777, true);
    }
    $file_name = time() . '_' . $new_file->getClientOriginalName();
    $destinationPath = public_path($path);
    # old file delete
    $url = asset($path);
    $old_file_path = str_replace($url . '/', '', $old_file_name);

    if (isset($old_file_name) && $old_file_name != "" && file_exists($path . $old_file_path)) {

        unlink($path . $old_file_path);
    }

    # resize image and upload
    if ($height || $width) {

        $imageResize = Image::make($new_file)
            ->resize($width, $height)
            ->save($destinationPath . $file_name);

            // $imageResize = Image::make($new_file)
            // ->orientate()
            // ->fit($width, $height, function ($constraint) {
            //     $constraint->upsize();
            // })->save($destinationPath . $file_name);

    } else {

        #original image upload
        $new_file->move($destinationPath, $file_name);

    }

    return $file_name;
}


# remove Image

function removeImage($path, $old_file_name)
{
    $url = asset($path);
    $old_file_path = str_replace($url . '/', '', $old_file_name);

    if (isset($old_file_name) && $old_file_name != "" && file_exists($path . $old_file_path)) {

        unlink($path . $old_file_path);
    }

    return true;
}


//*************************************Image Path**************************

function path_image()
{
    return 'uploaded_file/images/';
}
# Random order number
function randomOrderNumber($a = 10)
{
    $x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $c = strlen($x) - 1;
    $z = '';

    for ($i = 0; $i < $a; $i++) {
        $y = rand(0, $c);
        $z .= substr($x, $y, 1);
    }
    return 'SS' . $z;
}

# random number
function randomNumber($a = 10)
{
    $x = '0123456789';
    $c = strlen($x) - 1;

    $z = rand(1, $c);       # first number never taken 0

    for ($i = 0; $i < $a - 1; $i++) {
        $y = rand(0, $c);
        $z .= substr($x, $y, 1);
    }

    return $z;
}

# contact us settings

function contactUs()
{
    return ContactUsSetting::first();
}

function primaryLang()
{
   return allSettings('pl') ? allSettings('pl') : 'English';
}

function secondaryLang()
{
   return allSettings('sl') ? allSettings('sl') : 'French';
}

function countCategoryNews($id)
{
    return Blog::where('category_id', $id )->count();

}

function user()
{
    return User::where('id', Auth::id())->first();
}

# user status
function status($a =null){
    $status = [
        USER_ACTIVE => translation('active'),
        USER_DEACTIVE => translation('deactive'),
        USER_SUSPENDED => translation('suspend'),
    ];
    if($a)
    {
        return $status[$a];
    }

    return $status;
}

# gender
function gender($a =null){

    $gender = [
        MALE => translation('male'),
        FEMALE => translation('female'),
        OTHERS => translation('other'),
    ];
    if($a)
    {
        return $gender[$a];
    }

    return $gender;
}


function raisedAmount($goal, $raised)
{
    return number_format((100 * $raised) / $goal , 2) ;
}

function serviceCharge(){

    $service = ServiceCharge::first();
    return $service ;
}

function totalServiceCharge($id){

    $campaign = Campaign::where('id', $id)->first();

    if($campaign){
        if($campaign->is_percentage_service_charge)
        {
            $fee = ($campaign->raised_amount * $campaign->service_charge) / 100 ;

            return $fee;
        }
        return $campaign->service_charge ;
    }
    return 0;

}

function withdrawalAmount($id)
{
    $campaign = Campaign::where('id', $id)->first();

    if($campaign){
        $fee = totalServiceCharge($id);
        return (float)$campaign->raised_amount  - (float)$fee;
    }
    return 0;
}

function isNotWithdraw($id)
{
    return  Campaign::where(['is_approved' => true, 'id' =>$id])->where(function($query){

        $query->where('end_date' , '<', Carbon::now()->toDateString())
        ->orwhere('status',\CAMPAIGN_COMPLETED );

       })->whereDoesntHave('withdraw')->exists();
}
