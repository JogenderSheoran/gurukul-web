<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    public function index()
    {
        $title = 'Infrastructure Management';
        $totalInfrastructures = Infrastructure::count();
        $activeInfrastructures = Infrastructure::where('status', 'active')->count();
        $inactiveInfrastructures = Infrastructure::where('status', 'inactive')->count();
        
        return view('admin-v1.admin.infrastructure.index', compact('title', 'totalInfrastructures', 'activeInfrastructures', 'inactiveInfrastructures'));
    }

    public function getData(Request $request)
    {
        $query = Infrastructure::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('heading', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('icon', 'like', "%{$search}%");
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
            $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
        }

        $start = $request->start ?? 0;
        $length = $request->length ?? 25;
        $infrastructures = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($infrastructures as $index => $infrastructure) {
            $statusBadge = $infrastructure->status == 'active' 
                ? '<span class="badge badge-success">Active</span>' 
                : '<span class="badge badge-secondary">Inactive</span>';

            $actions = '
                <a href="' . route('admin.infrastructure.edit', $infrastructure->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $infrastructure->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteInfrastructure(' . $infrastructure->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'icon' => '<i class="' . $infrastructure->icon . ' fa-2x"></i>',
                'heading' => mb_convert_encoding($infrastructure->heading ?? 'N/A', 'UTF-8', 'UTF-8'),
                'description' => $infrastructure->description ? (mb_strlen($infrastructure->description) > 50 ? mb_substr($infrastructure->description, 0, 50) . '...' : $infrastructure->description) : 'N/A',
                'order' => $infrastructure->order,
                'status' => $statusBadge,
                'created_at' => $infrastructure->created_at->format('M d, Y'),
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
        $title = 'Create Infrastructure';
        return view('admin-v1.admin.infrastructure.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        Infrastructure::create($request->all());

        return redirect()->route('admin.infrastructure.index')
            ->with('success', 'Infrastructure created successfully.');
    }

    public function edit(Infrastructure $infrastructure)
    {
        $title = 'Edit Infrastructure';
        return view('admin-v1.admin.infrastructure.edit', compact('infrastructure', 'title'));
    }

    public function update(Request $request, Infrastructure $infrastructure)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        $infrastructure->update($request->all());

        return redirect()->route('admin.infrastructure.index')
            ->with('success', 'Infrastructure updated successfully.');
    }

    public function destroy(Infrastructure $infrastructure)
    {
        $infrastructure->delete();

        return response()->json([
            'success' => true,
            'message' => 'Infrastructure deleted successfully.'
        ]);
    }

    public function toggleStatus(Infrastructure $infrastructure)
    {
        $infrastructure->status = $infrastructure->status === 'active' ? 'inactive' : 'active';
        $infrastructure->save();

        return response()->json([
            'success' => true,
            'status' => $infrastructure->status,
            'message' => 'Status updated successfully.'
        ]);
    }
}
