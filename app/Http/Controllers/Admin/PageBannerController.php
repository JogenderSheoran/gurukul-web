<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageBannerController extends Controller
{
    // Define all frontend pages based on routes
    private function getPageKeys()
    {
        return [
            'home' => 'Home',
            'principal_message' => 'Principal Message',
            'chairmain_message' => 'Chairman Message',
            'vision_mission' => 'Vision & Mission',
            'core_values' => 'Core Values',
            'team' => 'Team',
            'hostel' => 'Hostel',
            'nutrition' => 'Nutrition',
            'health_wellness' => 'Health & Wellness',
            'classroom_facilities' => 'Classroom Facilities',
            'library_facilities' => 'Library Facilities',
            'music_dance_classes' => 'Music & Dance Classes',
            'virtual_and_interactive_board_smart_classrooms' => 'Smart Classrooms',
            'computer_labs' => 'Computer Lab',
            'physics_labs' => 'Physics Lab',
            'chemistry_labs' => 'Chemistry Lab',
            'biology_labs' => 'Biology Lab',
            'art_labs' => 'Art Lab',
            'sports_complex' => 'Sports Complex',
            'reading_mission' => 'Reading Mission',
            'celebration_adventure' => 'Celebration & Adventure',
            'co_curricular_activities' => 'Co-curricular Activities',
            'competitive_exam' => 'Competitive Exam',
            'house_system' => 'House System',
            'admission_form' => 'Admission Form',
            'admission_procedure' => 'Admission Procedure',
            'entrance_cum_syllabus' => 'Entrance Cum Syllabus',
            'fee_structure' => 'Fee Structure',
            'required_item' => 'Required Item',
            'important_information' => 'Important Information',
            'blogs' => 'Blogs',
            'contact' => 'Contact',
            'gallery' => 'Gallery',
            'events' => 'Events',
            'news' => 'News',
        ];
    }

    public function index()
    {
        $title = 'Page Banners Management';
        $banners = PageBanner::all()->keyBy('page_key');
        $pageKeys = $this->getPageKeys();
        
        return view('admin-v1.admin.page-banner.index', compact('banners', 'pageKeys', 'title'));
    }

    public function create()
    {
        $title = 'Add Page Banner';
        $pageKeys = $this->getPageKeys();
        $existingKeys = PageBanner::pluck('page_key')->toArray();
        
        return view('admin-v1.admin.page-banner.create', compact('pageKeys', 'existingKeys', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_key' => 'required|string|unique:page_banners,page_key',
            'banner_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'banner_content' => 'nullable|string',
        ]);

        $data = $request->except(['banner_image']);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('page-banners', 'public');
        }

        PageBanner::create($data);

        return redirect()->route('admin.page-banner.index')
            ->with('success', 'Page banner created successfully.');
    }

    public function edit($id)
    {
        $title = 'Edit Page Banner';
        $banner = PageBanner::findOrFail($id);
        $pageKeys = $this->getPageKeys();
        
        return view('admin-v1.admin.page-banner.edit', compact('banner', 'pageKeys', 'title'));
    }

    public function update(Request $request, $id)
    {
        $banner = PageBanner::findOrFail($id);
        
        $request->validate([
            'page_key' => 'required|string|unique:page_banners,page_key,' . $id,
            'banner_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'banner_content' => 'nullable|string',
        ]);

        $data = $request->except(['banner_image']);

        if ($request->hasFile('banner_image')) {
            if ($banner->banner_image && Storage::disk('public')->exists($banner->banner_image)) {
                Storage::disk('public')->delete($banner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('page-banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.page-banner.index')
            ->with('success', 'Page banner updated successfully.');
    }

    public function show($id)
    {
        $title = 'View Page Banner';
        $banner = PageBanner::findOrFail($id);
        $pageKeys = $this->getPageKeys();
        
        return view('admin-v1.admin.page-banner.show', compact('banner', 'pageKeys', 'title'));
    }
}
