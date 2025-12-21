<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisclosureGeneralInfo;
use App\Models\DisclosureDocument;
use App\Models\DisclosureResult;
use App\Models\DisclosureStaffInfo;
use App\Models\DisclosureInfrastructure;
use App\Models\DisclosureTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MandatoryDisclosureController extends Controller
{
    public function index()
    {
        $title = 'Mandatory Public Disclosure';
        
        // Fetch all data
        $generalInfo = DisclosureGeneralInfo::first();
        $documents = DisclosureDocument::where('section', 'general')->get();
        $academicDocuments = DisclosureDocument::where('section', 'results_academics')->get();
        $resultsClassX = DisclosureResult::where('class_type', 'X')->get();
        $resultsClassXII = DisclosureResult::where('class_type', 'XII')->get();
        $staffInfo = DisclosureStaffInfo::first();
        $infrastructure = DisclosureInfrastructure::first();
        $teachers = DisclosureTeacher::all();
        
        return view('admin-v1.admin.mandatory-disclosure.index', compact(
            'title',
            'generalInfo',
            'documents',
            'academicDocuments',
            'resultsClassX',
            'resultsClassXII',
            'staffInfo',
            'infrastructure',
            'teachers'
        ));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Tab 1: General Information
            if ($request->has('general_info')) {
                $generalData = $request->input('general_info');
                DisclosureGeneralInfo::updateOrCreate(
                    ['id' => $generalData['id'] ?? 1],
                    $generalData
                );
            }

            // Tab 2: Documents
            if ($request->has('documents')) {
                // Delete removed documents
                if ($request->has('documents_to_delete')) {
                    $deleteIds = explode(',', $request->input('documents_to_delete'));
                    foreach ($deleteIds as $id) {
                        if ($id) {
                            $doc = DisclosureDocument::find($id);
                            if ($doc && $doc->document_file) {
                                Storage::disk('public')->delete($doc->document_file);
                            }
                            $doc?->delete();
                        }
                    }
                }

                foreach ($request->input('documents') as $key => $docData) {
                    if (!empty($docData['document_title']) || !empty($docData['document_link'])) {
                        $data = [
                            'section' => 'general',
                            'document_title' => $docData['document_title'] ?? null,
                            'document_link' => $docData['document_link'] ?? null,
                        ];

                        if ($request->hasFile("documents.{$key}.document_file")) {
                            $data['document_file'] = $request->file("documents.{$key}.document_file")
                                ->store('disclosure-documents', 'public');
                        }

                        if (!empty($docData['id'])) {
                            $doc = DisclosureDocument::find($docData['id']);
                            if ($doc) {
                                if (isset($data['document_file']) && $doc->document_file) {
                                    Storage::disk('public')->delete($doc->document_file);
                                }
                                $doc->update($data);
                            }
                        } else {
                            DisclosureDocument::create($data);
                        }
                    }
                }
            }

            // Tab 3: Results & Academics - Documents
            if ($request->has('academic_documents')) {
                // Delete removed academic documents
                if ($request->has('academic_documents_to_delete')) {
                    $deleteIds = explode(',', $request->input('academic_documents_to_delete'));
                    foreach ($deleteIds as $id) {
                        if ($id) {
                            $doc = DisclosureDocument::find($id);
                            if ($doc && $doc->document_file) {
                                Storage::disk('public')->delete($doc->document_file);
                            }
                            $doc?->delete();
                        }
                    }
                }

                foreach ($request->input('academic_documents') as $key => $docData) {
                    if (!empty($docData['document_title']) || !empty($docData['document_link'])) {
                        $data = [
                            'section' => 'results_academics',
                            'document_title' => $docData['document_title'] ?? null,
                            'document_link' => $docData['document_link'] ?? null,
                        ];

                        if ($request->hasFile("academic_documents.{$key}.document_file")) {
                            $data['document_file'] = $request->file("academic_documents.{$key}.document_file")
                                ->store('disclosure-documents', 'public');
                        }

                        if (!empty($docData['id'])) {
                            $doc = DisclosureDocument::find($docData['id']);
                            if ($doc) {
                                if (isset($data['document_file']) && $doc->document_file) {
                                    Storage::disk('public')->delete($doc->document_file);
                                }
                                $doc->update($data);
                            }
                        } else {
                            DisclosureDocument::create($data);
                        }
                    }
                }
            }

            // Tab 3: Results Class X
            if ($request->has('results_class_x')) {
                // Delete removed results
                if ($request->has('results_x_to_delete')) {
                    $deleteIds = explode(',', $request->input('results_x_to_delete'));
                    foreach ($deleteIds as $id) {
                        if ($id) {
                            DisclosureResult::find($id)?->delete();
                        }
                    }
                }

                foreach ($request->input('results_class_x') as $resultData) {
                    if (!empty($resultData['year'])) {
                        $data = array_merge($resultData, ['class_type' => 'X']);
                        
                        if (!empty($resultData['id'])) {
                            DisclosureResult::find($resultData['id'])?->update($data);
                        } else {
                            DisclosureResult::create($data);
                        }
                    }
                }
            }

            // Tab 3: Results Class XII
            if ($request->has('results_class_xii')) {
                // Delete removed results
                if ($request->has('results_xii_to_delete')) {
                    $deleteIds = explode(',', $request->input('results_xii_to_delete'));
                    foreach ($deleteIds as $id) {
                        if ($id) {
                            DisclosureResult::find($id)?->delete();
                        }
                    }
                }

                foreach ($request->input('results_class_xii') as $resultData) {
                    if (!empty($resultData['year'])) {
                        $data = array_merge($resultData, ['class_type' => 'XII']);
                        
                        if (!empty($resultData['id'])) {
                            DisclosureResult::find($resultData['id'])?->update($data);
                        } else {
                            DisclosureResult::create($data);
                        }
                    }
                }
            }

            // Tab 4: Staff Information
            if ($request->has('staff_info')) {
                $staffData = $request->input('staff_info');
                DisclosureStaffInfo::updateOrCreate(
                    ['id' => $staffData['id'] ?? 1],
                    $staffData
                );
            }

            // Tab 5: Infrastructure
            if ($request->has('infrastructure')) {
                $infraData = $request->input('infrastructure');
                DisclosureInfrastructure::updateOrCreate(
                    ['id' => $infraData['id'] ?? 1],
                    $infraData
                );
            }

            // Tab 6: Teacher Details
            if ($request->has('teachers')) {
                // Delete removed teachers
                if ($request->has('teachers_to_delete')) {
                    $deleteIds = explode(',', $request->input('teachers_to_delete'));
                    foreach ($deleteIds as $id) {
                        if ($id) {
                            DisclosureTeacher::find($id)?->delete();
                        }
                    }
                }

                foreach ($request->input('teachers') as $teacherData) {
                    if (!empty($teacherData['teacher_name'])) {
                        if (!empty($teacherData['id'])) {
                            DisclosureTeacher::find($teacherData['id'])?->update($teacherData);
                        } else {
                            DisclosureTeacher::create($teacherData);
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.mandatory-disclosure.index')
                ->with('success', 'Mandatory disclosure data saved successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Error saving data: ' . $e->getMessage())
                ->withInput();
        }
    }
}
