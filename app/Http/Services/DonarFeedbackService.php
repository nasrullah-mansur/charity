<?php

namespace App\Http\Services;

use App\Models\DonarFeedback;

class DonarFeedbackService
{

     /*
     *  * Data processing
     */

    public function getData($request)
    {
       $feedback = DonarFeedback::where('id', $request->edit_id)->first();

       $feedbacktData['name'] = $request->name;
       $feedbacktData['location'] = $request->location;
       $feedbacktData['pl_feedback'] = $request->pl_feedback;
       $feedbacktData['sl_feedback'] = $request->sl_feedback ? $request->sl_feedback :  $feedbacktData['pl_feedback'];

       $feedbacktData['active_status'] = $request->active_status;


       if (!empty($request->image)) {

           $old_img = isset($feedback) ? $feedback->image : '';

           $feedbacktData['image'] = fileUpload($request['image'], path_image(), $old_img);  // upload image/file
       }

       return $feedbacktData;

    }

   /*
    *  * store feedback
    */

   public function store($request)
   {
       $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

       $feedbacktData = $this->getData($request);
       $DonarFeedback = DonarFeedback::create($feedbacktData);

       if ($DonarFeedback) {

           $data['success'] = true;
           $data['message'] = __('The feedback successfully added');
           $data['data'] = $DonarFeedback;

           return $data;
       }
       return $data;

   }


    //    ***************** End add  feedback *******************

    /*
     *  * update feedback
     */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $feedback = DonarFeedback::where('id', $request->edit_id)->first();

        if ($feedback) {

            $feedbacktData = $this->getData($request);
            $success = $feedback->update($feedbacktData);

            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The feedback successfully updated');
                $data['data'] = $feedback;

                return $data;
            }

            return $data;
        }

        $data['message'] = "feedback doesn't exists";
        return $data;
    }

    //    ***************** End update  feedback *******************


    public function delete($id)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $feedback = DonarFeedback::where(['id' => decrypt($id)])->first();
        if ($feedback) {

            removeImage(path_image(), $feedback->image);

            $success = $feedback->delete();
            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The feedback successfully deleted');

                return $data;
            }
            return $data;
        }

        $data['message'] = "The feedback doesn't exists";
        return $data;

    }

}
