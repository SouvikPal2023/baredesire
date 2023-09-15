<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChannelCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class ChannelCategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = ChannelCategory::paginate('20');

        return view('admin.channel-category.list', $data);
    }

    public function create()
    {

        return view('admin.channel-category.create');
    }

    public function store(Request $request)
    {

        $values = $request->validate([
            "name" => 'required|unique:video_categories,name|string|max:100',
            "icon" => 'nullable|image|max:5000',
        ]);

        if (isset($values['icon'])) {
            $values['icon'] = Storage::putFile('public/channelCategory', new File($request->icon));
        }

        $category = new ChannelCategory();
        $category->fill($values);
        $category->slug = Str::slug($values['name']);
        $category->save();

        $notify[] = ['success', __('admin_messages.record.add')];
        return redirect()->route('channel-category.index')->withNotify($notify);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['category'] = ChannelCategory::find($id);
        return view('admin.channel-category.edit', $data);
    }

    public function update(Request $request, ChannelCategory $channelCategory)
    {

        $changed = false;
        $values = $request->validate([
            "name" => 'required|unique:channel_categories,name|string|max:100',
            "icon" => 'nullable|image|max:5000',
        ]);
        if ($request->icon) {
            if (!empty($channelCategory->icon)) {
                Storage::delete($channelCategory->icon);
            }

            $values['icon'] = Storage::putFile('public/channelCategory', new File($request->icon));
        }

        $channelCategory->fill($values);
        if ($channelCategory->isDirty()) {
            $channelCategory->save();
            $changed = true;
        }

        if (!$changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('channel-category.index')->withNotify($notify);
        }

        $notify[] = ['success', __('admin_messages.record.update')];
        return redirect()->route('channel-category.index')->withNotify($notify);
    }

    public function destroy(ChannelCategory $channelCategory)
    {
        if (isset($channelCategory)) {
            $channelCategory->delete();
        }

        $notify[] = ['success', __('admin_messages.record.delete')];
        return redirect()->route('channel-category.index')->withNotify($notify);
    }

    public function channelCategoryStatus(ChannelCategory $category)
    {

        if ($category->status == 'active') {
            $category->status = 'inactive';
        } else {
            $category->status = 'active';
        }

        $category->save();

        $notify[] = ['success', 'Status ' . (($category->status == 'inactive') ? __('admin_messages.change') : __('admin_messages.change'))];
        return redirect()->route('channel-category.index')->withNotify($notify);
    }
}
