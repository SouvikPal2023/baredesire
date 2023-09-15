<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Home1Section;
use App\Models\Home2Section;
use App\Models\Home3Section;
use App\Models\Home4Section;
use App\Models\Home5Section;
use App\Models\Home6Section;
use App\Models\Home7Section;
use App\Models\Home8Section;
use App\Models\Home9Section;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\AdminUser;
use App\Models\Contact;
use App\Models\Pincode;
use App\Models\EmailCheck;
use Illuminate\Support\Facades\Hash;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactDetail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Facebook\Facebook;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();  
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $data['section1']= Home1Section::first();
        $data['section2']= Home2Section::first();
        $data['section3']= Home3Section::first();
        $data['section4']= Home4Section::first();
        $data['section5']= Home5Section::first();
        $data['section6']= Home6Section::first();
        $data['section7']= Home7Section::first();
        $data['section8']= Home8Section::first();
        $data['section9']= Home9Section::first();
        $data['products']=Product::with('product_images')->where('is_featured',0)->orderBy('created_at', 'DESC')->get();
        
        // $fb = new Facebook([
        //     'app_id' => '270889692477833',
        //     'app_secret' => 'f505882c4ea8358903c28d90b9434da3',
        //     'default_graph_version' => 'v17.0', // Replace with the latest version
        // ]);
    
        // $accessToken = 'IGQWRPc0tIY1dOd01WbEdYc2NRNlhpaFZATdDliWURjdWJKNjZAwcTBLOGtEeW12LW9lc2JkdG1DNXg5ejRORjVTWWR2Q3l6eHZAGc3NfaXNEeWduSV9MYl8yVXJhc01XUGZATeG8xaGZAXek5TVVpvb2RZANkp5R2t2bFkZD';
    
        // try {
        //     // Use the Instagram User ID associated with your Instagram Business Account
        //     $response = $fb->get('/baredezireindia/media', $accessToken);
        //     $instagramFeed = $response->getDecodedBody();
        //     dd( $instagramFeed);
        //     return view('instagram.feed', ['feed' => $instagramFeed]);
        // } catch (Facebook\Exceptions\FacebookResponseException $e) {
        //     // Handle API errors
        //     return view('instagram.error', ['error' => $e->getMessage()]);
        // }
     
// $data['main_categories']=ProductCategory::where('level','0')->orderBy('created_at')->get();
// //dd($data['main_categories']);
// $data['filter_categories']=DB::select('select a.name as parent, b.name as child,c.name as subchild from `product_categories` a join `product_categories` b join `product_categories` c where a.id = b.parent_id and b.id=c.parent_id');
// //dd($data['filter_categories']);
// // $sub_catagories = DB::table('books_categories')
// // ->join('sub_catagories','sub_catagories.catId','=','books_categories.catId')->get();

// $data['sub_categories']=ProductCategory::where('level','2')->orderBy('created_at')->get();
        return view('frontend.contents.index',$data);
    } 

//     function buildTree($categories, $parentId = null)
// {
//     $tree = [];

//     foreach ($categories as $category) {
//         if ($category->parent_id === $parentId) {
//             $tree[] = [
//                 'id' => $category->id,
//                 'name' => $category->name,
//                 'children' => buildTree($categories, $category->id),
//             ];
//         }
//     }

//     return $tree;
// }

// $nestedCategories = buildTree($categories);

// return $nestedCategories;


    public function productDetail($id)
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
       $data['product']=Product::with('product_images','product_sizes','reviews')->find($id);
       $sumOfRatings = Review::where('product_id', $id)->sum('rating');
$revCount=Review::where('product_id', $id)->get();
$data['countRatings']=count($revCount);

$data['avgRating']=$data['countRatings']>0? $sumOfRatings/$data['countRatings'] :0;
       $product_categories = $data['product']->product_categories()->pluck('product_category_id');
       $data['similar_products'] = Product::whereHas('product_categories', function ($query) use($product_categories) {
        $query->whereIn('product_category_id', $product_categories);
    })->where('status', '1')->with('product_images')->where('id','!=',$id)->get();
//(  $data['avgRating']);
        return view('frontend.contents.product-detail',$data);
    } 

    public function allProduct()
    {
       

        return view('frontend.contents.allproduct');
    } 

   
    public function cartView()
    {
        $user=User::find(auth()->user()->id);
        $price=0;
        $sell_price=0;
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
        
        $data['carts'] = Cart::where('user_id',auth()->user()->id)->where('wishlist',0)->get();
        foreach( $data['carts'] as $cart){
            $product=Product::find($cart->product_id);
            $price+=$cart->quantity*$product->original_price;
            $sell_price+=$cart->quantity*$product->selling_price;
           $discount=$price-$sell_price;
        }
      
$data['price']=$price ?? 0;
$data['discount']=$discount ?? 0;
$data['tax']=ceil((($data['price']-$data['discount'])*5)/100);
//dd($price);
        return view('frontend.contents.cartView',$data);
    } 
    public function profile()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

       // $data['wishlists']=Cart::where('user_id',auth()->user()->id)->where('wishlist',1)->get();
//dd( $data['wishlists']);
        return view('frontend.contents.profile',$data);
    } 

    public function catProductDetail($id)
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
        
       $data['category']=ProductCategory::find($id);
       $data['categoryProducts'] = Product::whereHas('product_categories', function ($query) use ($id) {
        $query->where('product_categories.id', $id);
    })->get();

    $data['data_count']=$data['categoryProducts']->count();
    $data['section9']= Home9Section::first();
        return view('frontend.contents.productInner',$data);
    } 

    public function allProductList($id)
    {
        $allProducts = collect();
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
        
       $data['category']=ProductCategory::find($id);

       $mainCategory = ProductCategory::with('children.children.products')
       ->find($id);
       //dd( $mainCategory);
       foreach ($mainCategory->children as $subCategory) {
    
    
        foreach ($subCategory->children as $subSubCategory) {
            $allProducts = $allProducts->concat($subSubCategory->products);
        }
    }
$data['allProducts']= $allProducts;
    $data['data_count']=$data['allProducts']->count();
    $data['section9']= Home9Section::first();
        return view('frontend.contents.allproduct',$data);
    } 

    public function wishlist()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $data['wishlists']=Cart::where('user_id',auth()->user()->id)->where('wishlist',1)->get();
//dd( $data['wishlists']);
        return view('frontend.contents.wishlist',$data);
    } 


    public function orderlist()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $data['orderlists']=Order::where('user_id',auth()->user()->id)->orderByDesc('created_at')->get();
//dd( $data['wishlists']);
        return view('frontend.contents.orderList',$data);
    } 
    public function orderdetail(Order $order)
    {
        $price=0;
        $sell_price=0;
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $data['detail']=$order;
       
        foreach( $data['detail']->products as $prod){
            $product=Product::find($prod->id);
            $quantity=$data['detail']->products()
            ->where('products.id', $prod->id)
            ->first()
            ->pivot
            ->quantity;
            $price+=$quantity*$product->original_price;
            $sell_price+=$quantity*($product->selling_price);
           $discount=$price-$sell_price;
        }
      
$data['price']=$price ?? 0;
$data['discount']=$discount ?? 0;
$data['tax']=ceil((($data['price']-$data['discount'])*5)/100);
//dd( $data['wishlists']);
        return view('frontend.contents.orderDetail',$data);
    } 


    public function autocomplete(Request $request)
{
    $search = $request->input('query');
   
    $products = ProductCategory::where('name', 'LIKE', "%$search%")->where('level','2')
        ->orWhereHas('products', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")->where('status','1');
        })->where('status','1')
        ->limit(5)
        ->get();
//dd( $products);
    return response()->json($products);
 
}

public function cancelOrder(Request $request,Order $order)
{
    $values = $request->validate([
        "notes" => 'nullable|string|max:5000',
        
        
    ]);
    $order->notes=$values['notes'];
    $order->status='cancelled';
    $order->cancelled_at=now();
    $order->payment_status='cancelled';
    $order->save();
    return redirect()->back()->with('success', 'Your Ordered is cancelled!');
}
public function contactUs()
{
    $data['categories'] = ProductCategory::with(['children' => function ($query) {
        $query->where('status', '1');
    }])->whereNull('parent_id')->where('status','1')->get();
    $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
    return view('frontend.contents.contact',$data);
}

public function saveContactDetail(Request $request)
{

    $values = $request->validate([
         "name" => "required|string|max:100",
         "subject"=>"required|string",
         "email" => "required|email|max:100",
         'phone'=>'nullable|string|min:10|max:30',
         "message" => "nullable|string|regex:/^[\.\w,!?'\s-]*$/|max:500",
     ]);
     
     
     $contact = new Contact();
     $contact->name = $request->name;
     $contact->email = $request->email;
     $contact->phone = $request->phone;
     $contact->subject= $request->subject;
     $contact->message= $request->message;
     $contact->save();


     
         $admin = AdminUser::first();
         $email_to = $admin->email;
         Mail::to($email_to)->send(new ContactDetail($contact));
     
    

         return redirect()->back()->with('success', 'Thanks for contacting. We will get back to you soon!');
     
}


public function manageProfile(Request $request)
{

    $values = $request->validate([
        "name" => 'required|string|max:50',
        "email" => "required|email|string|max:60",
         'phone'=>'nullable|string|min:10|max:30',
        
     ]);
     
     
     $user =User::find(auth()->user()->id);
     $user->name = $request->name;
     $user->email = $request->email;
     $user->phone = $request->phone;
     $user->save();

         return redirect()->back()->with('success', 'Profile information has been changed succefully!');
     
}


public function managePassword(Request $request)
    {
        $changed = false;
        $values = $request->validate([

            "old_password"=>"required",
            "password"=>"required|min:6|different:old_password",
            "con_password"=>"required|same:password",

        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error","Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' =>Hash::make($request->password)
        ]);

        return back()->with("success", "Password changed successfully!");

    }
 public function pincode(Request $request)
    {
        try{
        $values = $request->validate([

            "pincode"=>"required|string",
           

        ]);

      $pincode=Pincode::where('pincode',$request->pincode)->first();
      if($pincode){
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Pincode is eligible for shipping!',
        ], Response::HTTP_OK);
      }else{
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Pincode is not eligible for shipping!',
        ], Response::HTTP_OK);
      }
      
    }catch (\Throwable$th) {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Error Occured!',
        ], Response::HTTP_NOT_FOUND);
    }
      //dd($pincode);
      

       

    }
    public function emailCheck(Request $request)
    {
       
        $values = $request->validate([

            "email" => "required|email|string|max:60",
           

        ]);

      $email=EmailCheck::where('email',$request->email)->first();
      if($email){
        return back()->with("warning", "Email is already there with us.We will contact with you soon!");
      }else{
        $email= new EmailCheck();
        $email->email=$request->email;
        $email->save();
        return back()->with("success", "Thanks for your response.We will contact with you soon!");
      }
      
    

    }
    
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $user=User::where('email',$request->email)->first();
        //dd($user->user_role_id);
        

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);
          $data = [
              'token' => $token,
          ];


      Mail::to($request->email)->send(new ForgetPasswordMail($data));

        return redirect()->back()->with('success','We have e-mailed your password reset link!');
    }
    public function showResetPasswordForm($token) {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();
       $data['token']=$token;
       //dd( $data['token']);
        return view('frontend.contents.forgetPasswordLink', $data);
     }

     /**
      * Write code on Method
      *
      * @return response()
      */
     public function submitResetPasswordForm(Request $request)
     {

//dd($request->token);
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);

         $user=User::where('email',$request->email)->first();
        

         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email,
                               'token' => $request->token
                             ])
                             ->first();

         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }

         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();

         return redirect()->route('login')->with('success', 'Your password has been changed!');
     }

     public function postReview(Request $request)
     {

//dd($request->all());
         $request->validate([
             'review' => 'required|string|max:255',
             'rating' => 'required',
             
         ]);

       $product_id=$request->id;
        

        $review=Review::where('product_id',$request->id)->where('user_id',auth()->user()->id)->first();
if($review){
    return redirect()->back()->with('warning', 'You have already reviewed the product!');
}else{
    
    $hasProduct = auth()->user()->orders()->whereHas('products', function ($query) use ($product_id) {
        $query->where('products.id', $product_id);
    })->exists();
    if ($hasProduct) {
      $rev=new Review();
      $rev->product_id= $product_id;
      $rev->user_id=auth()->user()->id;
      $rev->review=$request->review;
      $rev->rating=$request->rating;
      $rev->save();
      return redirect()->back()->with('success', 'Product reviewed successfully!');

    } else {
        return redirect()->back()->with('warning', 'You have to buy it to review this product!');
    }

    
         

        
     }

    }
}