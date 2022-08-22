<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        return $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $category = Category::select('*');

            return datatables($category)->editColumn('post_category', function ($category) {

                $button = '' . $category->post_category ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->editColumn('campaign_category', function ($category) {

                $button = '' . $category->campaign_category ? '<label class="text-success">Yes</label>' : '<label class="text-danger">No</label>' . '';
                return $button;

            })->addColumn('action', function ($category) {

                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.category.edit', encrypt($category->id)) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.category.delete', encrypt($category->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['post_category', 'campaign_category', 'action'])
                ->make(true);
        }

        return view('admin.category.index', ['page_title' => 'Category', 'menu' => 'News']);
    }


    //********************** End Get all Category ********************

    /*
     * * New Category create/store
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {
            app(CategoryRequest::class);

            $category = $this->categoryService->store($request); // call store function from Category service class to save Category

            if ($category['success'] == true) {

                toast($category['message'], 'success');
                return redirect()->route('admin.category');
            }

            toast($category['message'], 'warning');
            return redirect()->back();
        }
        return view('admin.category.create', ['task' => 'Create', 'menu' => 'News', 'page_title' => 'Category',]);
    }

    // ************************** End create/store Category ******************

    /*
     * * Find Category by editID and and pass Category information to edit page and update
     */

    public function editUpdate(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {

            app(CategoryRequest::class);

            $category = $this->categoryService->update($request); // call store function from Category service class to update Category

            if ($category['success'] == true) {

                toast($category['message'], 'success');
                return redirect()->route('admin.category');
            }

            toast($category['message'], 'warning');
            return redirect()->back();

        } else {

            $category = Category::where('id', decrypt($id))->first();
            if ($category) {
                return view('admin.category.edit', ['category' => $category, 'task' => 'Edit', 'page_title' => 'Category', 'menu' => 'News']);

            } else {

                toast("Category doesn't exists", 'warning');
                return redirect()->back();
            }

        }
    }


    //************************End Edit/Update Category ******************

    /*
     * * Find Product by ID DELETE it
     */

    public function delete($id)
    {
        $category = $this->categoryService->delete($id);

        if ($category['success'] == true) {

            toast($category['message'], 'success');
            return redirect()->route('admin.category');
        }

        toast($category['message'], 'warning');
        return redirect()->back();
    }

    //************************End Delete Category ******************

    /*
     * * Find Category by ID and change active status,
     * * * if status is active; Category is active at this moment,
     * * * * Otherwise it active
     */

    public function changeStatus($id, $status)
    {
        $category = category::where('id', decrypt($id))->first();

        if ($category) {

            $success = $category->update(['active_status' => decrypt($status)]);
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {
                toast('category successfully ' . $message, 'success');
                return redirect()->route('admin.category');
            }

            toast($message, 'success');
            return redirect()->back();

        }

        toast("category doesn't exists", 'warning');
        return redirect()->back();

    }


    //************************End status active/inActive ******************

}
