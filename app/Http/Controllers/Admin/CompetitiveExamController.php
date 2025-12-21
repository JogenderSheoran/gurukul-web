<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitiveExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompetitiveExamController extends Controller
{
    public function index()
    {
        $title = 'Competitive Exam Management';
        $exam = CompetitiveExam::first();
        return view('admin-v1.admin.competitive-exam.index', compact('exam', 'title'));
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
            $data['main_image'] = $request->file('main_image')->store('competitive-exam', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('competitive-exam/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        CompetitiveExam::create($data);

        return redirect()->route('admin.competitive-exam.index')
            ->with('success', 'Competitive Exam information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $exam = CompetitiveExam::first();
        $data = $request->except(['main_image', 'gallery_images']);

        if ($request->hasFile('main_image')) {
            if ($exam->main_image && Storage::disk('public')->exists($exam->main_image)) {
                Storage::disk('public')->delete($exam->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('competitive-exam', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            if ($exam->gallery_images) {
                foreach ($exam->gallery_images as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('competitive-exam/gallery', 'public');
            }
            $data['gallery_images'] = $galleryImages;
        }

        $exam->update($data);

        return redirect()->route('admin.competitive-exam.index')
            ->with('success', 'Competitive Exam information updated successfully.');
    }
}
