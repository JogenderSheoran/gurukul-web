<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageText;
use Illuminate\Http\Request;

class HomePageTextController extends Controller
{
    public function index()
    {
        $title = 'Home Page Text Management';
        $totalTexts = HomePageText::count();
        $activeTexts = HomePageText::where('status', 'active')->count();
        $inactiveTexts = HomePageText::where('status', 'inactive')->count();
        
        return view('admin-v1.admin.home-page-text.index', compact('title', 'totalTexts', 'activeTexts', 'inactiveTexts'));
    }

    public function getData(Request $request)
    {
        $query = HomePageText::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('heading_en', 'like', "%{$search}%")
                  ->orWhere('heading_hi', 'like', "%{$search}%")
                  ->orWhere('text_en', 'like', "%{$search}%")
                  ->orWhere('text_hi', 'like', "%{$search}%");
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
        $texts = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($texts as $index => $text) {
            $statusBadge = $text->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $actions = '
                <a href="' . route('admin.home-page-text.edit', $text->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $text->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteText(' . $text->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'heading_en' => mb_convert_encoding($text->heading_en ?? 'N/A', 'UTF-8', 'UTF-8'),
                'heading_hi' => mb_convert_encoding($text->heading_hi ?? 'N/A', 'UTF-8', 'UTF-8'),
                'text_en' => $text->text_en ? (mb_strlen($text->text_en) > 50 ? mb_substr($text->text_en, 0, 50) . '...' : $text->text_en) : 'N/A',
                'text_hi' => $text->text_hi ? (mb_strlen($text->text_hi) > 50 ? mb_substr($text->text_hi, 0, 50) . '...' : $text->text_hi) : 'N/A',
                'status' => $statusBadge,
                'created_at' => $text->created_at->format('M d, Y'),
                'action' => $actions
            ];
        }

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function create()
    {
        $title = 'Create Home Page Text';
        return view('admin-v1.admin.home-page-text.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading_en' => 'required|string|max:255',
            'heading_hi' => 'required|string|max:255',
            'text_en' => 'required|string',
            'text_hi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        HomePageText::create($request->all());

        return redirect()->route('admin.home-page-text.index')
            ->with('success', 'Home page text created successfully.');
    }

    public function edit(HomePageText $homePageText)
    {
        $title = 'Edit Home Page Text';
        return view('admin-v1.admin.home-page-text.edit', compact('homePageText', 'title'));
    }

    public function update(Request $request, HomePageText $homePageText)
    {
        $request->validate([
            'heading_en' => 'required|string|max:255',
            'heading_hi' => 'required|string|max:255',
            'text_en' => 'required|string',
            'text_hi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $homePageText->update($request->all());

        return redirect()->route('admin.home-page-text.index')
            ->with('success', 'Home page text updated successfully.');
    }

    public function destroy(HomePageText $homePageText)
    {
        $homePageText->delete();

        return response()->json([
            'success' => true,
            'message' => 'Home page text deleted successfully.'
        ]);
    }

    public function toggleStatus(HomePageText $homePageText)
    {
        $homePageText->status = $homePageText->status === 'active' ? 'inactive' : 'active';
        $homePageText->save();

        return response()->json([
            'success' => true,
            'status' => $homePageText->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
