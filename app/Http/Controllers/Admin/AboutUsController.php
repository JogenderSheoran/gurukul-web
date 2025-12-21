<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display the About Us management page.
     */
    public function index()
    {
        $title = 'About Us Management';
        $aboutUs = AboutUs::first();
        return view('admin-v1.admin.about-us.index', compact('aboutUs', 'title'));
    }

    /**
     * Store a newly created About Us record.
     */
    public function store(Request $request)
    {
        $request->validate([
            'principal_message' => 'required|string',
            'principal_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'chairman_message' => 'required|string',
            'chairman_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'our_vision' => 'required|string',
            'our_vision_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'our_mission' => 'required|string',
            'our_mission_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'core_value' => 'required|string',
            'core_value_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $data = $request->except(['principal_image', 'chairman_image', 'our_vision_image', 'our_mission_image', 'core_value_image']);

        // Handle image uploads
        if ($request->hasFile('principal_image')) {
            $data['principal_image'] = $request->file('principal_image')->store('about-us', 'public');
        }
        if ($request->hasFile('chairman_image')) {
            $data['chairman_image'] = $request->file('chairman_image')->store('about-us', 'public');
        }
        if ($request->hasFile('our_vision_image')) {
            $data['our_vision_image'] = $request->file('our_vision_image')->store('about-us', 'public');
        }
        if ($request->hasFile('our_mission_image')) {
            $data['our_mission_image'] = $request->file('our_mission_image')->store('about-us', 'public');
        }
        if ($request->hasFile('core_value_image')) {
            $data['core_value_image'] = $request->file('core_value_image')->store('about-us', 'public');
        }

        AboutUs::create($data);

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us information created successfully.');
    }

    /**
     * Update the About Us record.
     */
    public function update(Request $request)
    {
        $request->validate([
            'principal_message' => 'required|string',
            'principal_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'chairman_message' => 'required|string',
            'chairman_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'our_vision' => 'required|string',
            'our_vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'our_mission' => 'required|string',
            'our_mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'core_value' => 'required|string',
            'core_value_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        $aboutUs = AboutUs::first();
        $data = $request->except(['principal_image', 'chairman_image', 'our_vision_image', 'our_mission_image', 'core_value_image']);

        // Handle image uploads - only update if new image is uploaded
        if ($request->hasFile('principal_image')) {
            // Delete old image
            if ($aboutUs->principal_image && Storage::disk('public')->exists($aboutUs->principal_image)) {
                Storage::disk('public')->delete($aboutUs->principal_image);
            }
            $data['principal_image'] = $request->file('principal_image')->store('about-us', 'public');
        }

        if ($request->hasFile('chairman_image')) {
            if ($aboutUs->chairman_image && Storage::disk('public')->exists($aboutUs->chairman_image)) {
                Storage::disk('public')->delete($aboutUs->chairman_image);
            }
            $data['chairman_image'] = $request->file('chairman_image')->store('about-us', 'public');
        }

        if ($request->hasFile('our_vision_image')) {
            if ($aboutUs->our_vision_image && Storage::disk('public')->exists($aboutUs->our_vision_image)) {
                Storage::disk('public')->delete($aboutUs->our_vision_image);
            }
            $data['our_vision_image'] = $request->file('our_vision_image')->store('about-us', 'public');
        }

        if ($request->hasFile('our_mission_image')) {
            if ($aboutUs->our_mission_image && Storage::disk('public')->exists($aboutUs->our_mission_image)) {
                Storage::disk('public')->delete($aboutUs->our_mission_image);
            }
            $data['our_mission_image'] = $request->file('our_mission_image')->store('about-us', 'public');
        }

        if ($request->hasFile('core_value_image')) {
            if ($aboutUs->core_value_image && Storage::disk('public')->exists($aboutUs->core_value_image)) {
                Storage::disk('public')->delete($aboutUs->core_value_image);
            }
            $data['core_value_image'] = $request->file('core_value_image')->store('about-us', 'public');
        }

        $aboutUs->update($data);

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us information updated successfully.');
    }
}
