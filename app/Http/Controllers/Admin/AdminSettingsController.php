<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettingRequest;
use App\Models\DonationSlot;
use App\Models\GeneralSettings;
use App\Models\ServiceCharge;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function generalSettings(Request $request)
    {
        if ($request->isMethod('POST')) {

            app(GeneralSettingRequest::class);

            $data = GeneralSettings::get();

            foreach ($data as $item) {

                if ($item->slug == 'title' && $item->value != $request->title) {
                    GeneralSettings::where('slug', '=', 'title')->update(['value' => $request->title]);

                } elseif ($item->slug == 'pl_about_us' && $item->value != $request->pl_about_us) {
                    GeneralSettings::where('slug', '=', 'pl_about_us')->update(['value' => $request->pl_about_us]);

                } elseif ($item->slug == 'sl_about_us' && $item->value != $request->sl_about_us) {
                    GeneralSettings::where('slug', '=', 'sl_about_us')->update(['value' => $request->sl_about_us]);

                } elseif ($item->slug == 'company_name' && $item->value != $request->company_name) {
                    GeneralSettings::where('slug', '=', 'company_name')->update(['value' => $request->company_name]);

                } elseif ($item->slug == 'meta_keywords' && $item->value != $request->meta_keywords) {
                    GeneralSettings::where('slug', '=', 'meta_keywords')->update(['value' => $request->meta_keywords]);

                } elseif ($item->slug == 'meta_author' && $item->value != $request->meta_author) {
                    GeneralSettings::where('slug', '=', 'meta_author')->update(['value' => $request->meta_author]);

                } elseif ($item->slug == 'meta_description' && $item->value != $request->meta_description) {
                    GeneralSettings::where('slug', '=', 'meta_description')->update(['value' => $request->meta_description]);

                } elseif ($item->slug == 'currency' && $item->value != $request->currency) {
                    GeneralSettings::where('slug', '=', 'currency')->update(['value' => $request->currency]);

                } elseif ($item->slug == 'currency_name' && $item->value != $request->currency_name) {
                    GeneralSettings::where('slug', '=', 'currency_name')->update(['value' => $request->currency_name]);

                } elseif ($item->slug == 'first_section' && $item->value != $request->first_section) {

                    GeneralSettings::where('slug', '=', 'first_section')->update(['value' => $request->first_section]);

                } elseif ($item->slug == 'second_section' && $item->value != $request->second_section) {
                    GeneralSettings::where('slug', '=', 'second_section')->update(['value' => $request->second_section]);

                } elseif ($item->slug == 'third_section' && $item->value != $request->third_section) {
                    GeneralSettings::where('slug', '=', 'third_section')->update(['value' => $request->third_section]);

                } elseif ($item->slug == 'tax' && $item->value != $request->tax) {
                    GeneralSettings::where('slug', '=', 'tax')->update(['value' => $request->tax]);

                } elseif ($item->slug == 'shipping_charge' && $item->value != $request->shipping_charge) {
                    GeneralSettings::where('slug', '=', 'shipping_charge')->update(['value' => $request->shipping_charge]);

                } elseif ($item->slug == 'sl' && $item->value != $request->sl) {
                    GeneralSettings::where('slug', '=', 'sl')->update(['value' => $request->sl]);

                } elseif ($item->slug == 'pl' && $item->value != $request->pl) {
                    GeneralSettings::where('slug', '=', 'pl')->update(['value' => $request->pl]);

                } elseif ($item->slug == 'logo' && $item->value != $request->logo) {

                    if (!empty($request->logo)) {

                        $old_image = '';
                        $new_image = $request->logo;
                        $logo = fileUpload($new_image, path_image(), $old_image);
                        GeneralSettings::where('slug', '=', 'logo')->update(['value' => $logo]);
                    }

                } elseif ($item->slug == 'footer_logo' && $item->value != $request->footer_logo) {

                    if (!empty($request->footer_logo)) {

                        $old_image = '';
                        $new_image = $request->footer_logo;
                        $footer_logo = fileUpload($new_image, path_image(), $old_image);
                        GeneralSettings::where('slug', '=', 'footer_logo')->update(['value' => $footer_logo]);
                    }


                } elseif ($item->slug == 'fav_icon' && $item->value != $request->fav_icon) {

                    if (!empty($request->fav_icon)) {

                        $old_image = $item->value;
                        $new_image = $request->fav_icon;
                        $fav_icon = fileUpload($new_image, path_image(), $old_image);
                        GeneralSettings::where('slug', '=', 'fav_icon')->update(['value' => $fav_icon]);
                    }

                } elseif ($item->slug == 'sl_flag' && $item->value != $request->sl_flag) {

                    if (!empty($request->sl_flag)) {

                        $old_image = $item->sl_flag;
                        $new_image = $request->sl_flag;
                        $sl_flag = fileUpload($new_image, path_image(), $old_image);
                        GeneralSettings::where('slug', '=', 'sl_flag')->update(['value' => $sl_flag]);
                    }

                } elseif ($item->slug == 'pl_flag' && $item->value != $request->pl_flag) {

                    if (!empty($request->pl_flag)) {

                        $old_image = $item->pl_flag;
                        $new_image = $request->pl_flag;
                        $pl_flag = fileUpload($new_image, path_image(), $old_image);
                        GeneralSettings::where('slug', '=', 'pl_flag')->update(['value' => $pl_flag]);
                    }
                }
            }

            toast('General settings successfully updated', 'success');
            return redirect()->back();
        }
        $settings = allSettings();
        return view('admin.settings.general_settings', ['settings' => $settings,'menu' => 'Settings', 'page_title' => 'General Settings']);
    }

    # seo settings

    public function seoSettings(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = GeneralSettings::get();

            foreach ($data as $item) {

                if ($item->slug == 'title' && $item->value != $request->title) {
                    GeneralSettings::where('slug', '=', 'title')->update(['value' => $request->title]);

                } elseif($item->slug == 'meta_keywords' && $item->value != $request->meta_keywords) {
                    GeneralSettings::where('slug', '=', 'meta_keywords')->update(['value' => $request->meta_keywords]);

                } elseif ($item->slug == 'meta_author' && $item->value != $request->meta_author) {
                    GeneralSettings::where('slug', '=', 'meta_author')->update(['value' => $request->meta_author]);

                } elseif ($item->slug == 'meta_description' && $item->value != $request->meta_description) {
                    GeneralSettings::where('slug', '=', 'meta_description')->update(['value' => $request->meta_description]);

                }
            }

            toast('SEO settings successfully updated', 'success');
            return redirect()->back();
        }
        $settings = allSettings();
        return view('admin.settings.seo', ['settings' => $settings,'menu' => 'Settings', 'page_title' => 'SEO Settings']);
    }



    # Social link settings

    public function socialLink(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = GeneralSettings::get();

            foreach ($data as $item) {

                if($item->slug == 'facebook' && $item->value != $request->facebook) {
                    GeneralSettings::where('slug', '=', 'facebook')->update(['value' => $request->facebook]);

                } elseif ($item->slug == 'twitter' && $item->value != $request->twitter) {
                    GeneralSettings::where('slug', '=', 'twitter')->update(['value' => $request->twitter]);

                } elseif ($item->slug == 'linkedin' && $item->value != $request->linkedin) {
                    GeneralSettings::where('slug', '=', 'linkedin')->update(['value' => $request->linkedin]);

                } elseif ($item->slug == 'skype' && $item->value != $request->skype) {
                    GeneralSettings::where('slug', '=', 'skype')->update(['value' => $request->skype]);

                }elseif ($item->slug == 'pinterest' && $item->value != $request->pinterest) {
                    GeneralSettings::where('slug', '=', 'pinterest')->update(['value' => $request->pinterest]);

                }
            }

            toast('Social link successfully updated', 'success');
            return redirect()->back();
        }

        $settings = allSettings();
        return view('admin.settings.social_link', ['settings' => $settings, 'menu' => 'Settings', 'page_title' => 'Social link']);
     }

     # admin


    public function settings()
    {
        $data['adm_setting'] = allsettings();

        return view('admin.layouts.admin_settings.settings', $data);
    }

    # donations settings

    public function donations (Request $request)
    {
        if($request->isMethod('post')){

            $serCarData['value'] = $request->service_charge ;
            $serCarData['is_percentage'] = $request->is_percentage ;

            $serviceCharge = ServiceCharge::first();
            $serviceCharge->update( $serCarData);

            $slotData['value1'] = $request->value1;
            $slotData['value2'] = $request->value2;
            $slotData['value3'] = $request->value3;
            $slotData['value4'] = $request->value4;
            $slotData['value5'] = $request->value5;
            $slotData['value6'] = $request->value6;
            $slotData['value7'] = $request->value7;
            $slotData['value8'] = $request->value8;
            $slotData['value9'] = $request->value9;

            $slots = DonationSlot::first();

            $slots->update($slotData);

            toast('Donation settings successfully updated', 'success');
            return redirect()->back();

        }

        $slots = DonationSlot::first();
        $serviceCharge = ServiceCharge::first();
        return view('admin.settings.donation',['menu' => 'Settings', 'page_title' => 'Donation' , 'slots' => $slots, 'serviceCharge' => $serviceCharge]);
    }
}
