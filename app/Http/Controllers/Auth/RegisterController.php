<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\ProductCategory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function showRegisterForm()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        return view('frontend.contents.login',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric','digits:10'],
            'password' => ['required', 'string', 'min:6'],
            "con_password" => ['required','min:6','same:password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $unique_id = User::orderBy('id', 'desc')->first();
        $number = str_replace('BDR','', $unique_id ? $unique_id->unique_id  : 0
    );
    if ($number == 0) {
        $number = 'BDR0000001';
    } else {
        $number = "BDR" . sprintf("%07d", $number + 1);
    }
        // $user->unique_id=  $uniqid;
     return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'unique_id'=>$number,
            'password' => Hash::make($data['password']),
        ]);
    //     auth()->login($user);
    //    return redirect()->route('dashboard')->with("success", "Record Saved successfully ");
    }

   
    protected function creates(Request $request)
    {

        $user = new User();
        
        $unique_id = User::orderBy('id', 'desc')->first();
        $number = str_replace('BDR','', $unique_id ? $unique_id->unique_id  : 0
    );
    if ($number == 0) {
        $number = 'BDR0000001';
    } else {
        $number = "BDR" . sprintf("%07d", $number + 1);
    }
        $user->unique_id=  $number;
        //dd($uniqid);
        $values = $request->validate([
            "name" => 'required|string|max:50',
            "email" => "required|email|unique:users,email",
            "phone" => "required|numeric|digits:10",
            "password" => "required|min:6",
            "con_password" => "required|min:6|same:password",
        ]);
      
        
        //dd( $newformat);

        $user->fill($values);
        
       
        // if ($request->hasFile('profile_image')) {
        //     $image = $request->profile_image;

        //     $extension = $image->getClientOriginalExtension();
        //     $filename = uniqid() . '_' . $request->name . '.' . $extension;
        //     $name = $image->getClientOriginalName();
        //     $storage_folder = 'public/student/';
        //     $image->storeAs($storage_folder, $filename);
        //     $user->profile_image = $filename;
        // }

        $user->save();
        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $user->id, 
            'token' => $token
          ]);
 
          $data = [
            'token' => $token,
        ];

//dd(  $data);
    Mail::to($request->email)->send(new EmailVerification($data));
//         $mytime = Carbon\Carbon::now();
// // echo $mytime->toDateTimeString();
//         $data = [
//             'email' => $request->email,
//             'password' => $request->password,
//             'college' => $college->name,
//             'course' => $course->name,
//             'date'=>$mytime->toDateTimeString(),

//         ];
//         Mail::to($request->email)->send(new RegistraionConfirmationMail($data));
//          Mail::to( $adminUser->email)->send(new NewRegistraionMail($data));
        return redirect()->route('dashboard')->with("success", "You have registered successfully and a verification link sent to your email ! ");
    }


    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
   if(! $verifyUser){
    return redirect()->route('login')->with('success','Sorry your email cannot be identified.');
   }
       
   
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
               
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                return redirect()->route('login')->with('success', "Your e-mail is verified. You can now login.");
            } else {
                return redirect()->route('login')->with('warning', "Your e-mail is already verified. You can now login.");
               
            }
        }
   
     
    }

}
