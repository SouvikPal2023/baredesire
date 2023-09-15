<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Str;
use Mail;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin', [
            'except' => [
                'logout'
            ]
        ]);
    }

    public function showLoginForm() {
        return view('admin.auth.login'); //TODO
    }
    
    public function username()
    {
        return 'email';
    }
    
    protected function guard(){
        return Auth::guard('admin');
    }
    
    // protected function authenticated(Request $request, $user){
    //     if($request->password){
    //         return redirect()->route('admin.showChangePassword');
    //     }
    // }
    
    protected function redirectTo(){
        return route('adminHome');
    }
    
    protected function loggedOut(Request $request) {
        return redirect()->route('admin.login');
    }
    
    
    
    
    
    public function showForgetPasswordForm()
    {
        return view('admin.auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:admin_users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);


        Mail::send('admin.auth.email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            //$message->to($request->email);
            $message->to($request['email']);
            $message->subject('Reset Admin Password');
        });

        $notify[] = ['success', __('We have e-mailed your password reset link!')];
        return redirect()->back()->withNotify($notify);
    }


    public function showResetPasswordForm($token)
    {
        $reset = DB::table('password_resets')->where(['token' => $token])->first();
        $data['email'] = $reset->email;
        $data['token'] = $token;

        return view('admin.auth.forgetPasswordLink', $data);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admin_users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = AdminUser::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        $notify[] = ['success', __('Your password has been changed!')];
        return redirect()->route('admin.login')->withNotify($notify);
    }
}
