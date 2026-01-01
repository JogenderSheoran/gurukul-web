<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopScorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopScorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Top Scorer Management';
        
        // Get unique values for filters
        $classes = TopScorer::distinct()->pluck('class');
        $sections = TopScorer::distinct()->pluck('section');
        $subjects = TopScorer::distinct()->pluck('subject');

        return view('admin-v1.admin.top-scorer.index', compact('title', 'classes', 'sections', 'subjects'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = TopScorer::query();

        // Apply filters
        if ($request->has('class') && $request->class != '') {
            $query->where('class', $request->class);
        }
        if ($request->has('section') && $request->section != '') {
            $query->where('section', $request->section);
        }
        if ($request->has('subject') && $request->subject != '') {
            $query->where('subject', $request->subject);
        }

        $totalRecords = $query->count();
        
        // Search
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('class', 'like', "%{$search}%")
                  ->orWhere('section', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $filteredRecords = $query->count();

        // Ordering
        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['name'];
            $orderDir = $request->order[0]['dir'];
            if ($orderColumn && $orderColumn != 'action') {
                $query->orderBy($orderColumn, $orderDir);
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 25;
        $topScorers = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($topScorers as $index => $scorer) {
            $actions = '
                <a href="' . route('admin.top-scorer.edit', $scorer->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="deleteScorer(' . $scorer->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'name' => $scorer->name ?? 'N/A',
                'class' => $scorer->class ?? 'N/A',
                'section' => $scorer->section ?? 'N/A',
                'subject' => $scorer->subject ?? 'N/A',
                'percentage' => $scorer->percentage ? $scorer->percentage . '%' : 'N/A',
                'created_at' => $scorer->created_at->format('M d, Y'),
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
        $title = 'Add Top Scorer';
        return view('admin-v1.admin.top-scorer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'class' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'subject' => 'required|string|max:100',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'academic_year' => 'nullable|string|max:50',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('top-scorers', 'public');
        }

        TopScorer::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Top Scorer added successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TopScorer $topScorer)
    {
        $title = 'Edit Top Scorer';
        return view('admin-v1.admin.top-scorer.edit', compact('topScorer', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopScorer $topScorer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
            'class' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'subject' => 'required|string|max:100',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'academic_year' => 'nullable|string|max:50',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($topScorer->image && Storage::disk('public')->exists($topScorer->image)) {
                Storage::disk('public')->delete($topScorer->image);
            }
            $data['image'] = $request->file('image')->store('top-scorers', 'public');
        }

        $topScorer->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Top Scorer updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopScorer $topScorer)
    {
        // Delete image file
        if ($topScorer->image && Storage::disk('public')->exists($topScorer->image)) {
            Storage::disk('public')->delete($topScorer->image);
        }
        
        $topScorer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Top Scorer deleted successfully.'
        ]);
    }
}
