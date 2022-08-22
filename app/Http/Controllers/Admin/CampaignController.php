<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    # under approval
    public function approval(Request $request)
    {

        if ($request->ajax()) {

            $campaign = Campaign::where(['is_approved' => false, 'status' => CAMPAIGN_PENDIGN])->select('*');

            return datatables($campaign)->editColumn('image', function ($campaign) {
                $logo = '<img src="' . $campaign->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('is_approved', function ($campaign) {

                $button = '' . $campaign->is_approved ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->addColumn('action', function ($campaign) {

                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.campaign.show', $campaign->slug). '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye-slash"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.slider.delete', $campaign->slug) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image', 'is_approved', 'action'])
                ->make(true);
        }

        return view('admin.campaign.approval', ['task' => 'List', 'page_title' => 'Under Approval', 'menu' => 'Campaign']);

    }
    # running
    public function running(Request $request)
    {

        if ($request->ajax()) {

            $campaign = Campaign::where(['is_approved' => true, 'status' => CAMPAIGN_RUNNING])->where('end_date', '>=', Carbon::now()->toDateString())->select('*');

            return datatables($campaign)->editColumn('image', function ($campaign) {
                $logo = '<img src="' . $campaign->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('is_approved', function ($campaign) {

                $button = '' . $campaign->is_approved ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->addColumn('action', function ($campaign) {

                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.campaign.show', $campaign->slug). '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye-slash"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.slider.delete', $campaign->slug) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image', 'is_approved', 'action'])
                ->make(true);
        }

        return view('admin.campaign.running', ['task' => 'List', 'page_title' => 'Running', 'menu' => 'Campaign']);

    }
    # completed
    public function completed(Request $request)
    {
        if ($request->ajax()) {

            $campaign = Campaign::where('end_date' , '<', Carbon::now()->toDateString())->orwhere('status' , \CAMPAIGN_COMPLETED)->select('*');

            return datatables($campaign)->editColumn('image', function ($campaign) {
                $logo = '<img src="' . $campaign->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('is_approved', function ($campaign) {

                $button = '' . $campaign->is_approved ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->addColumn('action', function ($campaign) {

                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.campaign.show', $campaign->slug). '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye-slash"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.slider.delete', $campaign->slug) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image', 'is_approved', 'action'])
                ->make(true);
        }

        return view('admin.campaign.completed', ['task' => 'List', 'page_title' => 'Completed', 'menu' => 'Campaign']);

    }


    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();
        if($campaign)
        {
            return view('admin.campaign.show', ['page_title' => 'Campaign Details', 'menu' => 'Campaign', 'campaign' => $campaign]);
        }
        toast('Something went wrong', 'warning');
        return redirect()->back();
    }


    # approved
    public function approved(Request $request)
    {
        $campaign = Campaign::where('id',$request->edit_id)->first();
        if($campaign)
        {
            $campaign->update([
                'is_approved' => $request->is_approved,
                'status' =>$request->is_approved == STATUS_ACTIVE ? CAMPAIGN_RUNNING : \CAMPAIGN_PENDIGN,
            ]);

            $message = $request->is_approved == STATUS_ACTIVE ? 'Campaign successfully approved' : 'Campaign goes to under approval' ;


            toast($message, 'success');
            return redirect()->route('admin.campaign.running');
        }

        toast('Something went wrong', 'warning');
        return redirect()->back();
    }
}
