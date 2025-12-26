<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdventureCelebration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdventureCelebrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Adventure & Celebrations Management';
        $totalRecords = AdventureCelebration::count();
        $activeRecords = AdventureCelebration::where('status', 'active')->count();
        $inactiveRecords = AdventureCelebration::where('status', 'inactive')->count();
        $adventureCount = AdventureCelebration::where('section_type', 'adventure')->count();
        $celebrationCount = AdventureCelebration::where('section_type', 'celebration')->count();
        
        return view('admin-v1.admin.adventure-celebration.index', compact(
            'title', 
            'totalRecords', 
            'activeRecords', 
            'inactiveRecords',
            'adventureCount',
            'celebrationCount'
        ));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = AdventureCelebration::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('section_type') && $request->section_type != '') {
            $query->where('section_type', $request->section_type);
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
            $query->orderBy('created_at', 'desc');
        }

        $start = $request->start ?? 0;
        $length = $request->length ?? 25;
        $records = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($records as $index => $record) {
            $statusBadge = $record->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $typeBadge = $record->section_type == 'adventure'
                ? '<span class="badge badge-info">Adventure</span>'
                : '<span class="badge badge-warning">Celebration</span>';

            $imageTag = $record->card_image 
                ? '<img src="' . asset('storage/' . $record->card_image) . '" class="img-thumbnail" alt="Card" style="max-width:80px; border-radius:8px;">'  
                : '<span class="text-muted">No Image</span>';

            $galleryLink = $record->gallery_link
                ? '<a href="' . $record->gallery_link . '" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-external-link-alt"></i></a>'
                : '<span class="text-muted">No Link</span>';

            $actions = '
                <a href="' . route('admin.adventure-celebration.edit', $record->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $record->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteRecord(' . $record->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'id' => $record->id,
                'DT_RowIndex' => $start + $index + 1,
                'card_image' => $imageTag,
                'title' => $record->title,
                'section_type' => $typeBadge,
                'gallery_link' => $galleryLink,
                'status' => $statusBadge,
                'created_at' => $record->created_at->format('M d, Y'),
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
        $title = 'Add New Adventure/Celebration';
        return view('admin-v1.admin.adventure-celebration.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_type' => 'required|in:adventure,celebration',
            'title' => 'required|string|max:255',
            'card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_link' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->only(['section_type', 'title', 'gallery_link', 'status']);

        if ($request->hasFile('card_image')) {
            $data['card_image'] = $request->file('card_image')->store('adventure-celebrations', 'public');
        }

        AdventureCelebration::create($data);

        return redirect()->route('admin.adventure-celebration.index')
            ->with('success', 'Record created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdventureCelebration $adventureCelebration)
    {
        $title = 'Edit Adventure/Celebration';
        return view('admin-v1.admin.adventure-celebration.edit', compact('title', 'adventureCelebration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdventureCelebration $adventureCelebration)
    {
        $request->validate([
            'section_type' => 'required|in:adventure,celebration',
            'title' => 'required|string|max:255',
            'card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_link' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->only(['section_type', 'title', 'gallery_link', 'status']);

        if ($request->hasFile('card_image')) {
            // Delete old image
            if ($adventureCelebration->card_image) {
                Storage::disk('public')->delete($adventureCelebration->card_image);
            }
            $data['card_image'] = $request->file('card_image')->store('adventure-celebrations', 'public');
        }

        $adventureCelebration->update($data);

        return redirect()->route('admin.adventure-celebration.index')
            ->with('success', 'Record updated successfully!');
    }

    /**
     * Toggle status.
     */
    public function toggleStatus(AdventureCelebration $adventureCelebration)
    {
        $adventureCelebration->status = $adventureCelebration->status == 'active' ? 'inactive' : 'active';
        $adventureCelebration->save();

        return response()->json(['success' => true, 'status' => $adventureCelebration->status]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdventureCelebration $adventureCelebration)
    {
        if ($adventureCelebration->card_image) {
            Storage::disk('public')->delete($adventureCelebration->card_image);
        }

        $adventureCelebration->delete();

        return response()->json(['success' => true, 'message' => 'Record deleted successfully!']);
    }
}
