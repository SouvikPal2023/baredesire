<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
// use App\Models\HomeTitle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faq::paginate('20');
        //$data['homeTitle12'] = HomeTitle::select('title12')->first();

        return view('admin.faq.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            "question"=>'required|string|max:255',
            "answer"=>'required|string|max:1000',  
        ]);
        //dd($values);
        

        $faq = new Faq();
        $faq->fill($values);
        $faq->save();


        $notify[] = ['success', __('admin_messages.faq.create')];
        return redirect()->route('faq.index')->withNotify($notify);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $data['faq'] = $faq;
        return view('admin.faq.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $changed = false;
        $values = $request->validate([
            "question"=>'required|string|max:255',
            "answer"=>'required|string|max:1000', 
        ]);


        $faq->fill($values);
        if ($faq->isDirty()) {
            $faq->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('faq.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.faq.update')];
        return redirect()->route('faq.index')->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if (isset($faq)) {
            $faq->delete();
        }
        
        $notify[] = ['success', __('admin_messages.faq.delete')];
        return redirect()->route('faq.index')->withNotify($notify);
    }




    public function faqStatus(Faq $faq)
    {
        if ($faq->status == 'active') {
            $faq->status = 'inactive';
        } else {
            $faq->status = 'active';
        }   

        $faq->save();

        $notify[] = ['success', 'Question ' . (($faq->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        return redirect()->route('faq.index')->withNotify($notify);
    }




    // public function changeFaqPositions(Request $request)
    // {
    //     if (isset($request->update)) {
    //         foreach ($request->positions as $position) {
    //              $index = $position[0];
    //              $newPosition = $position[1];

    //             Faq::where('id', $index)
    //             ->update(['position' => $newPosition]);
    //         }

    //         return json_encode([
    //             "status" => "success",
    //             "message" => "Position is Changed Successfully!",
    //         ]);
    //     }

    //     else {
    //         return json_encode([
    //             "status" => "error",
    //             "message" => "Not Updated!",
    //         ]);
    //     }
    // }






    // public function textUpdate(Request $request)
    // {
    //     $homeTitle = HomeTitle::first();

    //     $changed = false;
    //     $values = $request->validate([
    //         "title12" => 'required|string|max:200',
    //     ]);

    //     $homeTitle->fill($values);
    
    //     if ($homeTitle->isDirty()) {
    //         $homeTitle->save();
    //         $changed = true;
    //     }

    //     if (! $changed) {
    //         $notify[] = ['warning', __('admin_messages.nochange')];
    //         return redirect()->route('faq.index')->withNotify($notify);
    //     }

    //     $notify[] = ['success', __('admin_messages.record.update')];
    //     return redirect()->route('faq.index')->withNotify($notify);
    // }
}
