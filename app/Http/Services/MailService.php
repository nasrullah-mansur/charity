<?php

namespace App\Http\Services;

use App\Models\ContactUsSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailService
{
    protected $defaultEmail;
    protected $defaultName;

    public function __construct()
    {
        $contact = ContactUsSetting::first();
        
        $this->defaultEmail =   $contact ?   $contact->email : 'info@gmail.com';
        $this->defaultName = allSettings()['company_name'];
    }

    public function send($template, $data = [], $to = '', $name = '', $subject = '')
    {
        try {

            Mail::send($template, $data, function ($message) use ($name, $to, $subject) {

                $message->to($to, $name)->subject($subject)->replyTo(
                    $this->defaultEmail, $this->defaultName
                );
                $message->from($this->defaultEmail, $this->defaultName);

            });
            return true;
        } catch (\Exception $e) {
//             return false;
            dd($e->getMessage());
        }
    }

}
