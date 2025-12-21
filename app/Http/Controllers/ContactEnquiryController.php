<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEnquiry;

class ContactEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactEnquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting us! We will get back to you soon.'
        ]);
    }
}
