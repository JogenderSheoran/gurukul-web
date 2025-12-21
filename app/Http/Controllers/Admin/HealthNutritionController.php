<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HealthNutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HealthNutritionController extends Controller
{
    public function index()
    {
        $title = 'Health Nutrition Management';
        $healthNutrition = HealthNutrition::first();
        return view('admin-v1.admin.health-nutrition.index', compact('healthNutrition', 'title'));
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
            $data['main_image'] = $request->file('main_image')->store('health-nutrition', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('health-nutrition/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        HealthNutrition::create($data);

        return redirect()->route('admin.health-nutrition.index')
            ->with('success', 'Health Nutrition information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $healthNutrition = HealthNutrition::first();
        $data = $request->except(['main_image', 'gallery_image']);

        if ($request->hasFile('main_image')) {
            if ($healthNutrition->main_image && Storage::disk('public')->exists($healthNutrition->main_image)) {
                Storage::disk('public')->delete($healthNutrition->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('health-nutrition', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            if ($healthNutrition->gallery_image) {
                foreach ($healthNutrition->gallery_image as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('health-nutrition/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        $healthNutrition->update($data);

        return redirect()->route('admin.health-nutrition.index')
            ->with('success', 'Health Nutrition information updated successfully.');
    }
}
