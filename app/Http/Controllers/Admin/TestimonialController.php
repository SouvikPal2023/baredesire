<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
// use App\Models\HomeTitle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['testimonials'] = Testimonial::orderBy('created_at', 'DESC')->paginate(15);
        //$data['homeTitle11'] = HomeTitle::select('title11')->first();

        return view('admin.testimonialSection.list', $data);
    }




        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonialSection.create');
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
            "image"=>'nullable|image|max:5000',
            "designation" => 'required|string|max:100',
            "content"=>'required|string|max:5000',
        ]);

        if (isset($values['image'])) {
            $values['image'] = Storage::putFile('public/testimonial', new File($request->image));
        }

        $testimonial = new Testimonial();
        $testimonial->fill($values);
        $testimonial->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('testimonial.index')->withNotify($notify);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $data['testimonial'] = $testimonial;
        return view('admin.testimonialSection.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:150',
            "image"=>'nullable|image|max:5000',
            "designation" => 'required|string|max:100',
            "content"=>'required|string|max:5000',
        ]);


        if ($request->image) {
            if (!empty($testimonial->image)) {
                Storage::delete($testimonial->image);
            }

            $values['image'] = Storage::putFile('public/testimonial', new File($request->image));
        }

        $testimonial->fill($request->except('image'));
        if (isset($values['image'])) {
            $testimonial->image = $values['image'];
        }

        if ($testimonial->isDirty()) {
            $testimonial->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('testimonial.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('testimonial.index')->withNotify($notify);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (isset($testimonial)) {
            if (!empty($testimonial->image)) {
                Storage::delete($testimonial->image);
            }

            $testimonial->delete();
        }

        $notify[] = ['success', __('admin_messages.record.delete')];
        return redirect()->route('testimonial.index')->withNotify($notify);
    }



    public function testimonialStatus(Testimonial $testimonial)
    {
        if ($testimonial->status == 'active') {
            $testimonial->status = 'inactive';
        } else {
            $testimonial->status = 'active';
        }

        $testimonial->save();

        $notify[] = ['success', $testimonial->name. ' ' . (($testimonial->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        return redirect()->route('testimonial.index')->withNotify($notify);
    }









    // public function textUpdate(Request $request)
    // {
    //     $homeTitle = HomeTitle::first();

    //     $changed = false;
    //     $values = $request->validate([
    //         "title11" => 'required|string|max:200',
    //     ]);

    //     $homeTitle->fill($values);

    //     if ($homeTitle->isDirty()) {
    //         $homeTitle->save();
    //         $changed = true;
    //     }

    //     if (! $changed) {
    //         $notify[] = ['warning', __('admin_messages.nochange')];
    //         return redirect()->route('testimonial.index')->withNotify($notify);
    //     }

    //     $notify[] = ['success', __('admin_messages.record.update')];
    //     return redirect()->route('testimonial.index')->withNotify($notify);
    // }
}
