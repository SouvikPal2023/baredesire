<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class AdminUserController extends Controller
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
    public function showAdminProfile()
    {
        $data['adminUser'] = auth()->user();
        return view('admin.adminUser.adminUser', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeAdminProfile(Request $request)
    {

        $adminUser = auth()->user();

        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:50',
            "email" => "required|email|string|max:60",
            "image" => "nullable|image|max:2000",
        ]);

        if ($request->image) {
            if (!empty($adminUser->image)) {
               Storage::delete($adminUser->image);
            }
            
            $values['image'] = Storage::putFile('public/adminProfile', new File($request->image));
        }

        $adminUser->fill($request->except(['image']));

        if (isset($values['image'])) {
            $adminUser->image = $values['image'];
        }


        if ($adminUser->isDirty()) {
            $adminUser->save();
            $changed = true;
        }

        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('showAdminProfile')->withNotify($notify);
        }


        $notify[] = ['success', __('admin_messages.profile.update')];
        return redirect()->route('showAdminProfile')->withNotify($notify);
    }

}
