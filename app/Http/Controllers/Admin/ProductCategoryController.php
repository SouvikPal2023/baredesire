<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data['categories'] = ProductCategory::orderBy('created_at', 'DESC')->get();
     return view('admin.product-category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_categories'] = ProductCategory::where('level', '!=' , "2")->orderBy('created_at', 'DESC')->get();
        //dd( $data['p_categories']);
        return view('admin.product-category.create', $data);
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
            "name" => 'required|string|max:100',
            "banner_image" => 'nullable|image|max:5000',
            "parent_id"=>"nullable",
            "level"=>"required"
        ]);

        if (isset($values['banner_image'])) {
            $values['banner_image'] = Storage::putFile('public/productCategory', new File($request->banner_image));
        }

        $category = new ProductCategory();
        $category->fill($values);
        $category->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('product-category.index')->withNotify($notify);
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
    public function edit(ProductCategory $productCategory)
    {   
        $data['p_categories'] = ProductCategory::where('level', '!=' , "2")->orderBy('created_at', 'DESC')->get();
        $data['category'] = $productCategory;
        //dd(  $data['category'] );
        return view('admin.product-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:100',
            "description"=>'nullable|string|max:5000',
            "banner_image" => 'nullable|image|max:5000',
            "parent_id"=>"nullable",
            "level"=>"required"
        ]);
        if ($request->banner_image) {
            if (!empty($productCategory->banner_image)) {
                Storage::delete($productCategory->banner_image);
            }
            $values['banner_image'] = Storage::putFile('public/productCategory', new File($request->banner_image));
        }

        $productCategory->fill($values);
        if ($productCategory->isDirty()) {
            $productCategory->save();
            $changed = true;
        }

        if (!$changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('product-category.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('product-category.index')->withNotify($notify);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        if (isset($productCategory)) {
            $productCategory->delete();
        }

        $notify[] = ['success', __('admin_messages.record.delete')];
        return redirect()->route('product-category.index')->withNotify($notify);
    }

    public function status($id)
    {
        
            $product = ProductCategory::findOrFail($id);
            if ($product->status == '1')
            {
                $product->status = '0';
            }
            else
            {
                $product->status = '1';
            }
            $product->save();
            return redirect()->back()->with('success', __("Featured status updated successfully"));
       

    }
    
}
