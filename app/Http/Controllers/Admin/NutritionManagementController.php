<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NutritionManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NutritionManagementController extends Controller
{
    public function index()
    {
        $title = 'Nutrition Management';
        $nutrition = NutritionManagement::first();
        return view('admin-v1.admin.nutrition-management.index', compact('nutrition', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $data = $request->except(['main_image', 'gallery_image']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('nutrition', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('nutrition/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        NutritionManagement::create($data);

        return redirect()->route('admin.nutrition-management.index')
            ->with('success', 'Nutrition Management information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $nutrition = NutritionManagement::first();
        $data = $request->except(['main_image', 'gallery_image']);

        if ($request->hasFile('main_image')) {
            if ($nutrition->main_image && Storage::disk('public')->exists($nutrition->main_image)) {
                Storage::disk('public')->delete($nutrition->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('nutrition', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            if ($nutrition->gallery_image) {
                foreach ($nutrition->gallery_image as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('nutrition/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        $nutrition->update($data);

        return redirect()->route('admin.nutrition-management.index')
            ->with('success', 'Nutrition Management information updated successfully.');
    }
}
