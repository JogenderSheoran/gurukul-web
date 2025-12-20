<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'News & Events Management';
        $totalEvents = NewsEvent::count();
        $activeEvents = NewsEvent::where('status', 'active')->count();
        $inactiveEvents = NewsEvent::where('status', 'inactive')->count();
        $todayEvents = NewsEvent::whereDate('created_at', today())->count();
        
        return view('admin-v1.admin.news-event.index', compact('title', 'totalEvents', 'activeEvents', 'inactiveEvents', 'todayEvents'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = NewsEvent::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('link', 'like', "%{$search}%");
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
        $events = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($events as $index => $event) {
            $statusBadge = $event->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $actions = '
                <a href="' . route('admin.news-event.edit', $event->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $event->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteEvent(' . $event->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'title' => mb_convert_encoding($event->title ?? 'N/A', 'UTF-8', 'UTF-8'),
                'description' => $event->description ? (mb_strlen($event->description) > 50 ? mb_substr($event->description, 0, 50) . '...' : $event->description) : 'N/A',
                'location' => mb_convert_encoding($event->location ?? 'N/A', 'UTF-8', 'UTF-8'),
                'link' => $event->link ? '<a href="' . $event->link . '" target="_blank"><i class="fas fa-external-link-alt"></i></a>' : 'N/A',
                'status' => $statusBadge,
                'created_at' => $event->created_at->format('M d, Y'),
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create News/Event';
        return view('admin-v1.admin.news-event.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        NewsEvent::create($request->all());

        return redirect()->route('admin.news-event.index')
            ->with('success', 'News/Event created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsEvent $newsEvent)
    {
        $title = 'Edit News/Event';
        return view('admin-v1.admin.news-event.edit', compact('newsEvent', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsEvent $newsEvent)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $newsEvent->update($request->all());

        return redirect()->route('admin.news-event.index')
            ->with('success', 'News/Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsEvent $newsEvent)
    {
        $newsEvent->delete();

        return response()->json([
            'success' => true,
            'message' => 'News/Event deleted successfully.'
        ]);
    }

    /**
     * Toggle status.
     */
    public function toggleStatus(NewsEvent $newsEvent)
    {
        $newsEvent->status = $newsEvent->status === 'active' ? 'inactive' : 'active';
        $newsEvent->save();

        return response()->json([
            'success' => true,
            'status' => $newsEvent->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
