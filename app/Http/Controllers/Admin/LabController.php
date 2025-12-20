<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LabController extends Controller
{
    public function index()
    {
        $title = 'Labs Management';
        $totalLabs = Lab::count();
        $activeLabs = Lab::where('status', 'active')->count();
        $inactiveLabs = Lab::where('status', 'inactive')->count();
        
        return view('admin-v1.admin.lab.index', compact('title', 'totalLabs', 'activeLabs', 'inactiveLabs'));
    }

    public function getData(Request $request)
    {
        $query = Lab::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('lab_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $filteredRecords = $query->count();

        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['data'] ?? null;
            $orderDir = $request->order[0]['dir'];
            if ($orderColumn && $orderColumn != 'action' && $orderColumn != 'DT_RowIndex') {
                $query->orderBy($orderColumn, $orderDir);
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $start = $request->start ?? 0;
        $length = $request->length ?? 25;
        $labs = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($labs as $index => $lab) {
            $statusBadge = $lab->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $mainBanner = $lab->main_banner 
                ? '<img src="' . asset('storage/' . $lab->main_banner) . '" width="80" height="50" class="img-thumbnail">'
                : 'N/A';

            $sliderCount = is_array($lab->slider_images) ? count($lab->slider_images) : 0;

            $actions = '
                <a href="' . route('admin.lab.edit', $lab->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $lab->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteLab(' . $lab->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'lab_name' => $lab->lab_name ?? 'N/A',
                'main_banner' => $mainBanner,
                'slider_count' => $sliderCount . ' images',
                'description' => $lab->description ? (strlen($lab->description) > 50 ? substr($lab->description, 0, 50) . '...' : $lab->description) : 'N/A',
                'status' => $statusBadge,
                'created_at' => $lab->created_at->format('M d, Y'),
                'action' => $actions
            ];
        }

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create()
    {
        $title = 'Create Lab';
        return view('admin-v1.admin.lab.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lab_name' => 'required|string|max:255',
            'main_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['lab_name', 'description', 'status']);

        // Handle main banner upload
        if ($request->hasFile('main_banner')) {
            $data['main_banner'] = $request->file('main_banner')->store('labs/banners', 'public');
        }

        // Handle slider images upload
        $sliderImages = [];
        if ($request->hasFile('slider_images')) {
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('labs/sliders', 'public');
            }
        }
        $data['slider_images'] = $sliderImages;

        Lab::create($data);

        return redirect()->route('admin.lab.index')
            ->with('success', 'Lab created successfully.');
    }

    public function edit(Lab $lab)
    {
        $title = 'Edit Lab';
        return view('admin-v1.admin.lab.edit', compact('lab', 'title'));
    }

    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'lab_name' => 'required|string|max:255',
            'main_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'slider_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['lab_name', 'description', 'status']);

        // Handle main banner upload
        if ($request->hasFile('main_banner')) {
            // Delete old banner
            if ($lab->main_banner) {
                Storage::disk('public')->delete($lab->main_banner);
            }
            $data['main_banner'] = $request->file('main_banner')->store('labs/banners', 'public');
        }

        // Handle slider images upload
        $sliderImages = $lab->slider_images ?? [];
        if ($request->hasFile('slider_images')) {
            foreach ($request->file('slider_images') as $image) {
                $sliderImages[] = $image->store('labs/sliders', 'public');
            }
        }
        $data['slider_images'] = $sliderImages;

        $lab->update($data);

        return redirect()->route('admin.lab.index')
            ->with('success', 'Lab updated successfully.');
    }

    public function destroy(Lab $lab)
    {
        // Delete main banner
        if ($lab->main_banner) {
            Storage::disk('public')->delete($lab->main_banner);
        }

        // Delete slider images
        if (is_array($lab->slider_images)) {
            foreach ($lab->slider_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $lab->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lab deleted successfully.'
        ]);
    }

    public function toggleStatus(Lab $lab)
    {
        $lab->status = $lab->status === 'active' ? 'inactive' : 'active';
        $lab->save();

        return response()->json([
            'success' => true,
            'status' => $lab->status,
            'message' => 'Status updated successfully.'
        ]);
    }

    public function removeSliderImage(Request $request, Lab $lab)
    {
        $imageIndex = $request->input('image_index');
        $sliderImages = $lab->slider_images ?? [];

        if (isset($sliderImages[$imageIndex])) {
            // Delete the image file
            Storage::disk('public')->delete($sliderImages[$imageIndex]);
            
            // Remove from array
            unset($sliderImages[$imageIndex]);
            $sliderImages = array_values($sliderImages); // Re-index array
            
            $lab->slider_images = $sliderImages;
            $lab->save();

            return response()->json([
                'success' => true,
                'message' => 'Image removed successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Image not found.'
        ], 404);
    }
}
