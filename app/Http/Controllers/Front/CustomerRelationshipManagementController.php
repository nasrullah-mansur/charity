<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\UserContactUsRequest;
use App\Http\Services\CustomerRelationshipManagementService;
use App\Models\Blog;
use App\Models\Partner;
use Illuminate\Http\Request;

class CustomerRelationshipManagementController extends Controller
{
    private $customerRelationshipManagementService;

    public function __construct(CustomerRelationshipManagementService $customerRelationshipManagementService)
    {
        return $this->customerRelationshipManagementService = $customerRelationshipManagementService;
    }

    public function newsletter(Request $request)
    {
        app(SubscriptionRequest::class);
        $newsletter = $this->customerRelationshipManagementService->newsletterStore($request);

        toast($newsletter['message'], 'success');
        return redirect()->back();
    }


    # contact us
    public function contactUs(Request $request)
    {
        if($request->isMethod('post')){
            app(ContactRequest::class);
            $newsletter = $this->customerRelationshipManagementService->contactUsStore($request);

            if ($newsletter['success'] == true) {
                toast($newsletter['message'], 'success');
                return redirect()->back();
            }

            toast($newsletter['message'], 'warning');
            return redirect()->back();
        }

        $info['news'] = Blog::where(['active_status' => STATUS_ACTIVE])->with('author')->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        return view('front.pages.contact_us',['active' => 'Contact', 'info'=>$info]);

    }
}
