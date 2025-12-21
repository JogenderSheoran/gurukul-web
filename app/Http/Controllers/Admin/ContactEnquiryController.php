<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use Yajra\DataTables\Facades\DataTables;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        return view('admin-v1.admin.contact-enquiry.index');
    }

    public function getData()
    {
        $enquiries = ContactEnquiry::orderBy('created_at', 'desc')->get();

        return DataTables::of($enquiries)
            ->addIndexColumn()
            ->addColumn('action', function ($enquiry) {
                return '<button class="btn btn-sm btn-info view-contact-enquiry" data-id="'.$enquiry->id.'">
                            <i class="fas fa-eye"></i> View
                        </button>';
            })
            ->editColumn('created_at', function ($enquiry) {
                return $enquiry->created_at->format('d M Y, h:i A');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        return response()->json([
            'success' => true,
            'data' => $contactEnquiry
        ]);
    }
}
