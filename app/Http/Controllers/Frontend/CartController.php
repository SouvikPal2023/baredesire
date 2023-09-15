<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ShipAddress;
use App\Models\Order;
Use DB;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        //dd($request->all());
        $values = $request->validate([
            "size" => 'required',
            "quantity" => 'required',
            
        ]);

        $user=User::find(auth()->user()->id);
        $product=Product::find($request->id);
        if($user->carts->isEmpty()){
            //dd('hi');
            $cart= new Cart();
            $cart->user_id=auth()->user()->id;
            $cart->product_id=$request->id;
            $cart->quantity=$request->quantity;
            $cart->size=$request->size;
            $cart->save();
            // $cart->products()
            // ->sync($product, ['quantity' => $request->quantity]);
       
            }
        
        
    
       else{
      
        
            $cartItem = Cart::where('user_id',auth()->user()->id)->where('product_id',$product->id)->where('size',$request->size)->where('wishlist',0)->first();
            //dd($cartItem);
            if ($cartItem) {
               
                // If the product is already in the cart, increase the quantity
               $cartItem->quantity= $cartItem->quantity+1;
               $cartItem->save();
                //$cartItem->pivot->update(['quantity' => $cartItem->pivot->quantity + 1]);
                
             
       }
       else {
        // If the product is not in the cart, add it with a quantity of 1
        //$user->carts()->attach($product->id, ['quantity' => 1]);
        $cart= new Cart();
    $cart->user_id=auth()->user()->id;
    $cart->product_id=$request->id;
    $cart->quantity=$request->quantity;
    $cart->size=$request->size;
    $cart->save();
    } 
}
        //$notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('cartView')->with('success', 'Added to the cart successfully!');
    } 


             public function increaseQuantity(Cart $cart)
            {
                try{
             
$cart->quantity=$cart->quantity+1;
$cart->save();

           
             return redirect()->back()->with('success', 'Quantity increased successfully!');
            //  return response()->json([
            //     'status' => Response::HTTP_OK,
            //     'product'=> $product,
            //     'product_id'=>$product->id,
            //     'quantity'=>$cart->quantity,
            //     'price'=>$product->original_price,
            //     'message' => 'Quantity increased successfully!',
            // ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => $th->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        }
            }

            public function decreaseQuantity(Cart $cart)
            {
                //dd('hi');
                try{
              
                $cart->quantity=$cart->quantity-1;
$cart->save();
                
                
                return redirect()->back()->with('success', 'Quantity decreased successfully!');
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' =>  $th->getMessage(),
                ], Response::HTTP_NOT_FOUND);
            }
            }

            public function removeCart()
            {
                try{
              
                $cart=Cart::where('user_id',auth()->user()->id)->where('wishlist',0)->delete();

                
                
                return redirect()->back()->with('success', 'Cart is Empty!');
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' =>  $th->getMessage(),
                ], Response::HTTP_NOT_FOUND);
            }
            }

            public function removeItem(Cart $cart)
            {
                try{
              
                $cart->delete();

                
                
                return redirect()->back()->with('success', 'Item is deleted successfully!');
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' =>  $th->getMessage(),
                ], Response::HTTP_NOT_FOUND);
            }
            }

            public function saveLater(Cart $cart)
            {
                try{
              
                  
                        $cart->wishlist = 1;
                        $cart->save();
            
                    

                
                
                return redirect()->back()->with('success', 'The product is added to wishlist!');
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' =>  $th->getMessage(),
                ], Response::HTTP_NOT_FOUND);
            }
            }

            public function updateQuantity(Request $request)
    {
        try {
        $cart = Cart::find($request->cart_id);
        
            $cart->quantity = $request->quantity;
            $cart->save();
          
            $product=Product::find($cart->product_id);
            return response()->json([
                'status' => Response::HTTP_OK,
                'quantity'=>$request->quantity,
                'price'=>$product->original_price,
                'cart'=>$request->cart_id,
                'message' => 'Quantity is updated!',
            ], Response::HTTP_OK);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Error Occured!',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function wishToCart(Request $request)
    {
        //dd($request->all());
        $cartItem = Cart::where('user_id',auth()->user()->id)->where('product_id',$request->id)->where('size',$request->size)->where('wishlist',0)->first();
       // dd($cartItem);
        if ($cartItem) {
               
            // If the product is already in the cart, increase the quantity
           $cartItem->quantity= $cartItem->quantity+1;
            
           $cartItem->save();
            //$cartItem->pivot->update(['quantity' => $cartItem->pivot->quantity + 1]);
            
         
   }else{
        $cart = Cart::find($request->cart);
        $cart->wishlist=0;
        $cart->quantity=1;
        $cart->size= $request->size;
        $cart->save();
        //$notify[] = ['success', __('admin_messages.record.add')];
        
    } 
    return redirect()->route('cartView')->with('success', 'Added to the cart successfully!');
}



public function postCart(Request $request)
    {
        //dd($request->all());
        $formData = $request->all();
        session(['form_data' => $formData]);
       
        //return view('frontend.contents.shipAddress',$data); 
    return redirect()->route('shipAddress');
}
// public function showNextView()
// {
//     $formData = session('form_data');
//     return view('next_view', ['formData' => $formData]);
// }
public function shipAddress()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
        $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $data['address']=ShipAddress::where('user_id',auth()->user()->id)->first();
        $formData = session('form_data');

        if ($formData && isset($formData['total'])) {
            $data['total'] = $formData['total'];
        } else {
            $data['total'] = 0; // Default value if 'total' index is not set
        }
        if ($formData && isset($formData['discount'])) {
            $data['discount'] = $formData['discount'];
        } else {
            $data['discount'] = 0; // Default value if 'total' index is not set
        }


        if ($formData && isset($formData['giftWrap'])) {
            $data['giftWrap'] = $formData['giftWrap'];
        } else {
            $data['giftWrap'] = ""; // Default value if 'total' index is not set
        }
        $data['tax']=ceil((($data['total']- $data['discount'])*5)/100);
        return view('frontend.contents.shipAddress',$data);
}

public function saveAddress(Request $request)
    {
        //dd($request->all());
        $values = $request->validate([
           
            'first_name'=>'required|string|max:500',
            'last_name'=>'required|string|max:500',
            'email'=>'required|email|string|max:60',
            'mobile'=>'required|string|max:60',
            'billing_address_line1'=>'required|string|max:100',
            'billing_address_line2'=>'required|string|max:100',
            'billing_city'=>'required|string|max:100',
            'billing_state'=>'required|string|max:100',
            'billing_zip'=>'required|string|max:100',
            'billing_country'=>'required|string|max:100',
            'shipping_address_line1'=>'required|string|max:100',
            'shipping_address_line2'=>'required|string|max:100',
            'shipping_city'=>'required|string|max:100',
            'shipping_state'=>'required|string|max:100',
            'shipping_zip'=>'required|string|max:100',
            'shipping_country'=>'required|string|max:100',
        ]);
         $address=ShipAddress::where('user_id',auth()->user()->id)->first();
         if($address){
            $address->fill($values);
            $address->save();
            return redirect()->back()->with('success','Addresses Saved Successfully!');
         }else{
            $address=new ShipAddress();
            $address->fill($values);
            $address->user_id=auth()->user()->id;
            $address->save();
            return redirect()->back()->with('success','Addresses Updated Successfully!');
         }
    
}

public function paymentMode(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        session(['form_data' => $data]);
//dd('hi');
        //return view('frontend.contents.shipAddress',$data); 
    return redirect()->route('paymentSelect');
}

public function paymentSelect()
    {
        $data['categories'] = ProductCategory::with(['children' => function ($query) {
            $query->where('status', '1');
        }])->whereNull('parent_id')->where('status','1')->get();
         $data['footer_categories'] = ProductCategory::where('level', '2')
        ->where('status','1')->get(); 
        $data['mainCategories'] = ProductCategory::with('children.children')->where('level','0')->where('status','1')
       ->get();

        $formData = session('form_data');

        if ($formData && isset($formData['total'])) {
            $data['total'] = $formData['total'];
        } else {
            $data['total'] = 0; // Default value if 'total' index is not set
        }
        if ($formData && isset($formData['discount'])) {
            $data['discount'] = $formData['discount'];
        } else {
            $data['discount'] = 0; // Default value if 'total' index is not set
        }


        if ($formData && isset($formData['gift'])) {
            $data['gift'] = $formData['gift'];
        } else {
            $data['gift'] = ""; // Default value if 'total' index is not set
        }
        $data['gift_price']=35;
        $data['tax']=ceil((($data['total']- $data['discount'])*5)/100);
        return view('frontend.contents.paymentMode',$data);
}

public function orderPlace(Request $request)
    {
        $carts=Cart::where('user_id',auth()->user()->id)->where('wishlist',0)->get();
        $order=new Order();
        $order->total_price=$request->gross;
        $order->user_id=auth()->user()->id;
        $order->payment_method=$request->payment_method;
        $order->save();
       foreach ($carts as $cart) {
        $product=Product::find($cart->product_id);
        $order->products()->attach($cart->product_id, [
            'quantity' => $cart->quantity,
            'size'=>$cart->size,
            'subtotal' => $product->original_price*$cart->quantity,
        ]);
    }
    DB::table('carts')->where('user_id', auth()->user()->id)->where('wishlist',0)->delete();
    return redirect()->route('orderlist')->with('success','Order Placed Successfully!');
}

public function addToWish(Request $request)
    {
        //dd($request->all());

        $product=Product::find($request->id);
        $cartItem = Cart::where('user_id',auth()->user()->id)->where('product_id',$product->id)->where('wishlist',1)->first();
        if ($cartItem) {
               
            
            return redirect()->back()->with('warning', 'Product is already in Wishlist!');  
         
   }else{
    $cart= new Cart();
    $cart->user_id=auth()->user()->id;
    $cart->product_id=$request->id;
    $cart->wishlist=1;
    $cart->save();
    return redirect()->back()->with('success', 'Product is added to Wishlist!');  
   }
        
        
        
    } 



}