<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRrequest;
use App\Http\Services\BlogService;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogService $blogService)
    {
        return $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $blog = Blog::select('*');

            return datatables($blog)->editColumn('active_status', function ($blog) {

                $button = '' . $blog->active_status == STATUS_ACTIVE ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>' . '';
                return $button;

            })->editColumn('popular', function ($blog) {

                $button = '' . $blog->popular ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->editColumn('en_title', function ($blog) {
               return Str::words($blog->en_title,10,'');

            })->editColumn('sl_title', function ($blog) {
               return Str::words($blog->sl_title,10,'');

            })->editColumn('primary_image', function ($blog) {
                $logo = '<img src="' .  $blog->primary_image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->addColumn('action', function ($blog) {

                $button = $blog->active_status == STATUS_ACTIVE ? '<a type="button"  href="' . route('admin.blogChangeStatus', [encrypt($blog->id), encrypt(STATUS_INACTIVE)]) . '" class="btn btn-info btn-sm"><i class="fas fa-lock"></i></a>' : '<a type="button"  href="' . route('admin.blogChangeStatus', [encrypt($blog->id), encrypt(STATUS_ACTIVE)]) . '" class=" btn btn-success btn-sm"><i class="fas fa-lock-open"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.blog.edit', $blog->slug) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.blog.delete', encrypt($blog->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['active_status', 'popular', 'primary_image', 'action','en_title' ,'sl_title'])
                ->make(true);
        }

        return view('admin.blog.index', ['task' => 'List', 'page_title' => 'News', 'menu' => 'News']);
    }


    //********************** End Get all Blog ********************

    /*
     * * New Blog create/store
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {

            // app(BlogRrequest::class);
            $blog = $this->blogService->store($request);

            if ($blog['success'] == true) {

                toast($blog['message'],'success');
                return redirect()->route('admin.blog');
            }

            toast($blog['message'],'warning');
            return redirect()->back();
        }
        $tags = Tag::all();
        $categories = Category::where('post_category', true)->orderBy('pl_name', 'asc')->get();
        return view('admin.blog.create', ['tags' => $tags,'categories' => $categories, 'task' => 'Create', 'menu' => 'News', 'page_title' => 'News',]);
    }

    // ************************** End add/create and update ******************

    /*
     * * Find Banner by slug and pass blog information to edit page
     */

    public function editUpdate(Request  $request, $slug = null)
    {
        if ($request->isMethod('POST')) {

            // app(BlogRrequest::class);

            // call update function from Blog service class to update Blog

            $blog = $this->blogService->update($request);

            if ($blog['success'] == true) {

                toast($blog['message'],'success');
                return redirect()->route('admin.blog');
            }

            toast($blog['message'],'warning');
            return redirect()->back();
        }

        $blog = Blog::where('slug', $slug)->with(['category', 'blogTags'])->first();
        if ($blog) {
            // $tags = Tag::whereDoesntHave('blogTag')->get();
            $tags = Tag::get();
            $categories = Category::where('post_category', true)->orderBy('pl_name', 'asc')->get();

            return view('admin.blog.edit', ['tags' => $tags,'categories' => $categories,'blog' => $blog, 'page_title' => 'News', 'menu' => 'News']);
        }

        toast( "Blog doesn't exists",'warning');
        return redirect()->back();

    }
    //************************End Edit Blog ******************

    /*
     * * Find Blog by ID DELETE it
     */

    public function delete($id)
    {
        $blog = $this->blogService->delete($id);

        if ($blog['success'] == true) {

            toast($blog['message'],'success');
            return redirect()->route('admin.blog');
        }

        toast($blog['message'],'warning');
        return redirect()->route('admin.blog');
    }

    //************************End Delete Blog ******************

    /*
     * * Find Blog by ID and change active status,
     */

    public function changeStatus($id, $status)
    {
        $blog = Blog::where('id', decrypt($id))->first();
        if ($blog) {

            $success = $blog->update(['active_status' => decrypt($status)]);
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {

                toast('Blog successfully '.$message,'success');
                return redirect()->route('admin.blog');
            }

            toast('Something went wrong','warning');
            return redirect()->route('admin.blog');
        }

        return redirect()->route('admin.blog')->with('warning', __("Blog doesn't exists"));

    }


    //************************End status active/inActive ******************


}
