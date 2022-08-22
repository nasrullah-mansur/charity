<?php

namespace App\Http\Services;

use App\Models\ContactUsSetting;

class SettingsService
{

    public function contactUs($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => ''];


        $contData['pl_address'] = $request->pl_address;
        $contData['sl_address'] = $request->sl_address ?  $request->sl_address :  $request->pl_address;
        $contData['phone'] = $request->phone;
        $contData['email'] = $request->email;

        $contactUs = ContactUsSetting::first();

        if ($contactUs) {
            
            $contactUs->update($contData);
            $message = 'Contact address successfully updated';

        } else {
            $contactUs = ContactUsSetting::create($contData);
            $message = 'Contact address successfully created';

        }

        if (isset($contactUs)) {

            $data['success'] = true;
            $data['message'] = $message;
            $data['data'] = $contactUs;

            return $data;
        }

        return $data;


    }
}
