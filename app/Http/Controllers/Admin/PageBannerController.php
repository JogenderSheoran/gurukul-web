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
            'principal-message' => 'Principal Message',
            'chairman-message' => 'Chairman Message',
            'vision-mission' => 'Vision & Mission',
            'core-values' => 'Core Values',
            'team' => 'Team',
            'hostel' => 'Hostel',
            'nutrition' => 'Nutrition',
            'health-wellness' => 'Health & Wellness',
            'classroom-facilities' => 'Classroom Facilities',
            'library-facilities' => 'Library Facilities',
            'music-dance-classes' => 'Music & Dance Classes',
            'virtual-and-interactive-board-smart-classrooms' => 'Smart Classrooms',
            'computer-labs' => 'Computer Labs',
            'physics-labs' => 'Physics Labs',
            'chemistry-labs' => 'Chemistry Labs',
            'biology-labs' => 'Biology Labs',
            'art-labs' => 'Art Labs',
            'sports-complex' => 'Sports Complex',
            'reading-mission' => 'Reading Mission',
            'celebration-adventure' => 'Celebration & Adventure',
            'co-curricular-activities' => 'Co-curricular Activities',
            'competitive-exam' => 'Competitive Exam',
            'house-system' => 'House System',
            'admission-form' => 'Admission Form',
            'admission-procedure' => 'Admission Procedure',
            'entrance-cum-syllabus' => 'Entrance Cum Syllabus',
            'fee-structure' => 'Fee Structure',
            'required-item' => 'Required Item',
            'important-information' => 'Important Information',
            'blogs' => 'Blogs',
            'contact' => 'Contact',
            'gallery' => 'Gallery',
            'events' => 'Events',
            'news' => 'News',
            'mandatory-disclosure' => 'Mandatory Disclosure',
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

        $data = $request->only(['page_key', 'banner_content']);

        if ($request->hasFile('banner_image')) {
            // Delete old image if exists
            if ($banner->banner_image && Storage::disk('public')->exists($banner->banner_image)) {
                Storage::disk('public')->delete($banner->banner_image);
            }
            // Upload new image
            $data['banner_image'] = $request->file('banner_image')->store('page-banners', 'public');
        }
        // If no new image uploaded, keep the existing image (don't update banner_image field)

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
