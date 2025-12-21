<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfrastructureSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfrastructureSectionController extends Controller
{
    public function index()
    {
        $title = 'Infrastructure Sections';
        $sections = InfrastructureSection::all();
        $sectionNames = InfrastructureSection::getSectionNames();
        
        return view('admin-v1.admin.infrastructure-section.index', compact('title', 'sections', 'sectionNames'));
    }

    public function create()
    {
        $title = 'Add Infrastructure Section';
        $sectionNames = InfrastructureSection::getSectionNames();
        $existingSections = InfrastructureSection::pluck('section_key')->toArray();
        
        // Filter out existing sections
        $availableSections = array_diff_key($sectionNames, array_flip($existingSections));
        
        if (empty($availableSections)) {
            return redirect()->route('admin.infrastructure-section.index')
                ->with('error', 'All sections have been created. You can edit existing sections.');
        }
        
        return view('admin-v1.admin.infrastructure-section.create', compact('title', 'availableSections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_key' => 'required|in:classroom,library,smart_classroom,music_and_dance|unique:infrastructure_sections,section_key',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['section_key', 'description']);

        // Upload main image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('infrastructure-sections', 'public');
        }

        // Upload slider images
        if ($request->hasFile('slider_images')) {
            $sliderImages = [];
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('infrastructure-sections/sliders', 'public');
            }
            $data['slider_images'] = $sliderImages;
        }

        InfrastructureSection::create($data);

        return redirect()->route('admin.infrastructure-section.index')
            ->with('success', 'Infrastructure section created successfully.');
    }

    public function show(InfrastructureSection $infrastructureSection)
    {
        $title = 'View Infrastructure Section';
        $sectionNames = InfrastructureSection::getSectionNames();
        
        return view('admin-v1.admin.infrastructure-section.show', compact('title', 'infrastructureSection', 'sectionNames'));
    }

    public function edit(InfrastructureSection $infrastructureSection)
    {
        $title = 'Edit Infrastructure Section';
        $sectionNames = InfrastructureSection::getSectionNames();
        
        return view('admin-v1.admin.infrastructure-section.edit', compact('title', 'infrastructureSection', 'sectionNames'));
    }

    public function update(Request $request, InfrastructureSection $infrastructureSection)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['description']);

        // Upload main image
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($infrastructureSection->main_image) {
                Storage::disk('public')->delete($infrastructureSection->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('infrastructure-sections', 'public');
        }

        // Upload slider images
        if ($request->hasFile('slider_images')) {
            // Delete old slider images
            if ($infrastructureSection->slider_images) {
                foreach ($infrastructureSection->slider_images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $sliderImages = [];
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('infrastructure-sections/sliders', 'public');
            }
            $data['slider_images'] = $sliderImages;
        }

        $infrastructureSection->update($data);

        return redirect()->route('admin.infrastructure-section.index')
            ->with('success', 'Infrastructure section updated successfully.');
    }

    public function destroy(InfrastructureSection $infrastructureSection)
    {
        // Delete main image
        if ($infrastructureSection->main_image) {
            Storage::disk('public')->delete($infrastructureSection->main_image);
        }

        // Delete slider images
        if ($infrastructureSection->slider_images) {
            foreach ($infrastructureSection->slider_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $infrastructureSection->delete();

        return redirect()->route('admin.infrastructure-section.index')
            ->with('success', 'Infrastructure section deleted successfully.');
    }
}
