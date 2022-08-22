<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonarFeedbackRequest;
use App\Http\Requests\TeamMemberRequest;
use App\Http\Services\DonarFeedbackService;
use App\Models\DonarFeedback;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonarFeedbackController extends Controller
{
    private $donarFeedbackService;

    public function __construct(DonarFeedbackService $donarFeedbackService)
    {
        return $this->donarFeedbackService = $donarFeedbackService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $feedback = DonarFeedback::select('*');

            return datatables($feedback)->editColumn('image', function ($feedback) {
                $logo = '<img src="' . $feedback->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('pl_feedback', function ($feedback) {

                return Str::words($feedback->pl_feedback, 8, '...');

            })->editColumn('active_status', function ($feedback) {

                $button = '' . $feedback->active_status == STATUS_ACTIVE ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>' . '';
                return $button;

            })->addColumn('action', function ($feedback) {

                $button = $feedback->active_status == STATUS_ACTIVE ? '<a type="button"  href="' . route('admin.donar.feedback.status', [encrypt($feedback->id), encrypt(STATUS_INACTIVE)]) . '" class="btn btn-info btn-sm"><i class="fas fa-lock"></i></a>' : '<a type="button"  href="' . route('admin.donar.feedback.status', [encrypt($feedback->id), encrypt(STATUS_ACTIVE)]) . '" class=" btn btn-success btn-sm"><i class="fas fa-lock-open"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.donar.feedback.edit', encrypt($feedback->id)) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.donar.feedback.delete', encrypt($feedback->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image','pl_feedback', 'active_status', 'action'])
                ->make(true);
        }

        return view('admin.home.feedback.index', ['page_title' => 'Donar Feedback', 'menu' => 'Home']);
    }


    //********************** End Get all Donar Feedback ********************

    /*
     * * New Donar Feedback create/store
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {

            app(DonarFeedbackRequest::class);

            $feedback = $this->donarFeedbackService->store($request); // call store function from Donar Feedback service class to save Donar Feedback

            if ($feedback['success'] == true) {

                toast($feedback['message'], 'success');
                return redirect()->route('admin.donar.feedback');
            }

            toast($feedback['message'], 'warning');
            return redirect()->back();
        }
        return view('admin.home.feedback.create', ['task' => 'Create', 'menu' => 'Home', 'page_title' => 'Donar Feedback',]);
    }

    // ************************** End create/store Donar Feedback ******************

    /*
     * * Find Donar Feedback by editID and and pass Donar Feedback information to edit page and update
     */

    public function editUpdate(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {
            app(DonarFeedbackRequest::class);

            $feedback = $this->donarFeedbackService->update($request); // call store function from Donar Feedback service class to update Donar Feedback

            if ($feedback['success'] == true) {

                toast($feedback['message'], 'success');
                return redirect()->route('admin.donar.feedback');
            }

            toast($feedback['message'], 'warning');
            return redirect()->back();

        } else {

            $feedback = DonarFeedback::where('id', decrypt($id))->first();
            if ($feedback) {
                return view('admin.home.feedback.edit', ['feedback' => $feedback,'page_title' => 'Donar Feedback', 'menu' => 'Home']);

            } else {

                toast("Feedback doesn't exists", 'warning');
                return redirect()->back();
            }

        }
    }


    //************************End Edit/Update donar feedback ******************

    /*
     * * Find Feedback by ID DELETE it
     */

    public function delete($id)
    {
        $feedback = $this->donarFeedbackService->delete($id);

        if ($feedback['success'] == true) {

            toast($feedback['message'], 'success');
            return redirect()->route('admin.donar.feedback');
        }

        toast($feedback['message'], 'warning');
        return redirect()->back();
    }

    //************************End Delete Donar Feedback ******************

    /*
     * * Find Donar Feedback by ID and change active status,
     * * * if status is active; Donar Feedback is active at this moment,
     * * * * Otherwise it active
     */

    public function changeStatus($id, $status)
    {
        $feedback = DonarFeedback::where('id', decrypt($id))->first();

        if ($feedback) {

            $success = $feedback->update(['active_status' => decrypt($status)]);
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {
                toast('Feedback successfully ' . $message, 'success');
                return redirect()->back();
            }

            toast($message, 'success');
            return redirect()->back();

        }

        toast("Feedback doesn't exists", 'warning');
        return redirect()->back();

    }


    //************************End status active/inActive ******************


}
