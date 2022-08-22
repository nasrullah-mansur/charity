<?php

namespace App\Http\Services;

use App\Models\Campaign;
use App\Models\CampaignComment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CampaignService
{

    /*
     *  * store Campaign
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $campData['user_id'] =Auth::id();
        $campData['category_id'] = $request->category_id;

        $campData['pl_title'] = $request->pl_title;
        $campData['slug'] =time().'-'.Str::slug($request->pl_title, '-') ;
        $campData['sl_title'] = $request->sl_title ? $request->sl_title : $request->pl_title;
        $campData['pl_details'] = $request->pl_details;
        $campData['sl_details'] = $request->sl_details ? $request->sl_details : $request->pl_details;

        $campData['goal_amount'] = $request->goal_amount ?  $request->goal_amount : 0;

        $campData['start_date'] = $request->start_date ? $request->start_date : Carbon::now()->toDateString();
        $campData['end_date'] = $request->end_date;
        $campData['video_url'] = $request->video_url;
        $campData['address'] = $request->address;

        $campData['end_with_goal_achieve'] = $request->end_with_goal_achieve ? true :false;

        $campData['status'] = \CAMPAIGN_PENDIGN;

        if (!empty($request->image)) {

            $old_img = '';
            $campData['image'] = fileUpload($request['image'], path_image(), $old_img);

        }
        if (!empty($request->document)) {

            $old_img = '';
            $campData['document'] = fileUpload($request['document'], path_image(), $old_img);

        }

        $campaign = Campaign::create($campData);
        if ($campaign) {

            $data['success'] = true;
            $data['message'] = 'Campaign successfully added';
            $data['data'] = $campaign;

            return $data;
        }

        return $data;
    }


    /*
        *  update Campaign
    */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $campaign = Campaign::where('id', $request->edit_id)->first();

        if(!$campaign ){
            $data['message'] = "Campaign Doesn't exists";
            return $data ;
        }
        if($campaign->is_approved){
            $data['message'] = "Campaign already approved, so it is not possibl to update";
            return $data ;
        }
        $campData['pl_title'] = $request->pl_title ? $request->pl_title : $campaign->pl_title;

        if( $request->pl_title && $campaign->pl_title != $request->pl_title ){
            $campData['slug'] =time().'-'.Str::slug($request->pl_title, '-') ;
        }

        $campData['sl_title'] = $request->sl_title ? $request->sl_title : $campaign->sl_title;
        $campData['pl_details'] =$request->pl_details ? $request->pl_details : $campaign->pl_details;
        $campData['sl_details'] = $request->sl_details ? $request->sl_details : $campaign->sl_details;

        $campData['goal_amount'] = $request->goal_amount ?  $request->goal_amount : $campaign->goal_amount;

        $campData['start_date'] = $request->start_date ? $request->start_date : Carbon::now()->toDateString();
        $campData['end_date'] = $request->end_date;
        $campData['video_url'] = $request->video_url ? $request->video_url : $campaign->video_url;
        $campData['address'] = $request->address ? $request->address : $campaign->address;

        $campData['end_with_goal_achieve'] = $request->end_with_goal_achieve ? true : false;

        $campData['is_approved'] = false;
        $campData['status'] = \CAMPAIGN_PENDIGN;
        
        if (!empty($request->image)) {

            $old_img =  $campaign->image;
            $campData['image'] = fileUpload($request['image'], path_image(), $old_img);

        }
        if (!empty($request->document)) {

            $old_img = $campaign->document;
            $campData['document'] = fileUpload($request['document'], path_image(), $old_img);

        }

        $success = $campaign->update($campData);
        if ($success) {

            $data['success'] = true;
            $data['message'] = 'Campaign successfully updated';
            $data['data'] = $campaign;

            return $data;
        }

        return $data;
    }

    /*
     *  Delete Campaign
     */

    public function delete($id)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $Campaign = Campaign::where('id', decrypt($id))->first();

        if ($Campaign) {

            removeImage(path_image(), $Campaign->image);

            $success = $Campaign->delete();

            if ($success) {

                $data['success'] = true;
                $data['message'] = 'Campaign Successfully deleted';
                $data['data'] = '';

                return $data;
            }
            return $data;
        }

        $data['message'] = "Campaign doesn't exists";
        return $data;

    }

//    ********************** End Campaign Delete  **********************

    public function campaignComment($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $user = User::where('id', Auth::id())->first();
        $commentData['campaign_id'] = $request->campaign_id;
        $commentData['user_id'] = isset($user) ? $user->id : null;
        $commentData['first_name'] = isset($user) ? $user->first_name : $request->first_name;
        $commentData['last_name'] = isset($user) ? $user->last_name : $request->last_name;
        $commentData['email'] = isset($user) ? $user->email : $request->email;
        $commentData['comment'] = $request->comment;
        $commentData['parent_id'] = $request->comment_id ? $request->comment_id : PARENT;
// dd( $commentData);
        $comment = CampaignComment::create($commentData);

        return  $comment;

    }
}
