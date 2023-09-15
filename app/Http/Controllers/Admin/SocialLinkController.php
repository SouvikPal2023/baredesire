<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SocialLinkController extends Controller
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
        $data['socialLinks'] = SocialLink::all();
        return view('admin.socialLink.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socialLink.create');
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
            "name" => 'required|string|max:50|unique:social_links,name',
            "logo"=>'nullable|image|max:1000',
            "link"=>'required|url|max:300'
        ]);
        
        if (isset($values['logo'])) {
            $values['logo'] = Storage::putFile('public/social', new File($request->logo));
        }

        $socialLink = new SocialLink();
        $socialLink->fill($values);
        $socialLink->save();

        $notify[] = ['success', $socialLink->name . __('admin_messages.created')];
        return redirect()->route('socialLink.index')->withNotify($notify);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        $data['socialLink'] = $socialLink;
        return view('admin.socialLink.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:50|unique:social_links,name,'. $socialLink->id,
            "logo"=>'nullable|image|max:1000',
            "link"=>'required|url|max:300'
        ]);

        if ($request->logo) {
            if (!empty($socialLink->logo)) {
               Storage::delete($socialLink->logo);
            }

            $values['logo'] = Storage::putFile('public/social', new File($request->logo));
        }

        $socialLink->fill($request->except('logo'));
        if (isset($values['logo'])) {
            $socialLink->logo = $values['logo'];
        }

        if ($socialLink->isDirty()) {
            $socialLink->save();
            $changed = true;
        }

        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('socialLink.index')->withNotify($notify);
        }

        $notify[] = ['success', $socialLink->name . __('admin_messages.updated')];
        return redirect()->route('socialLink.index')->withNotify($notify);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $socialLink)
    {
        if (isset($socialLink)) {
            
            if (!empty($socialLink->logo)) {
               Storage::delete($socialLink->logo);
            }

            $socialLink->delete();
        }
        
        $notify[] = ['success', $socialLink->name . ' ' .__('admin_messages.deleted')];
        return redirect()->route('socialLink.index')->withNotify($notify);
    }



    public function socialLinkStatus(SocialLink $socialLink)
    {
        if ($socialLink->status == 'active') {
            $socialLink->status = 'inactive';
        } else {
            $socialLink->status = 'active';
        }

        $socialLink->save();

        $notify[] = ['success', $socialLink->name . ' ' . (($socialLink->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        
        return redirect()->route('socialLink.index')->withNotify($notify);
    }
}
