<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home5Section;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HomeSection5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections'] = Home5Section::all();
        return view('admin.homeSection.section5.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeSection.section5.create');
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
            "heading" => 'required|string|max:150',
            "desc" => 'required|string|max:150',
            "image"=>'nullable|image|max:5000',
            "btn_text" => 'nullable|string|max:150',
            "btn_url" => 'nullable|string|max:150',
           
        ]);

        
        if (isset($values['image'])) {
            $values['image'] = Storage::putFile('public/homesection', new File($request->image));
        }

        $section = new Home5Section();
        $section->fill($values);
        $section->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('homeSection5.index')->withNotify($notify);
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
    public function edit($id)
    {
        $data['section'] = Home5Section::find($id);
        return view('admin.homeSection.section5.edit', $data);
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
        $changed = false;
        $section = Home5Section::find($id);
        $values = $request->validate([
            "heading" => 'required|string|max:150',
            "desc" => 'required|string|max:150',
            "image"=>'nullable|image|max:5000',
            "btn_text" => 'nullable|string|max:150',
            "btn_url" => 'nullable|string|max:150',
        ]);


       


        if ($request->image) {
            if (!empty($section->image)) {
                Storage::delete($section->image);
            }

            $values['image'] = Storage::putFile('public/homesection', new File($request->image));
        }


        $section->fill($request->except(['image']));
        if (isset($values['image'])) {
            $section->image = $values['image'];
        }
        

        if ($section->isDirty()) {
            $section->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('homeSection5.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('homeSection5.index')->withNotify($notify);
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
}
