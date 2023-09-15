<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class VideoCategoryController extends Controller
{

    public function index()
    {
        $data['categories'] = VideoCategory::paginate('20');

        return view('admin.video-category.list', $data);
    }

    public function create()
    {

        return view('admin.video-category.create');
    }

    public function store(Request $request)
    {

        $values = $request->validate([
            "name" => 'required|unique:video_categories,name|string|max:100',
            "icon" => 'nullable|image|max:5000',
        ]);

        if (isset($values['icon'])) {
            $values['icon'] = Storage::putFile('public/videoCategory', new File($request->icon));
        }

        $category = new VideoCategory();
        $category->fill($values);
        $category->slug = Str::slug($values['name']);
        $category->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('video-category.index')->withNotify($notify);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(VideoCategory $videoCategory)
    {
        $data['category'] = $videoCategory;
        return view('admin.video-category.edit', $data);
    }

    public function update(Request $request, VideoCategory $videoCategory)
    {

        $changed = false;
        $values = $request->validate([
            "name" => 'required|unique:video_categories,name|string|max:100',
            "icon" => 'nullable|image|max:5000',
        ]);
        if ($request->icon) {
            if (!empty($videoCategory->icon)) {
                Storage::delete($videoCategory->icon);
            }
            $values['icon'] = Storage::putFile('public/videoCategory', new File($request->icon));
        }

        $videoCategory->fill($values);
        if ($videoCategory->isDirty()) {
            $videoCategory->save();
            $changed = true;
        }

        if (!$changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('video-category.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('video-category.index')->withNotify($notify);
    }

    public function destroy(VideoCategory $videoCategory)
    {
        if (isset($videoCategory)) {
            $videoCategory->delete();
        }

        $notify[] = ['success', __('admin_messages.record.delete')];
        return redirect()->route('video-category.index')->withNotify($notify);
    }

    public function videoCategoryStatus(VideoCategory $category)
    {

        if ($category->status == 'active') {
            $category->status = 'inactive';
        } else {
            $category->status = 'active';
        }

        $category->save();

        $notify[] = ['success', 'Status ' . (($category->status == 'inactive') ? __('admin_messages.change') : __('admin_messages.change'))];
        return redirect()->route('video-category.index')->withNotify($notify);
    }

}
