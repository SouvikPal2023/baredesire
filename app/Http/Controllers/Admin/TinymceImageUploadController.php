<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinymceImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$extension;
            $file->storeAs('public/tinymce_images/', $filename);

//dd( $filename);
            return response()->json([
                'location' => asset('storage/tinymce_images/'.$filename)
            ]);
        }
    }
}
