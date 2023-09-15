<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        return view('admin.dashboard');
    }


    public function menu()
    {
        return view('admin.menu');
    }






    // public function contacts()
    // {
    //     $data['contacts'] = ContactDetail::orderBy('created_at', 'DESC')->paginate(10);
    //     return view('admin.contacts.contacts', $data);
    // }
    
    
    // public function contactDetail(ContactDetail $contactDetail)
    // {
    //     $data['contact'] = $contactDetail;
    //     return view('admin.contacts.contactDetail', $data);
    // }


    // public function subscriptions()
    // {
    //     $data['subscriptions'] = Subscriber::orderBy('created_at', 'DESC')->paginate(15);
    //     return view('admin.contacts.subscriptions', $data);
    // }




    // public function deleteContact($id)
    // {
    //     $contactDetail= ContactDetail::findOrFail($id);
    //     $contactDetail->delete();
        

    //     $notify[] = ['success', 'Contact is deleted!'];
    //     return redirect()->route('contacts')->withNotify($notify);
    // }



    // public function deleteContacts(Request $request)
    // {
    //     //dd($request);
    //     $ids = $request->ids;
    //     ContactDetail::whereIn('id', explode(",",$ids))->delete();
    //     return response()->json(['success'=>"Contact(s) Deleted successfully."]);
    // }

}
