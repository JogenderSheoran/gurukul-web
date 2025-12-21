<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HostelController extends Controller
{
    public function index()
    {
        $title = 'Hostel Management';
        $hostel = Hostel::first();
        return view('admin-v1.admin.hostel.index', compact('hostel', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $data = $request->except(['banner_image', 'additional_image', 'gallery_image']);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('hostel', 'public');
        }
        if ($request->hasFile('additional_image')) {
            $data['additional_image'] = $request->file('additional_image')->store('hostel', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('hostel/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        Hostel::create($data);

        return redirect()->route('admin.hostel.index')
            ->with('success', 'Hostel information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'additional_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $hostel = Hostel::first();
        $data = $request->except(['banner_image', 'additional_image', 'gallery_image']);

        if ($request->hasFile('banner_image')) {
            if ($hostel->banner_image && Storage::disk('public')->exists($hostel->banner_image)) {
                Storage::disk('public')->delete($hostel->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('hostel', 'public');
        }

        if ($request->hasFile('additional_image')) {
            if ($hostel->additional_image && Storage::disk('public')->exists($hostel->additional_image)) {
                Storage::disk('public')->delete($hostel->additional_image);
            }
            $data['additional_image'] = $request->file('additional_image')->store('hostel', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            if ($hostel->gallery_image) {
                foreach ($hostel->gallery_image as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                $galleryImages[] = $image->store('hostel/gallery', 'public');
            }
            $data['gallery_image'] = $galleryImages;
        }

        $hostel->update($data);

        return redirect()->route('admin.hostel.index')
            ->with('success', 'Hostel information updated successfully.');
    }
}
