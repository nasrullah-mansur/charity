<?php

namespace App\Http\Services;

use App\Models\ContactUs;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class CustomerRelationshipManagementService
{
    public function newsletterStore($request)
    {
        $data = ['success' => false, 'data' => [], 'message' => 'something went wrong'];

        $newsletterData['email'] = $request->email;

        $existEmail = Subscription::where('email', $newsletterData['email'])->exists();
        if ($existEmail) {
            $data['message'] = 'Your already subscribed to the '. allSettings('company_name').', thanks';
            return $data;
        }
        $newsletter = Subscription::create($newsletterData);

        if ($newsletter) {
            $data['success'] = true;
            $data['data'] = $newsletter;
            $data['message'] = 'Your successfully subscribed to the '. allSettings('company_name').', thanks' ;

            return $data;
        }

        return $data;
    }

    # contact us store form user side

    public function contactUsStore($request)
    {
        $data = ['success' => false, 'data' => [], 'message' => 'something went wrong'];

        $contactData['user_id'] = Auth::id();
        $contactData['first_name'] = $request->first_name;
        $contactData['last_name'] = $request->last_name;
        $contactData['phone'] = $request->phone;
        $contactData['email'] = $request->email;
        $contactData['message'] = $request->message;

        $contactus = ContactUs::create($contactData);

        if ($contactus) {
            $data['success'] = true;
            $data['data'] = $contactus;
            $data['message'] = 'Your message has been sent to the '. allSettings('company_name');

            return $data;
        }

        return $data;
    }

}

