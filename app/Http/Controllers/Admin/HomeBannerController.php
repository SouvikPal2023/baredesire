<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HomeBannerController extends Controller
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
    public function index()
    {
        $data['homeBanners'] = HomeBanner::all();
        return view('admin.banner.homeBanner.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.homeBanner.create');
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
            "title" => 'required|string|max:500',
            "subtitle" => 'required|string|max:800',
            "short_description" => 'nullable|string|max:1000',
            "image" => "nullable|image|max:5000|dimensions:max_width=2500,max_height=2500",
            "btn_text" => 'nullable|string|max:200',
            "btn_link" => 'nullable|string|max:255',
        ]);

        if (isset($values['image'])) {
            $values['image'] = Storage::putFile('public/homeBanner', new File($request->image));
        }
        
        $homeBanner = new HomeBanner();
        $homeBanner->fill($values);
        $homeBanner->save();


        $notify[] = ['success', __('admin_messages.banner.add')];
        return redirect()->route('homeBanner.index')->withNotify($notify);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBanner $homeBanner)
    {
        $data['banner'] = $homeBanner;
        return view('admin.banner.homeBanner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeBanner $homeBanner)
    {
        $changed = false;
        $values = $request->validate([
            "title" => 'required|string|max:500',
            "subtitle" => 'required|string|max:800',
            "short_description" => 'nullable|string|max:1000',
            "image" => "nullable|image|max:5000|dimensions:max_width=2500,max_height=2500",
            "btn_text" => 'nullable|string|max:200',
            "btn_link" => 'nullable|string|max:255',
        ]);

        if ($request->image) {
            
            if (!empty($homeBanner->image)) {
               Storage::delete($homeBanner->image);
            }

            $values['image'] = Storage::putFile('public/homeBanner', new File($request->image));
        }

        $homeBanner->fill($request->except('image'));
        if (isset($values['image'])) {
            $homeBanner->image = $values['image'];
        }

        if ($homeBanner->isDirty()) {
            $homeBanner->save();
            $changed = true;
        }

        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('homeBanner.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.banner.update')];
        return redirect()->route('homeBanner.index')->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBanner $homeBanner)
    {
        if (isset($homeBanner)) {
            if (!empty($homeBanner->image)) {
               Storage::delete($homeBanner->image);
            }
            $homeBanner->delete();
        }
        
        $notify[] = ['success', __('admin_messages.banner.delete')];
        return redirect()->route('homeBanner.index')->withNotify($notify);
    }



    public function bannerStatus(HomeBanner $homeBanner)
    {
        if ($homeBanner->status == 'active') {
            $homeBanner->status = 'inactive';
        } else {
            $homeBanner->status = 'active';
        }

        $homeBanner->save();
        
        $notify[] = ['success', 'Banner ' . (($homeBanner->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        return redirect()->route('homeBanner.index')->withNotify($notify);
    }
}
