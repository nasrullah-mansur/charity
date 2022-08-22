<?php

namespace App\Http\Services;


use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService
{


    /*
     *  * Data process
     */

     public function getData($request)
     {
       $categoryData['pl_name'] = $request->pl_name;
       $categoryData['slug'] =Str::slug(time().'-'. $request->pl_name, '-') ;
       $categoryData['sl_name'] = $request->sl_name ? $request->sl_name : $request->pl_name;

       $categoryData['post_category'] = $request->get('post_category');
       $categoryData['campaign_category'] = $request->get('campaign_category');

        return $categoryData;
     }


    /*
     *  * store Category
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];


        $categoryData = $this->getData($request);
        $category = Category::create($categoryData);

        if ($category) {

            $data['success'] = true;
            $data['message'] = __('The Category successfully added');
            $data['data'] = $category;

            return $data;
        }
        return $data;

    }

    //    ***************** End adding  Category *******************

    /*
     *  * update Category
     */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $Category = category::where('id', $request->edit_id)->first();

        if ($Category) {

            $categoryData = $this->getData($request);
            $success = $Category->update($categoryData);

            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Category successfully updated');
                $data['data'] = $Category;

                return $data;
            }

            return $data;
        }

        $data['message'] = "Category doesn't exists";
        return $data;
    }

    //    ***************** End update  Category *******************


    public function delete($id)
    {
        $data = ['success' => false, 'data' => '', 'message' => __('Something went wrong, please try again, Thanks')];

        $category = category::where(['id' => decrypt($id)])->first();
        if ($category) {

            removeImage(path_image(), $category->image);

            $success = $category->delete();
            if ($success) {

                $data['success'] = true;
                $data['message'] = __('The Category successfully deleted');

                return $data;
            }
            return $data;
        }

        $data['message'] = "Category doesn't exists";
        return $data;

    }

}
