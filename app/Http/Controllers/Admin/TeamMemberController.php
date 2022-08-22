<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TalentTeamRequest;
use App\Http\Requests\TeamMemberRequest;
use App\Http\Services\TeamMemberService;
use App\Models\TalentTeam;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeamMemberController extends Controller
{
    private $teamMemberService;

    public function __construct(TeamMemberService $teamMemberService)
    {
        return $this->teamMemberService = $teamMemberService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $talent = TeamMember::select('*');

            return datatables($talent)->editColumn('image', function ($talent) {
                $logo = '<img src="' . $talent->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('active_status', function ($talent) {

                $button = '' . $talent->active_status == STATUS_ACTIVE ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>' . '';
                return $button;

            })->addColumn('action', function ($talent) {

                $button = $talent->active_status == STATUS_ACTIVE ? '<a type="button"  href="' . route('admin.talent.team.status', [encrypt($talent->id), encrypt(STATUS_INACTIVE)]) . '" class="btn btn-info btn-sm"><i class="fas fa-lock"></i></a>' : '<a type="button"  href="' . route('admin.talent.team.status', [encrypt($talent->id), encrypt(STATUS_ACTIVE)]) . '" class=" btn btn-success btn-sm"><i class="fas fa-lock-open"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.talent.team.edit', encrypt($talent->id)) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.talent.team.delete', encrypt($talent->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image', 'active_status', 'action'])
                ->make(true);
        }

        return view('admin.home.talent_team.index', ['page_title' => 'Team Member', 'menu' => 'Home']);
    }


    //********************** End Get all Team Member ********************

    /*
     * * New Team Member create/store
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {

            app(TeamMemberRequest::class);

            $talent = $this->teamMemberService->store($request); // call store function from Team Member service class to save Team Member

            if ($talent['success'] == true) {

                toast($talent['message'], 'success');
                return redirect()->route('admin.talent.team');
            }

            toast($talent['message'], 'warning');
            return redirect()->back();
        }
        return view('admin.home.talent_team.create', ['task' => 'Create', 'menu' => 'Home', 'page_title' => 'Team Member',]);
    }

    // ************************** End create/store Team Member ******************

    /*
     * * Find Team Member by editID and and pass Team Member information to edit page and update
     */

    public function editUpdate(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {

            app(TeamMemberRequest::class);

            $talent = $this->teamMemberService->update($request); // call store function from Team Member service class to update Team Member

            if ($talent['success'] == true) {

                toast($talent['message'], 'success');
                return redirect()->route('admin.talent.team');
            }

            toast($talent['message'], 'warning');
            return redirect()->back();

        } else {

            $team = TeamMember::where('id', decrypt($id))->first();
            if ($team) {
                return view('admin.home.talent_team.edit', ['team' => $team, 'task' => 'Edit', 'page_title' => 'Team Member', 'menu' => 'Home']);

            } else {

                toast("Team Member doesn't exists", 'warning');
                return redirect()->back();
            }

        }
    }


    //************************End Edit/Update Team Member ******************

    /*
     * * Find Product by ID DELETE it
     */

    public function delete($id)
    {
        $talent = $this->teamMemberService->delete($id);

        if ($talent['success'] == true) {

            toast($talent['message'], 'success');
            return redirect()->route('admin.talent.team');
        }

        toast($talent['message'], 'warning');
        return redirect()->back();
    }

    //************************End Delete Team Member ******************

    /*
     * * Find Team Member by ID and change active status,
     * * * if status is active; Team Member is active at this moment,
     * * * * Otherwise it active
     */

    public function changeStatus($id, $status)
    {
        $talent = TeamMember::where('id', decrypt($id))->first();

        if ($talent) {

            $success = $talent->update(['active_status' => decrypt($status)]);
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {
                toast('Talent successfully ' . $message, 'success');
                return redirect()->route('admin.talent.team');
            }

            toast($message, 'success');
            return redirect()->back();

        }

        toast("Talent doesn't exists", 'warning');
        return redirect()->back();

    }


    //************************End status active/inActive ******************


}
