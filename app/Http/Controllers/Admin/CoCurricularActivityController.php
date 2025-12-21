<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoCurricularActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoCurricularActivityController extends Controller
{
    public function index()
    {
        $title = 'Co-curricular Activities Management';
        $activity = CoCurricularActivity::first();
        return view('admin-v1.admin.co-curricular-activity.index', compact('activity', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $data = $request->except(['main_image', 'gallery_images']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('co-curricular-activity', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('co-curricular-activity/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        CoCurricularActivity::create($data);

        return redirect()->route('admin.co-curricular-activity.index')
            ->with('success', 'Co-curricular Activities information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $activity = CoCurricularActivity::first();
        $data = $request->except(['main_image', 'gallery_images']);

        if ($request->hasFile('main_image')) {
            if ($activity->main_image && Storage::disk('public')->exists($activity->main_image)) {
                Storage::disk('public')->delete($activity->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('co-curricular-activity', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            if ($activity->gallery_images) {
                foreach ($activity->gallery_images as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('co-curricular-activity/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        $activity->update($data);

        return redirect()->route('admin.co-curricular-activity.index')
            ->with('success', 'Co-curricular Activities information updated successfully.');
    }
}
