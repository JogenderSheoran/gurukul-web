<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $title = 'Team Members Management';
        $members = TeamMember::latest()->get();
        
        return view('admin-v1.admin.team-member.index', compact('members', 'title'));
    }

    public function create()
    {
        $title = 'Add Team Member';
        
        return view('admin-v1.admin.team-member.create', compact('title'));
    }

    public function store(Request $request)
    {
        $rules = [
            'member_type' => 'required|in:teaching,non_teaching',
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'profile_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];

        if ($request->member_type === 'teaching') {
            $rules['teaching_subject'] = 'required|string|max:255';
        }

        $request->validate($rules);

        $data = $request->except(['profile_image']);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('team-members', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-member.index')
            ->with('success', 'Team member created successfully.');
    }

    public function edit($id)
    {
        $title = 'Edit Team Member';
        $member = TeamMember::findOrFail($id);
        
        return view('admin-v1.admin.team-member.edit', compact('member', 'title'));
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);
        
        $rules = [
            'member_type' => 'required|in:teaching,non_teaching',
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'profile_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];

        if ($request->member_type === 'teaching') {
            $rules['teaching_subject'] = 'required|string|max:255';
        }

        $request->validate($rules);

        $data = $request->except(['profile_image']);

        if ($request->hasFile('profile_image')) {
            if ($member->profile_image && Storage::disk('public')->exists($member->profile_image)) {
                Storage::disk('public')->delete($member->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('team-members', 'public');
        }

        $member->update($data);

        return redirect()->route('admin.team-member.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function show($id)
    {
        $title = 'View Team Member';
        $member = TeamMember::findOrFail($id);
        
        return view('admin-v1.admin.team-member.show', compact('member', 'title'));
    }
}
