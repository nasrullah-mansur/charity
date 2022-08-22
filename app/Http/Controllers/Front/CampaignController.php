<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Services\CampaignService;
use App\Models\Campaign;
use App\Models\ServiceCharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    private $campaignServie;

    public function __construct(CampaignService $campaignServie)
    {
        $this->campaignServie = $campaignServie;
    }



    # pending campaign

    public function index()
    {
        $campaigns = Campaign::where(['user_id'=> Auth::id()])->orderBy('id', 'desc')->get();

        return view('front.campaign.index', ['campaigns' => $campaigns, 'menu' => 'Campaign']);
    }

    public function createStore (Request $request)
    {
        if($request->isMethod('POST')){
            app(CampaignRequest::class);
            $campaign = $this->campaignServie->store($request);
            if($campaign['success'] == true){

                toast($campaign['message'], 'success');
                return redirect()->route('user.campaign.pending');
            }

            toast($campaign['message'], 'warning');
            return redirect()->back();

        }

        $categories = Category::where('campaign_category', STATUS_ACTIVE)->get();
        $service = ServiceCharge::first();
        return view('front.campaign.create', ['menu' => 'Campaign', 'categories' =>  $categories, 'service' => $service]);
    }

    # pending campaign

    public function pending()
    {
        $campaigns = Campaign::where(['user_id'=> Auth::id(), 'is_approved' => false])->orderBy('id', 'desc')->get();

        return view('front.campaign.pending', ['campaigns' => $campaigns, 'menu' => 'Campaign']);
    }

    # running campaign

    public function running()
    {
        $campaigns = Campaign::where(['user_id'=> Auth::id(), 'status' => CAMPAIGN_RUNNING])->orderBy('id', 'desc')->get();

        return view('front.campaign.runnig', ['campaigns' => $campaigns, 'menu' => 'Campaign']);
    }


    # running campaign

    public function backed()
    {
        $campaigns = Campaign::where(['user_id'=> Auth::id()])->where(function($query){

            $query->where('end_date' , '<', Carbon::now()->toDateString())
            ->orwhere('status',\CAMPAIGN_COMPLETED );

           })->orderBy('id', 'desc')->get();
           
        return view('front.campaign.backed', ['campaigns' => $campaigns, 'menu' => 'Campaign']);
    }

    # edit campaign

    public function editUpdate (Request $request, $slug = null)
    {
        if($request->isMethod('POST')){

            $campaign = $this->campaignServie->update($request);

            if($campaign['success'] == true){

                toast($campaign['message'], 'success');
                return redirect()->route('user.campaign.pending');
            }

            toast($campaign['message'], 'warning');
            return redirect()->back();

        }

        $categories = Category::where('campaign_category', STATUS_ACTIVE)->get();
        $campaign = Campaign::where('slug', $slug)->first();

        if(!$campaign){

            toast("Campaign doesn't exists");
            return redirect()->back();
        }
        return view('front.campaign.edit', ['menu' => 'Campaign', 'categories' =>  $categories, 'campaign' => $campaign]);
    }

    public function view($slug){

        $campaign = Campaign::where('slug', $slug)->first();

        if(!$campaign){

            toast("Campaign doesn't exists");
            return redirect()->back();
        }
        return view('front.campaign.show', ['menu' => 'Campaign', 'campaign' => $campaign]);

    }
}
