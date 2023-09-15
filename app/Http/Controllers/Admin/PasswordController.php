<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showChangePassword() {
        return view('admin.auth.changePassword');
    }


    public function changePassword(Request $request) {

        $value =  $request->validate([
            'current' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    return $fail(__('admin_messages.password.change.incorrect'));
                }
            }],
            'password' => 'required|string|confirmed|min:4|max:20|different:current',
        ]);

        if(Auth::guard()->attempt(['name'=>Auth::user()->name, 'password' => $value['current']])){
            $user = Auth::user();
            $user->password = Hash::make($value['password']);
            $user->save();

            $notify[] = ['success', __('admin_messages.password.change.success')];
            return redirect()->route('adminHome')->withNotify($notify);
        }
        throw ValidationException::withMessages([
            'current' => [trans('auth.failed')],
        ]);
    }
}
