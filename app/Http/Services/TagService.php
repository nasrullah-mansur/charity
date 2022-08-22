<?php

namespace App\Http\Services;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagService
{
    /*
     *  * Data process
     */

     public function getData($request)
     {
      $tagData['pl_name'] = $request->pl_name;
      $tagData['slug'] = time().'-'.Str::slug($request->pl_name, '-');
      $tagData['sl_name'] = $request->sl_name ? $request->sl_name : $request->pl_name;

      $tagData['active_status'] = $request->get('active_status');

        return$tagData;
     }


    /*
     *  * store Tag
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

       $tagData = $this->getData($request);
       $tag = Tag::create($tagData);

        if ($tag) {

            $data['success'] = true;
            $data['message'] = __('The Tag successfully added');
            $data['data'] = $tag;

            return $data;
        }
        return $data;

    }

    //    ***************** End adding  Tag *******************

    /*
     *  * update Tag
     */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $tag = Tag::where('id', $request->edit_id)->first();

        if ($tag) {

           $tagData = $this->getData($request);
            $success = $tag->update($tagData);

            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Tag successfully updated');
                $data['data'] = $tag;

                return $data;
            }

            return $data;
        }

        $data['message'] = "Tag doesn't exists";
        return $data;
    }

    //    ***************** End update  Tag *******************


    public function delete($id)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $tag = Tag::where(['id' => decrypt($id)])->first();
        if ($tag) {

            $success = $tag->delete();
            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Tag successfully deleted');

                return $data;
            }
            return $data;
        }

        $data['message'] = "Tag doesn't exists";
        return $data;

    }

}
