<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ContactService;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
     * * Get All categories order by id decrement
     */
    private $contactService;

    public function __construct(ContactService $contactService, Request $request)
    {
        return $this->contactService = $contactService;

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $contact = ContactUs::select('*');

            return datatables($contact)->editColumn('created_at', function ($contact) {
                $date = Carbon::parse($contact->created_at)->diffForHumans();

                return $date;

            })->editColumn('admin_read', function ($contact) {

                $admin_read = $contact->admin_read ? '<lebel class="btn  btn-info">Read</lebel>' : '<lebel class="btn  btn-warning">Unread</lebel>';
                return $admin_read;

            })->addColumn('action', function ($contact) {

                $button = '<a type="button" name="delete" href="' . route('admin.contact.delete', [encrypt($contact->id)]) . '" class="btn-danger">Delete</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" name="edit" href="' . route('admin.contact.reply', [encrypt($contact->user_id)]) . '" class="edit btn btn-primary btn-sm">Reply</a>';

                return $button;
            })->addColumn('name', function ($contact) {
                 return $contact->first_name.' '.$contact->last_name;
            })
                ->addIndexColumn()
                ->rawColumns(['admin_read', 'created_at', 'action', 'name'])
                ->make(true);
        }

        return view('admin.users.contact', ['menu' =>'CRM', 'page_title' => 'Contact']);
    }

    /*
     * * Reply
     */

    public function Reply($user_id)
    {
        $contacts = ContactUs::where(['user_id' => decrypt($user_id)])->orderBy('id', 'asc')->get();
        $user = User::where('id', decrypt($user_id))->first();

        return view('admin.contact.reply', ['user' => $user, 'contacts' => $contacts, 'page_title' => 'Contact']);
    }

    public function sendReply(Request $request)
    {
        $save = $this->contactService->sendReply($request);

        if ($save['success'] == true) {
            return redirect()->route('admin.contact.index')->with('success', $save['message']);
        }
        return redirect()->route('admin.contact.index')->with('dismiss', $save['message']);
    }

    //************************End Reply ******************

    public function delete($id)
    {
        $contact = ContactUs::where('id', decrypt($id))->first();

        if ($contact) {

            $contact->delete();
            return redirect()->route('admin.contact.index')->with('success', 'message successfully deleted');
        }
        return redirect()->route('admin.contact.index')->with('dismiss', 'Message not found');
    }

    //************************End Delete category ******************


}

