<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SportsComplex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsComplexController extends Controller
{
    public function index()
    {
        $title = 'Sports Complex Management';
        $sportsComplex = SportsComplex::first();
        return view('admin-v1.admin.sports-complex.index', compact('sportsComplex', 'title'));
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
            $data['main_image'] = $request->file('main_image')->store('sports-complex', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('sports-complex/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        SportsComplex::create($data);

        return redirect()->route('admin.sports-complex.index')
            ->with('success', 'Sports Complex information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $sportsComplex = SportsComplex::first();
        $data = $request->except(['main_image', 'gallery_image']);

        if ($request->hasFile('main_image')) {
            if ($sportsComplex->main_image && Storage::disk('public')->exists($sportsComplex->main_image)) {
                Storage::disk('public')->delete($sportsComplex->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('sports-complex', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            if ($sportsComplex->gallery_image) {
                foreach ($sportsComplex->gallery_image as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('sports-complex/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        $sportsComplex->update($data);

        return redirect()->route('admin.sports-complex.index')
            ->with('success', 'Sports Complex information updated successfully.');
    }
}
