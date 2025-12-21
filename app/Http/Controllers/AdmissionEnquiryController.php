<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionEnquiry;

class AdmissionEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer|min:1|max:100',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string|max:255',
            'last_class_study' => 'required|string|max:255',
            'last_school_board' => 'required|string|max:255',
            'admission_for_class' => 'required|string|max:255',
            'father_full_name' => 'required|string|max:255',
            'mother_full_name' => 'required|string|max:255',
            'father_mobile_number' => 'required|string|max:15',
            'mother_mobile_number' => 'required|string|max:15',
            'email_address' => 'required|email|max:255',
        ]);

        AdmissionEnquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Admission enquiry submitted successfully! We will contact you soon.'
        ]);
    }
}
