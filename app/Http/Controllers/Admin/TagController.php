<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Services\TagService;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    private $tagService;

    public function __construct(TagService $tagService)
    {
        return $this->tagService = $tagService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

          $tag = Tag::select('*');

            return datatables($tag)->editColumn('active_status', function ($tag) {

                $button = '' . $tag->active_status ? '<label class="text-success">Active</label>' : '<label class="text-danger">InActive</label>' . '';
                return $button;

            })->addColumn('action', function ($tag) {
                $button = $tag->active_status ? '<a type="button"  href="' . route('admin.tag.status', [encrypt($tag->id), encrypt(STATUS_INACTIVE)]) . '" class="btn btn-info btn-sm"><i class="fas fa-lock"></i></a>' : '<a type="button"  href="' . route('admin.tag.status', [encrypt($tag->id), encrypt(STATUS_ACTIVE)]) . '" class=" btn btn-success btn-sm"><i class="fas fa-lock-open"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.tag.edit', encrypt($tag->id)) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.tag.delete', encrypt($tag->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['active_status','action'])
                ->make(true);
        }

        return view('admin.tag.index', ['page_title' => 'Tag', 'menu' => 'News']);
    }


    //********************** End Get all Tag ********************

    /*
     * * New Tag create/store
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {
            app(TagRequest::class);

          $tag = $this->tagService->store($request); // call store function from Tag service class to save Tag

            if ($tag['success'] == true) {

                toast($tag['message'], 'success');
                return redirect()->route('admin.tag');
            }

            toast($tag['message'], 'warning');
            return redirect()->back();
        }
        return view('admin.tag.create', ['task' => 'Create', 'menu' => 'News', 'page_title' => 'Tag',]);
    }

    // ************************** End create/store Tag ******************

    /*
     * * Find Tag by editID and and pass Tag information to edit page and update
     */

    public function editUpdate(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {

            app(TagRequest::class);

          $tag = $this->tagService->update($request); // call store function from Tag service class to update Tag

            if ($tag['success'] == true) {

                toast($tag['message'], 'success');
                return redirect()->route('admin.tag');
            }

            toast($tag['message'], 'warning');
            return redirect()->back();

        } else {

          $tag = Tag::where('id', decrypt($id))->first();
            if ($tag) {
                return view('admin.tag.edit', ['tag' => $tag, 'task' => 'Edit', 'page_title' => 'Tag', 'menu' => 'News']);

            } else {

                toast("Tag doesn't exists", 'warning');
                return redirect()->back();
            }

        }
    }


    //************************End Edit/Update Tag ******************

    /*
     * * Find Product by ID DELETE it
     */

    public function delete($id)
    {
      $tag = $this->tagService->delete($id);

        if ($tag['success'] == true) {

            toast($tag['message'], 'success');
            return redirect()->route('admin.tag');
        }

        toast($tag['message'], 'warning');
        return redirect()->back();
    }

    //************************End Delete Tag ******************

    /*
     * * Find Tag by ID and change active status,
     * * * if status is active; Tag is active at this moment,
     * * * * Otherwise it active
     */

    public function changeStatus($id, $status)
    {
      $tag = Tag::where('id', decrypt($id))->first();

        if ($tag) {

            $success = $tag->update(['active_status' => decrypt($status)]);
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {
                toast('Tag successfully ' . $message, 'success');
                return redirect()->route('admin.tag');
            }

            toast($message, 'success');
            return redirect()->back();

        }

        toast("Tag doesn't exists", 'warning');
        return redirect()->back();

    }


    //************************End status active/inActive ******************

}

