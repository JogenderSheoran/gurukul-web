<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InnerBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InnerBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Inner Banner Management';
        $totalBanners = InnerBanner::count();
        $activeBanners = InnerBanner::where('status', 'active')->count();
        $inactiveBanners = InnerBanner::where('status', 'inactive')->count();
        $todayBanners = InnerBanner::whereDate('created_at', today())->count();
        
        return view('admin-v1.admin.inner-banner.index', compact('title', 'totalBanners', 'activeBanners', 'inactiveBanners', 'todayBanners'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = InnerBanner::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        $filteredRecords = $query->count();

        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['name'];
            $orderDir = $request->order[0]['dir'];
            if ($orderColumn && $orderColumn != 'action') {
                $query->orderBy($orderColumn, $orderDir);
            }
        } else {
            $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
        }

        $start = $request->start ?? 0;
        $length = $request->length ?? 25;
        $banners = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($banners as $index => $banner) {
            $statusBadge = $banner->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $image = $banner->image 
                ? '<img src="' . asset('storage/' . $banner->image) . '" class="banner-thumbnail" alt="Banner" style="max-width:100px;">'  
                : '<span class="text-muted">No Image</span>';

            $actions = '
                <a href="' . route('admin.inner-banner.edit', $banner->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $banner->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteBanner(' . $banner->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'image' => $image,
                'title' => $banner->title ?? 'N/A',
                'order' => $banner->order ?? 'N/A',
                'status' => $statusBadge,
                'created_at' => $banner->created_at->format('M d, Y'),
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Inner Banner';
        return view('admin-v1.admin.inner-banner.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'title' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('inner-banners', 'public');
        }

        InnerBanner::create([
            'image' => $imagePath,
            'title' => $request->title,
            'status' => $request->status,
            'order' => $request->order ?? 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Inner banner created successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InnerBanner $innerBanner)
    {
        $title = 'Edit Inner Banner';
        return view('admin-v1.admin.inner-banner.edit', compact('innerBanner', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InnerBanner $innerBanner)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'title' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'status' => $request->status,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($innerBanner->image && Storage::disk('public')->exists($innerBanner->image)) {
                Storage::disk('public')->delete($innerBanner->image);
            }
            $data['image'] = $request->file('image')->store('inner-banners', 'public');
        }

        $innerBanner->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Inner banner updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InnerBanner $innerBanner)
    {
        if ($innerBanner->image && Storage::disk('public')->exists($innerBanner->image)) {
            Storage::disk('public')->delete($innerBanner->image);
        }

        $innerBanner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Inner banner deleted successfully.'
        ]);
    }

    /**
     * Toggle banner status.
     */
    public function toggleStatus(InnerBanner $innerBanner)
    {
        $innerBanner->status = $innerBanner->status === 'active' ? 'inactive' : 'active';
        $innerBanner->save();

        return response()->json([
            'success' => true,
            'status' => $innerBanner->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
