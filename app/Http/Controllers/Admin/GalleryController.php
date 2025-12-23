<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gallery Management';
        $totalImages = Gallery::count();
        $activeImages = Gallery::where('status', 'active')->count();
        $inactiveImages = Gallery::where('status', 'inactive')->count();
        $todayImages = Gallery::whereDate('created_at', today())->count();
        
        return view('admin-v1.admin.gallery.index', compact('title', 'totalImages', 'activeImages', 'inactiveImages', 'todayImages'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = Gallery::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
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
        $images = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($images as $index => $image) {
            $statusBadge = $image->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $imageTag = $image->image 
                ? '<img src="' . asset('storage/' . $image->image) . '" class="gallery-thumbnail" alt="Gallery" style="max-width:100px; border-radius:8px;">'  
                : '<span class="text-muted">No Image</span>';

            $actions = '
                <a href="' . route('admin.gallery.edit', $image->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $image->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteImage(' . $image->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'id' => $image->id,
                'DT_RowIndex' => $start + $index + 1,
                'image' => $imageTag,
                'title' => $image->title ?? 'N/A',
                'order' => $image->order ?? 'N/A',
                'status' => $statusBadge,
                'created_at' => $image->created_at->format('M d, Y'),
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
        $title = 'Add Gallery Image';
        return view('admin-v1.admin.gallery.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $uploadedCount = 0;
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('gallery', 'public');
                
                Gallery::create([
                    'image' => $imagePath,
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'order' => $request->order ?? 0,
                ]);
                
                $uploadedCount++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => $uploadedCount . ' image(s) uploaded successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $title = 'Edit Gallery Image';
        return view('admin-v1.admin.gallery.edit', compact('gallery', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Gallery image updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image deleted successfully.'
        ]);
    }

    /**
     * Toggle gallery image status.
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->status = $gallery->status === 'active' ? 'inactive' : 'active';
        $gallery->save();

        return response()->json([
            'success' => true,
            'status' => $gallery->status,
            'message' => 'Status updated successfully.'
        ]);
    }

    /**
     * Remove single image (for use in edit/index page).
     */
    public function removeImage($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image removed successfully.'
        ]);
    }
}
