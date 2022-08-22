<?php

namespace App\Http\Services;


use App\Models\Partner;
use Illuminate\Support\Facades\Auth;

class PartnerService
{
    /*
     *  * store Partner
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];


        $partData['link'] = $request->link;
        $partData['active_status'] = $request->active_status;

        if (!empty($request->image)) {

            $old_img = '';
            $partData['image'] = fileUpload($request['image'], path_image(), $old_img);

        }

        $partner = Partner::create($partData);
        if ($partner) {

            $data['success'] = true;
            $data['message'] = 'Partner successfully added';
            $data['data'] = $partner;

            return $data;
        }

        return $data;
    }


    /*
        *  update Partner
    */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $partner = Partner::where('id', $request->edit_id)->first();

        if ($partner) {

            $partData['link'] = $request->link;
            $partData['active_status'] = $request->active_status;

            if (!empty($request->image)) {

                $old_img = $partner->image;
                $partData['image'] = fileUpload($request['image'], path_image(), $old_img);

            }

            $success = $partner->update($partData);
            if ($success) {

                $data['success'] = true;
                $data['message'] = 'Partner Successfully updated';
                $data['data'] = $partner;

                return $data;
            }
            return $data;
        }

        $data['message'] = "Partner doesn't exists";
        return $data;
    }


    /*
     *  Delete Partner
     */

    public function delete($id)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $partner = Partner::where('id', decrypt($id))->first();

        if ($partner) {

            removeImage(path_image(), $partner->image);

            $success = $partner->delete();

            if ($success) {

                $data['success'] = true;
                $data['message'] = 'Partner Successfully deleted';
                $data['data'] = '';

                return $data;
            }
            return $data;
        }

        $data['message'] = "Partner doesn't exists";
        return $data;

    }

//    ********************** End Partner Delete  **********************
}
