<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home8Section;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class HomeSection8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections'] = Home8Section::all();
        return view('admin.homeSection.section8.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeSection.section8.create');
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
            "desc" => 'required|string|max:500',
            "name" => 'nullable|string|max:150',
         
        ]);
        

        $section = new Home8Section();
        $section->fill($values);
        $section->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('homeSection8.index')->withNotify($notify);
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
        $data['section'] = Home8Section::find($id);
        return view('admin.homeSection.section8.edit', $data);
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
        $section = Home8Section::find($id);
        $values = $request->validate([
            "heading" => 'required|string|max:150',
            "desc" => 'required|string|max:500',
            "name" => 'nullable|string|max:150',
         
        ]);


       
       


        $section->fill($values);
       
       

        if ($section->isDirty()) {
            $section->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('homeSection8.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('homeSection8.index')->withNotify($notify);
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
