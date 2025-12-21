<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReadingMissionController extends Controller
{
    public function index()
    {
        $title = 'Reading Mission Management';
        $readingMission = ReadingMission::first();
        return view('admin-v1.admin.reading-mission.index', compact('readingMission', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
        ]);

        $data = $request->except(['main_image']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('reading-mission', 'public');
        }

        ReadingMission::create($data);

        return redirect()->route('admin.reading-mission.index')
            ->with('success', 'Reading Mission information created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'description' => 'required|string',
        ]);

        $readingMission = ReadingMission::first();
        $data = $request->except(['main_image']);

        if ($request->hasFile('main_image')) {
            if ($readingMission->main_image && Storage::disk('public')->exists($readingMission->main_image)) {
                Storage::disk('public')->delete($readingMission->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('reading-mission', 'public');
        }

        $readingMission->update($data);

        return redirect()->route('admin.reading-mission.index')
            ->with('success', 'Reading Mission information updated successfully.');
    }
}
