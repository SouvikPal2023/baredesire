<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Color;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::orderByDesc('created_at')->get();
        return view('admin.order.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $price=0;
        $sell_price=0;
             $data['order'] = $order;
             foreach( $data['order']->products as $prod){
                $product=Product::find($prod->id);
                $quantity=$data['order']->products()
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
            
            return view('admin.order.edit', $data);
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
           
            $order->delete();
            return redirect()->route('order.index')->with("success","Record Deleted successfully!");

        
        } catch (\Throwable$th) {
            abort(404);
        }
    }

    public function payment(Request $request)
    {
        //dd($request->all());
        //dd($request->all());
        try {
            $order = Order::find($request->id);
            $order->payment_status = $request->status;
            $order->save();
           
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Payment status is changed!',
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => $th->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        }

    }

    public function status(Request $request)
    {
        //dd($request->all());
        //dd($request->all());
        try {
            $order = Order::find($request->id);
            $order->status = $request->status;
            $order->save();
           
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Order status is changed!',
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => $th->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        }

    }
}
