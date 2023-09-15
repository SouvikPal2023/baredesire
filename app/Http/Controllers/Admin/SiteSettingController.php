<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class SiteSettingController extends Controller
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
        $data['siteSettings'] = SiteSetting::all();
        return view('admin.siteSetting.list', $data);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting)
    {
        $data['siteSetting'] = $siteSetting;
        return view('admin.siteSetting.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $siteSetting)
    { 
        $changed = false;
        $values = $request->validate([
            "site_name" => 'nullable|string|max:100',
            "site_logo" => 'nullable|image|max:5000',
            "light_logo" => 'nullable|image|max:5000',
            "favicon" => 'nullable|image|max:1000|dimensions:max_width=512,max_height=512',
            
            "copyright_text" => 'nullable|string|max:200',
            "footer_text" => 'nullable|string|max:200',
            
            "meta_title" => 'nullable|string|max:100',
            "meta_keyword" => 'nullable|string|max:250',
            "meta_description" => 'nullable|string|max:400',
            "og_title" => 'nullable|string|max:100',
            "og_description" => 'nullable|string|max:400',
            "og_image" => 'nullable|image|max:5000',

            'site_email' => 'nullable|email|max:200',
            'site_phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:30',
            'site_whatsapp' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:30', 
            "whatsapp_logo" => 'nullable|image|max:5000',
           
            "contact_title" => 'nullable|string|max:100',
            "address" => 'nullable|string|max:255',
            "map_link" => 'nullable|string|max:1000',
            "size_chart_image" => 'nullable|image|max:5000',

        ]);

        if ($request->site_logo) {
            if ($siteSetting->site_logo) {
                Storage::delete($siteSetting->site_logo);
            }
            $values['site_logo'] = Storage::putFile('public/siteSetting', new File($request->site_logo));
        }

        if ($request->light_logo) {
            if ($siteSetting->light_logo) {
                Storage::delete($siteSetting->light_logo);
            }
            $values['light_logo'] = Storage::putFile('public/siteSetting', new File($request->light_logo));
        }

        if ($request->favicon) {
            if ($siteSetting->favicon) {
                Storage::delete($siteSetting->favicon);
            }
            $values['favicon'] = Storage::putFile('public/siteSetting', new File($request->favicon));
        }

        if ($request->og_image) {
            if ($siteSetting->og_image) {
                Storage::delete($siteSetting->og_image);
            }
            $values['og_image'] = Storage::putFile('public/siteSetting', new File($request->og_image));
        }


        if ($request->partner_image1) {
            if ($siteSetting->partner_image1) {
                Storage::delete($siteSetting->partner_image1);
            }
            $values['partner_image1'] = Storage::putFile('public/siteSetting', new File($request->partner_image1));
        }


        if ($request->partner_image2) {
            if ($siteSetting->partner_image2) {
                Storage::delete($siteSetting->partner_image2);
            }
            $values['partner_image2'] = Storage::putFile('public/siteSetting', new File($request->partner_image2));
        }
        if ($request->whatsapp_logo) {
            if ($siteSetting->whatsapp_logo) {
                Storage::delete($siteSetting->whatsapp_logo);
            }
            $values['whatsapp_logo'] = Storage::putFile('public/siteSetting', new File($request->whatsapp_logo));
        }

        if ($request->size_chart_image) {
            if ($siteSetting->size_chart_image) {
                Storage::delete($siteSetting->size_chart_image);
            }
            $values['size_chart_image'] = Storage::putFile('public/siteSetting', new File($request->size_chart_image));
        }


        $siteSetting->fill($request->except('site_logo','light_logo','favicon','og_image','partner_image1','partner_image2','whatsapp_logo','size_chart_image'));
        if (isset($values['site_logo'])) {
            $siteSetting->site_logo = $values['site_logo'];
        }

        if (isset($values['light_logo'])) {
            $siteSetting->light_logo = $values['light_logo'];
        }

        if (isset($values['favicon'])) {
            $siteSetting->favicon = $values['favicon'];
        }

        if (isset($values['og_image'])) {
            $siteSetting->og_image = $values['og_image'];
        }


        if (isset($values['partner_image1'])) {
            $siteSetting->partner_image1 = $values['partner_image1'];
        }

        if (isset($values['partner_image2'])) {
            $siteSetting->partner_image2 = $values['partner_image2'];
        }

        if (isset($values['whatsapp_logo'])) {
            $siteSetting->whatsapp_logo = $values['whatsapp_logo'];
        }
        if (isset($values['size_chart_image'])) {
            $siteSetting->size_chart_image = $values['size_chart_image'];
        }

        if ($siteSetting->isDirty()) {
            $siteSetting->save();
            $changed = true;
        }

        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('siteSetting.index')->withNotify($notify);
        }


        $notify[] = ['success', __('admin_messages.settings.update')];
        return redirect()->route('siteSetting.edit', $siteSetting)->withNotify($notify);
    }

}
