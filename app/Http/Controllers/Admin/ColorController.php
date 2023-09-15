<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['colors'] = Color::orderBy('created_at', 'DESC')->get();
        //$data['homeTitle11'] = HomeTitle::select('title11')->first();

        return view('admin.color.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
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
            "name" => 'required|string|max:150',
            "icon"=>'nullable|image|max:5000',
            "code" => 'nullable|string|max:100',
        ]);

        if (isset($values['icon'])) {
            $values['icon'] = Storage::putFile('public/color', new File($request->icon));
        }

        $color = new Color();
        $color->fill($values);
        $color->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('color.index')->withNotify($notify);
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
    public function edit(Color $color)
    {
        $data['color'] = $color;
        return view('admin.color.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Color $color)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:150',
            "icon"=>'nullable|image|max:5000',
            "code" => 'nullable|string|max:100',
           
        ]);


        if ($request->icon) {
            if (!empty($color->icon)) {
                Storage::delete($color->icon);
            }

            $values['icon'] = Storage::putFile('public/color', new File($request->icon));
        }

        $color->fill($request->except('icon'));
        if (isset($values['icon'])) {
            $color->icon = $values['icon'];
        }

        if ($color->isDirty()) {
            $color->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('color.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('color.index')->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if (isset($color)) {
            if (!empty($color->icon)) {
                Storage::delete($color->icon);
            }

            $color->delete();
        }

        $notify[] = ['success', __('admin_messages.record.delete')];
        return redirect()->route('color.index')->withNotify($notify);
    }
}
