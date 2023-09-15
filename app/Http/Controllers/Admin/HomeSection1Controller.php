<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home1Section;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HomeSection1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections'] = Home1Section::all();
        return view('admin.homeSection.section1.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeSection.section1.create');
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
            "sub_heading" => 'required|string|max:150',
            "description" => 'required|string|max:150',
            "image1"=>'nullable|image|max:5000',
            "image2"=>'nullable|image|max:5000',
            "image3"=>'nullable|image|max:5000',
            "btn1_text" => 'nullable|string|max:150',
            "btn1_url" => 'nullable|string|max:150',
            "btn2_text" => 'nullable|string|max:150',
            "btn2_url" => 'nullable|string|max:150',
        ]);

        // if (isset($values['image1'])) {
        //     $values['image1'] = Storage::putFile('public/homesection', new File($request->image1));
        // }
        // if (isset($values['image2'])) {
        //     $values['image2'] = Storage::putFile('public/homesection', new File($request->image2));
        // }
        // if (isset($values['image3'])) {
        //     $values['image3'] = Storage::putFile('public/homesection', new File($request->image3));
        // }
        
  if (isset($values['image1'])) {
    $values['image1'] = $request->file('image1')->store('homesection', 'public');
}
if (isset($values['image2'])) {
    $values['image2'] = $request->file('image2')->store('homesection', 'public');
}
if (isset($values['image3'])) {
    $values['image3'] = $request->file('image3')->store('homesection', 'public');
}


        $section = new Home1Section();
        $section->fill($values);
        $section->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('homeSection1.index')->withNotify($notify);
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

        $data['section'] = Home1Section::find($id);
        return view('admin.homeSection.section1.edit', $data);
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
            $section = Home1Section::find($id);
            $values = $request->validate([
                "heading" => 'required|string|max:150',
                "sub_heading" => 'required|string|max:150',
                "image1"=>'nullable|image|max:5000',
                "image2"=>'nullable|image|max:5000',
                "image3"=>'nullable|image|max:5000',
                "designation" => 'nullable|string|max:100',
                "content"=>'nullable|string|max:5000',
                "btn1_text" => 'nullable|string|max:150',
                "btn1_url" => 'nullable|string|max:150',
                "btn2_text" => 'nullable|string|max:150',
                "btn2_url" => 'nullable|string|max:150',
            ]);


            if ($request->image1) {
                if (!empty($section->image1)) {
                    Storage::delete($section->image1);
                }
                $values['image1'] = $request->file('image1')->store('public/homesection');
            }
            
            if ($request->image2) {
                if (!empty($section->image2)) {
                    Storage::delete($section->image2);
                }
                $values['image2'] = $request->file('image2')->store('public/homesection');
            }
            
            if ($request->image3) {
                if (!empty($section->image3)) {
                    Storage::delete($section->image3);
                }
                $values['image3'] = $request->file('image3')->store('public/homesection');
            }
            

            $section->fill($request->except(['image1', 'image2', 'image3']));
            if (isset($values['image1'])) {
                $section->image1 = $values['image1'];
            }
            if (isset($values['image2'])) {
                $section->image2 = $values['image2'];
            }
            if (isset($values['image3'])) {
                $section->image3 = $values['image3'];
            }

            if ($section->isDirty()) {
                $section->save();
                $changed = true;
            }


            if (! $changed) {
                $notify[] = ['warning', __('admin_messages.nochange')];
                return redirect()->route('homeSection1.index')->withNotify($notify);
            }

            $notify[] = ['success', __('admin_messages.record.update')];
            return redirect()->route('homeSection1.index')->withNotify($notify);
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
