<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Blog Management';
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('status', 'published')->count();
        $draftBlogs = Blog::where('status', 'draft')->count();
        $todayBlogs = Blog::whereDate('created_at', today())->count();

        return view('admin-v1.admin.blog.index', compact('title', 'totalBlogs', 'publishedBlogs', 'draftBlogs', 'todayBlogs'));
    }

    /**
     * Get data for DataTables.
     */
    public function getData(Request $request)
    {
        $query = Blog::query();

        // Apply status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $totalRecords = $query->count();
        
        // Search
        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
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
        $blogs = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($blogs as $index => $blog) {
            $statusBadge = $blog->status == 'published' 
                ? '<span class="badge badge-success">Published</span>' 
                : '<span class="badge badge-warning">Draft</span>';

            $actions = '
                <a href="' . route('admin.blog.edit', $blog->id) . '" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button onclick="toggleStatus(' . $blog->id . ')" class="btn btn-sm btn-warning">
                    <i class="fas fa-sync"></i>
                </button>
                <button onclick="deleteBlog(' . $blog->id . ')" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            ';

            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'title' => $blog->title ?? 'N/A',
                'author' => $blog->author ?? 'N/A',
                'status' => $statusBadge,
                'publish_date' => $blog->publish_date ? date('M d, Y', strtotime($blog->publish_date)) : 'N/A',
                'created_at' => $blog->created_at->format('M d, Y'),
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
        $title = 'Create Blog Post';
        return view('admin-v1.admin.blog.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'publish_date' => 'nullable|date',
        ]);

        Blog::create($request->all());

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $title = 'Edit Blog Post';
        return view('admin-v1.admin.blog.edit', compact('blog', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'publish_date' => 'nullable|date',
        ]);

        $blog->update($request->all());

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle blog publish status.
     */
    public function toggleStatus(Blog $blog)
    {
        $blog->status = $blog->status === 'published' ? 'draft' : 'published';
        $blog->save();

        return response()->json([
            'success' => true,
            'status' => $blog->status,
            'message' => 'Blog status updated successfully.'
        ]);
    }
}
