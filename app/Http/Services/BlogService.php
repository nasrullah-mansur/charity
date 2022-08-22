<?php

namespace App\Http\Services;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogTag;
use App\Models\SlBlog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogService
{

    /*
    *  * preparing form data for storing  and updating
    */

    private function getData($request)
    {
        $blogData['author_id'] = Auth::guard('admin')->id();

        if ($request->edit_id) {
            $blog = Blog::where('id', $request->edit_id)->first();
        }

        $blogData['category_id'] = $request->category_id;
        $blogData['pl_title'] = $request->pl_title;
        $blogData['slug'] = isset($request->slug) ? $request->slug : (strlen($blogData['pl_title']) > 120 ? Str::slug(time() . '-' . substr($blogData['pl_title'], 0, 120), '-') : Str::slug(time() . '-' . $blogData['pl_title'], '-'));
        $blogData['pl_description_pre_image'] = $request->pl_description_pre_image;
        $blogData['pl_description_post_image'] = $request->pl_description_post_image;

        $blogData['sl_title'] = $request->sl_title ? $request->sl_title : $request->pl_title;
        $blogData['sl_description_pre_image'] = $request->sl_description_pre_image ? $request->sl_description_pre_image : $request->pl_description_pre_image;
        $blogData['sl_description_post_image'] = $request->sl_description_post_image ? $request->sl_description_post_image  : $request->pl_description_post_image;

        $blogData['active_status'] = isset($request->active_status) ? $request->active_status : true;
        $blogData['popular'] = $request->has('popular') ? true : false;

        if (!empty($request->primary_image)) {

            $old_img = isset($blog) ? $blog->primary_image : '';
            $blogData['primary_image'] = fileUpload($request['primary_image'], path_image(), $old_img); // upload file
        }

        if (!empty($request->secondary_image)) {

            $old_img = isset($blog) ? $blog->secondary_image : '';
            $blogData['secondary_image'] = fileUpload($request['secondary_image'], path_image(), $old_img); // upload file
        }

        return $blogData;
    }

    /*
     *  * store blog
     */

    public function store($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $blogData = $this->getData($request);

        $blog = Blog::create($blogData);

        if ($blog) {

            if($request->tag)
            {
               for($i = 0 ; $i < count($request->tag) ; $i ++){

                   BlogTag::create([
                       'blog_id' => $blog->id,
                       'tag_id' => $request->tag[$i],
                   ]);
               }
            }

            $data['success'] = true;
            $data['message'] = 'Blog Successfully added';
            $data['data'] = $blog;

            return $data;
        }
        return $data;

    }

    /*
    *  * update blog
    */

    public function update($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

          $blog = Blog::where('id', $request->edit_id)->first();

        if ($blog) {

            $blogData = $this->getData($request);
            $success = $blog->update($blogData);

            if ($success) {
                if($blog->blogTags)
                {
                  $blogTags =  BlogTag::where('blog_id', $blog->id)->delete();

                }
                if($request->tag)
                {
                   for($i = 0 ; $i < count($request->tag) ; $i ++){

                       BlogTag::create([
                           'blog_id' => $blog->id,
                           'tag_id' => $request->tag[$i],
                       ]);
                   }
                }

                $data['success'] = true;
                $data['message'] = 'Banner Successfully updated';
                $data['data'] = $blog;

                return $data;
            }
            return $data;
        }

        $data['message'] = "Blog doesn't exists";
        return $data;

    }

    /*
     *  Delete Banner
     */

    public function delete($id)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $blog = Blog::where('id', decrypt($id))->first();
        if ($blog) {

            removeImage(path_image(), $blog->image);

            $delete = $blog->delete();

            if ($delete) {

                $data['success'] = true;
                $data['message'] = 'Blog Successfully deleted';

                return $data;
            }
            return $data;
        }

        $data['message'] = "Blog doesn't exists";
        return $data;

    }


//    ********************** End Banner Delete  **********************



    public function comment($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => []];

        $user = User::where('id', Auth::id())->first();

        $commentData['parent_id'] = isset($request->comment_id) ? $request->comment_id : PARENT;
        $commentData['blog_id'] = $request->blog_id;
        $commentData['user_id'] = isset($user) ? $user->id : null;
        $commentData['first_name'] = isset($user) ? $user->first_name : $request->first_name;
        $commentData['last_name'] = isset($user) ? $user->last_name : $request->last_name;
        $commentData['email'] = isset($user) ? $user->email : $request->email;
        $commentData['comment'] = $request->comment;

        $comment = BlogComment::create($commentData);

        if ($comment) {
            $data['success'] = true;
            $data['message'] = 'comment successfully added';

            return $data;
        }

        return $data;


    }
}
