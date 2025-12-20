<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Statistics Management';
        $totalStats = Stat::count();
        $activeStats = Stat::where('status', 'active')->count();
        $inactiveStats = Stat::where('status', 'inactive')->count();
        $todayStats = Stat::whereDate('created_at', today())->count();
        
        return view('admin-v1.admin.stat.index', compact('title', 'totalStats', 'activeStats', 'inactiveStats', 'todayStats'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = Stat::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('heading', 'like', "%{$search}%")
                  ->orWhere('value', 'like', "%{$search}%")
                  ->orWhere('icon', 'like', "%{$search}%");
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
        $stats = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($stats as $index => $stat) {
            $statusBadge = $stat->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $actions = '
                <a href="' . route('admin.stat.edit', $stat->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $stat->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteStat(' . $stat->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'icon' => $stat->icon ? '<i class="' . $stat->icon . ' fa-2x"></i>' : 'N/A',
                'value' => mb_convert_encoding($stat->value ?? 'N/A', 'UTF-8', 'UTF-8'),
                'heading' => mb_convert_encoding($stat->heading ?? 'N/A', 'UTF-8', 'UTF-8'),
                'order' => $stat->order ?? 'N/A',
                'status' => $statusBadge,
                'created_at' => $stat->created_at->format('M d, Y'),
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
        $title = 'Create Statistic';
        return view('admin-v1.admin.stat.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'value' => 'required|string|max:100',
            'heading' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        Stat::create($request->all());

        return redirect()->route('admin.stat.index')
            ->with('success', 'Statistic created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stat $stat)
    {
        $title = 'Edit Statistic';
        return view('admin-v1.admin.stat.edit', compact('stat', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'value' => 'required|string|max:100',
            'heading' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $stat->update($request->all());

        return redirect()->route('admin.stat.index')
            ->with('success', 'Statistic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stat $stat)
    {
        $stat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Statistic deleted successfully.'
        ]);
    }

    /**
     * Toggle status.
     */
    public function toggleStatus(Stat $stat)
    {
        $stat->status = $stat->status === 'active' ? 'inactive' : 'active';
        $stat->save();

        return response()->json([
            'success' => true,
            'status' => $stat->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
