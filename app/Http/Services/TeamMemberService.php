<?php

namespace App\Http\Services;


use App\Models\TeamMember;

class TeamMemberService
{
    /*
     *  * store Team member
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $teamtData['name'] = $request->name;
        $teamtData['pl_designation'] = $request->pl_designation;
        $teamtData['sl_designation'] = $request->sl_designation ? $request->sl_designation : $request->sl_designation;

        $teamtData['active_status'] = $request->active_status;


        if (!empty($request->image)) {

            $old_img = '';
            $teamtData['image'] = fileUpload($request['image'], path_image(), $old_img);  // upload image/file
        }

        $teamMember = TeamMember::create($teamtData);

        if ($teamMember) {

            $data['success'] = true;
            $data['message'] = __('The Team member successfully added');
            $data['data'] = $teamMember;

            return $data;
        }
        return $data;

    }

    //    ***************** End add  Team member *******************

    /*
     *  * update Team member
     */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $team = TeamMember::where('id', $request->edit_id)->first();

        if ($team) {

            $teamtData['name'] = $request->name;
            $teamtData['pl_designation'] = $request->pl_designation;
            $teamtData['sl_designation'] = $request->sl_designation ? $request->sl_designation : $team->sl_designation;

            $teamtData['active_status'] = $request->active_status;


            if (!empty($request->image)) {

                $old_img = isset($talent) ? $talent->image : '';

                $teamtData['image'] = fileUpload($request['image'], path_image(), $old_img);  // upload image/file
            }

            $success = $team->update($teamtData);

            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Team member successfully updated');
                $data['data'] = $team;

                return $data;
            }

            return $data;
        }

        $data['message'] = "Team member doesn't exists";
        return $data;
    }

    //    ***************** End update  Team member *******************


    public function delete($id)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $talent = TeamMember::where(['id' => decrypt($id)])->first();
        if ($talent) {

            removeImage(path_image(), $talent->image);

            $success = $talent->delete();
            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Team member successfully deleted');

                return $data;
            }
            return $data;
        }

        $data['message'] = "Team member doesn't exists";
        return $data;

    }

}
