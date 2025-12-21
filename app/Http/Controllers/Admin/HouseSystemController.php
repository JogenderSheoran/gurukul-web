<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HouseSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseSystemController extends Controller
{
    public function index()
    {
        $title = 'House System Management';
        $houseSystem = HouseSystem::first();
        return view('admin-v1.admin.house-system.index', compact('houseSystem', 'title'));
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
            $data['main_image'] = $request->file('main_image')->store('house-system', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('house-system/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        HouseSystem::create($data);

        return redirect()->route('admin.house-system.index')
            ->with('success', 'House System information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $houseSystem = HouseSystem::first();
        $data = $request->except(['main_image', 'gallery_images']);

        if ($request->hasFile('main_image')) {
            if ($houseSystem->main_image && Storage::disk('public')->exists($houseSystem->main_image)) {
                Storage::disk('public')->delete($houseSystem->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('house-system', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            if ($houseSystem->gallery_images) {
                foreach ($houseSystem->gallery_images as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('house-system/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        $houseSystem->update($data);

        return redirect()->route('admin.house-system.index')
            ->with('success', 'House System information updated successfully.');
    }
}
