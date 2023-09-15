<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;
use Image;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderByDesc('created_at')->get();
        return view('admin.product.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['colors']=Color::orderByDesc('created_at')->get();
        $data['prods']=Product::orderByDesc('created_at')->get();
        $data['bra_sizes']=ProductSize::where('type',"bra")->orderByDesc('created_at')->get();
        $data['sizes']=ProductSize::where('type',"others")->orderByDesc('created_at')->get();
        $data['categories'] = ProductCategory::where('level',"2")->orderByDesc('created_at')->get();
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $values = $request->validate([
            "name" => 'required|string',
             'product_category_id' => 'required|exists:product_categories,id',
             'product_size_id' => 'nullable|exists:product_sizes,id',
             'color_id' => 'nullable|exists:colors,id',
             'variation_id' => 'nullable|exists:products,id',
             'bra_size_id' => 'nullable|exists:product_sizes,id',
            'original_price' => 'required|string|max:100',
             'product_image.*' => 'file|mimes:jpg,jpeg,png|max:5000',
            'description' => 'required|string|max:80000',
            'selling_price' => 'nullable|string|max:100',
            'additional' => 'nullable|string|max:80000',
            'wash' => 'nullable|string|max:80000',
        ]);
        //dd($request->all());
        $product = new Product();
        $product->fill($request->all());
        $product->color()
        ->associate($request->color_id);
        $product->save();
        $product->variations()
        ->sync($request->variation_id);
        $product->product_categories()
        ->sync($request->product_category_id);
        $product->product_sizes()
        ->sync($request->product_size_id);
        $product->product_sizes()
        ->sync($request->bra_size_id);
        if ($request->hasFile('product_image'))
        {
            foreach ($request->product_image as $image)
            {
                $product_image = new ProductImage();
                $extension = $image->getClientOriginalExtension();
                $filename = uniqid() . '_' . $request->name . '.' . $extension;
                $name = $image->getClientOriginalName();
                $storage_folder = 'public/product_images/';
                $image->storeAs($storage_folder, $filename);
                $product_image->image = 'public/product_images/'.$filename;
                $product_image->name = $name;

                $product_image->product()->associate($product);
                $product_image->save();
            }

    }
    return redirect()->route('product.index')->with("success", "Record Saved successfully!");
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
    public function edit(Product $product)
    {
        try
        {
             $data['product'] = $product;
             //dd($product->variations);
             $data['colors']=Color::orderByDesc('created_at')->get();
             $data['prods']=Product::orderByDesc('created_at')->get();
             $data['bra_sizes']=ProductSize::where('type',"bra")->orderByDesc('created_at')->get();
             $data['sizes']=ProductSize::where('type',"others")->orderByDesc('created_at')->get();
            $data['categories'] = ProductCategory::where('level',"2")->orderByDesc('created_at')->get();
            
            return view('admin.product.edit', $data);
        }
        catch(\Throwable $th)
        {
            abort(404);
        }
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
    
            $values = $request->validate([
                "name" => 'required|string',
                 'product_category_id' => 'required|exists:product_categories,id',
                 'product_size_id' => 'nullable|exists:product_sizes,id',
                 'bra_size_id' => 'nullable|exists:product_sizes,id',
                'original_price' => 'required|string|max:100',
                 'product_image.*' => 'file|mimes:jpg,jpeg,png|max:5000',
                'description' => 'required|string|max:80000',
                'selling_price' => 'nullable|string|max:100',
                'additional' => 'nullable|string|max:80000',
                'wash' => 'nullable|string|max:80000',
            ]);
            $product = Product::findOrFail($id);
            $product->fill($request->all());
            $product->color()
        ->associate($request->color_id);
        $product->save();
        $product->variations()
        ->sync($request->variation_id);
            $product->product_categories()->sync($request->product_category_id);
            $product->product_sizes()
            ->sync($request->product_size_id);
            $product->product_sizes()
            ->sync($request->bra_size_id);
          
            if ($request->hasFile('product_image')) {

                if (!empty($product->product_image) && Storage::exists('public/product_images/' . $product->product_image)) {
                    Storage::delete('public/product_images/' . $product->product_image);
                }
                foreach ($request->product_image as $image) {
                    $product_image = new ProductImage();

                    $extension = $image->getClientOriginalExtension();
                    $filename = uniqid().'.'.$extension;
                    $name = $image->getClientOriginalName();
                    $storage_folder = 'public/product_images/';

                    $image->storeAs($storage_folder, $filename);
                    $product_image->image = 'public/product_images/'.$filename;
                    $product_image->name = $name;

                    $product_image->product()->associate($product);
                    $product_image->save();
                    
                }

            }
            //dd('hi');
            return redirect()->route('product.index')->with("success","Record Updated successfully!");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeFeatured($id)
    {
        try
        {
            $product = Product::findOrFail($id);
            if ($product->status == '1')
            {
                $product->status = '0';
            }
            else
            {
                $product->status = '1';
            }
            $product->save();
            return redirect()->back()->with('success', __("Product status updated successfully"));
        }
        catch(\Throwable $th)
        {
            abort(404);
        }

    }

    public function status($id)
    {
        try
        {
            $product = Product::findOrFail($id);
            if ($product->is_featured == '1')
            {
                $product->is_featured = '0';
            }
            else
            {
                $product->is_featured = '1';
            }
            $product->save();
            return redirect()->back()->with('success', __("Featured status updated successfully"));
        }
        catch(\Throwable $th)
        {
            abort(404);
        }

    }

    public function removeImage(Request $request)
    {
        try
        {
            $image = ProductImage::findOrFail($request->image_id);
            $image_folder = 'product_images/';
            $image_path = $image_folder . $image->image;
          
            if (Storage::disk('public')->exists($image_path))
            {
                Storage::disk('public')->delete($image_path);
            }

            $image->delete();

            return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Image is deleted',
            ], Response::HTTP_OK);
        }
        catch(\Throwable $th)
        {
            return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Image not found!',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
