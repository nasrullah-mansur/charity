<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Http\Services\PartnerService;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        return $this->partnerService = $partnerService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

           $partner = Partner::select('*');

            return datatables($partner)->editColumn('image', function ($partner) {
                $logo = '<img src="' .$partner->image . '" height="70" width="90" alt="No Image"/>';
                return $logo;

            })->editColumn('active_status', function ($partner) {

                $button = '' .$partner->active_status  ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>' . '';
                return $button;

            })->addColumn('action', function ($partner) {

                $button =$partner->active_status ? '<a type="button"  href="' . route('admin.partner.status', [encrypt($partner->id), encrypt(STATUS_INACTIVE)]) . '" class="btn btn-info btn-sm"><i class="fas fa-lock"></i></a>' : '<a type="button"  href="' . route('admin.partner.status', [encrypt($partner->id), encrypt(STATUS_ACTIVE)]) . '" class=" btn btn-success btn-sm"><i class="fas fa-lock-open"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.partner.edit', encrypt($partner->id)) . '" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" href="' . route('admin.partner.delete', encrypt($partner->id)) . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })
                ->addIndexColumn()
                ->rawColumns(['image', 'active_status', 'action'])
                ->make(true);
        }

        return view('admin.partner.index', ['task' => 'List', 'page_title' => 'Partner', 'menu' => 'Home']);
    }


    //********************** End Get all Partner ********************

    /*
     * * New Partner add/create and update
     */

    public function createStore(Request $request)
    {
        if ($request->isMethod('POST')) {
            app(PartnerRequest::class);
           $partner = $this->partnerService->store($request); // call store function from Partner service class to save Partner

            if ($partner['success'] == true) {

                toast($partner['message'], 'success');
                return redirect()->route('admin.partner');
            }

            toast($partner['message'], 'warning');
            return redirect()->back();
        }

        return view('admin.partner.create', ['task' => 'Create', 'menu' => 'Home', 'page_title' => 'Partner',]);
    }

    // ************************** End add/create and update ******************

    /*
     * * Find Partner by editID and and pass Partner information to edit page and update
     */

    public function editUpdate(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {
           $partner = $this->partnerService->update($request); // call update function from Partner service class to update Partner

            if ($partner['success'] == true) {

                toast($partner['message'], 'success');
                return redirect()->route('admin.partner');
            }

            toast($partner['message'], 'warning');
            return redirect()->back();

        } else {

            try {

               $partner = Partner::where('id', decrypt($id))->first();
                return view('admin.partner.edit', ['partner' =>$partner, 'task' => 'Edit', 'page_title' => 'Partner', 'menu' => 'Home']);

            } catch (\Exception $e) {

                toast("Partner doesn't exists", 'warning');
                return redirect()->back();

            }
        }

    }

    //************************End Edit/Update Partner ******************


    /*
     * * Find Product by ID DELETE it
     */

    public function delete($id)
    {
       $partner = $this->partnerService->delete($id);

        if ($partner['success'] == true) {

            toast($partner['message'], 'success');
            return redirect()->route('admin.partner');
        }

        toast($partner['message'], 'warning');
        return redirect()->back();
    }

    //************************End Delete Partner ******************

    /*
     * * Find Partner by ID and change active status,
     */

    public function changeStatus($id, $status)
    {
       $partner = Partner::where('id', decrypt($id))->first();

        if ($partner) {

            $success =$partner->update(['active_status' => decrypt($status)]);   // active = 1; in active = 0;
            $message = decrypt($status) == STATUS_ACTIVE ? 'Active' : 'inActive';

            if ($success) {

                toast('Partner successfully ' . $message, 'success');
                return redirect()->back();
            }

            toast("Something went wrong", 'warning');
            return redirect()->back();
        }

        toast("Partner doesn't exists", 'warning');
        return redirect()->back();

    }


    //************************End status active/inActive ******************


}
