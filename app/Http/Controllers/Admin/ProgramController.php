<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $title = 'Programs';
        $programs = Program::all();
        $programNames = Program::getProgramNames();
        
        return view('admin-v1.admin.program.index', compact('title', 'programs', 'programNames'));
    }

    public function create()
    {
        $title = 'Add Program';
        $programNames = Program::getProgramNames();
        $existingKeys = Program::where('status', 'active')->pluck('program_key')->toArray();
        
        // Filter out existing active programs
        $availablePrograms = array_diff_key($programNames, array_flip($existingKeys));
        
        if (empty($availablePrograms)) {
            return redirect()->route('admin.program.index')
                ->with('error', 'All programs have been created. You can edit existing programs.');
        }
        
        return view('admin-v1.admin.program.create', compact('title', 'availablePrograms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_key' => 'required|in:sports,reading,celebrations,activities,exams,house_system',
            'title' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Check if active program with same key exists
        if ($request->status === 'active') {
            $exists = Program::where('program_key', $request->program_key)
                ->where('status', 'active')
                ->exists();
            
            if ($exists) {
                return back()->withErrors(['program_key' => 'An active program with this key already exists.'])->withInput();
            }
        }

        $data = $request->only(['program_key', 'title', 'description', 'status']);

        // Upload main image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('programs', 'public');
        }

        // Upload slider images
        if ($request->hasFile('slider_images')) {
            $sliderImages = [];
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('programs/sliders', 'public');
            }
            $data['slider_images'] = $sliderImages;
        }

        Program::create($data);

        return redirect()->route('admin.program.index')
            ->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $title = 'View Program';
        $programNames = Program::getProgramNames();
        
        return view('admin-v1.admin.program.show', compact('title', 'program', 'programNames'));
    }

    public function edit(Program $program)
    {
        $title = 'Edit Program';
        $programNames = Program::getProgramNames();
        
        return view('admin-v1.admin.program.edit', compact('title', 'program', 'programNames'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Check if changing to active and another active exists
        if ($request->status === 'active' && $program->status !== 'active') {
            $exists = Program::where('program_key', $program->program_key)
                ->where('status', 'active')
                ->where('id', '!=', $program->id)
                ->exists();
            
            if ($exists) {
                return back()->withErrors(['status' => 'An active program with this key already exists. Please deactivate it first.'])->withInput();
            }
        }

        $data = $request->only(['title', 'description', 'status']);

        // Upload main image
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($program->main_image) {
                Storage::disk('public')->delete($program->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('programs', 'public');
        }

        // Upload slider images
        if ($request->hasFile('slider_images')) {
            // Delete old slider images
            if ($program->slider_images) {
                foreach ($program->slider_images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $sliderImages = [];
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('programs/sliders', 'public');
            }
            $data['slider_images'] = $sliderImages;
        }

        $program->update($data);

        return redirect()->route('admin.program.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        // Delete main image
        if ($program->main_image) {
            Storage::disk('public')->delete($program->main_image);
        }

        // Delete slider images
        if ($program->slider_images) {
            foreach ($program->slider_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $program->delete();

        return redirect()->route('admin.program.index')
            ->with('success', 'Program deleted successfully.');
    }
}
