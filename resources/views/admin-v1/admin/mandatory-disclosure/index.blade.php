@extends('admin-v1.layouts.header')
@section('title', 'Mandatory Public Disclosure')
@section('content')
<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.mandatory-disclosure.store') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="disclosureForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <ul class="nav nav-tabs" id="disclosure-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-general" data-toggle="pill" href="#general-info" role="tab">
                                            <i class="fas fa-info-circle"></i> General Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-documents" data-toggle="pill" href="#documents" role="tab">
                                            <i class="fas fa-file-alt"></i> Documents
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-results" data-toggle="pill" href="#results-academics" role="tab">
                                            <i class="fas fa-graduation-cap"></i> Results & Academics
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-staff" data-toggle="pill" href="#staff-info" role="tab">
                                            <i class="fas fa-users"></i> Staff Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-infrastructure" data-toggle="pill" href="#infrastructure" role="tab">
                                            <i class="fas fa-building"></i> Infrastructure
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-teachers" data-toggle="pill" href="#teacher-details" role="tab">
                                            <i class="fas fa-chalkboard-teacher"></i> Teacher Details
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Save All Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            @endif

                            <div class="tab-content" id="disclosure-tabContent">
                                <!-- TAB 1: GENERAL INFORMATION -->
                                <div class="tab-pane fade show active" id="general-info" role="tabpanel">
                                    <h4 class="mb-3">General Information</h4>
                                    <input type="hidden" name="general_info[id]" value="{{ $generalInfo->id ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>School Name</label>
                                                <input type="text" class="form-control" name="general_info[school_name]" value="{{ old('general_info.school_name', $generalInfo->school_name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Affiliation No</label>
                                                <input type="text" class="form-control" name="general_info[affiliation_no]" value="{{ old('general_info.affiliation_no', $generalInfo->affiliation_no ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>School Code</label>
                                                <input type="text" class="form-control" name="general_info[school_code]" value="{{ old('general_info.school_code', $generalInfo->school_code ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Principal Name</label>
                                                <input type="text" class="form-control" name="general_info[principal_name]" value="{{ old('general_info.principal_name', $generalInfo->principal_name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Principal Qualification</label>
                                                <input type="text" class="form-control" name="general_info[principal_qualification]" value="{{ old('general_info.principal_qualification', $generalInfo->principal_qualification ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>School Email</label>
                                                <input type="email" class="form-control" name="general_info[school_email]" value="{{ old('general_info.school_email', $generalInfo->school_email ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Details</label>
                                                <input type="text" class="form-control" name="general_info[contact_details]" value="{{ old('general_info.contact_details', $generalInfo->contact_details ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Complete Address</label>
                                                <textarea class="form-control" name="general_info[complete_address]" rows="3">{{ old('general_info.complete_address', $generalInfo->complete_address ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: DOCUMENTS -->
                                <div class="tab-pane fade" id="documents" role="tabpanel">
                                    <h4 class="mb-3">Documents</h4>
                                    <input type="hidden" name="documents_to_delete" id="documents_to_delete">
                                    <div id="documents-container">
                                        @forelse($documents as $index => $doc)
                                            <div class="document-row card mb-3" data-index="{{ $index }}">
                                                <div class="card-body">
                                                    <input type="hidden" name="documents[{{ $index }}][id]" value="{{ $doc->id }}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Title</label>
                                                                <textarea class="form-control" name="documents[{{ $index }}][document_title]" rows="2">{{ $doc->document_title }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Document Link (URL)</label>
                                                                <input type="url" class="form-control" name="documents[{{ $index }}][document_link]" value="{{ $doc->document_link }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document File</label>
                                                                <input type="file" class="form-control" name="documents[{{ $index }}][document_file]" accept=".pdf,.doc,.docx,image/*">
                                                                @if($doc->document_file)
                                                                    <small class="text-success">Current: <a href="{{ asset('storage/' . $doc->document_file) }}" target="_blank">View File</a></small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-document" data-id="{{ $doc->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="document-row card mb-3" data-index="0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Title</label>
                                                                <textarea class="form-control" name="documents[0][document_title]" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Document Link (URL)</label>
                                                                <input type="url" class="form-control" name="documents[0][document_link]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document File</label>
                                                                <input type="file" class="form-control" name="documents[0][document_file]" accept=".pdf,.doc,.docx,image/*">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-document">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-document">
                                        <i class="fas fa-plus"></i> Add Document
                                    </button>
                                </div>

                                <!-- TAB 3: RESULTS & ACADEMICS -->
                                <div class="tab-pane fade" id="results-academics" role="tabpanel">
                                    <h4 class="mb-3">Results & Academics</h4>
                                    
                                    <!-- Section A: Academic Documents -->
                                    <h5 class="mb-3">Academic Documents</h5>
                                    <input type="hidden" name="academic_documents_to_delete" id="academic_documents_to_delete">
                                    <div id="academic-documents-container">
                                        @forelse($academicDocuments as $index => $doc)
                                            <div class="academic-document-row card mb-3" data-index="{{ $index }}">
                                                <div class="card-body">
                                                    <input type="hidden" name="academic_documents[{{ $index }}][id]" value="{{ $doc->id }}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Title</label>
                                                                <textarea class="form-control" name="academic_documents[{{ $index }}][document_title]" rows="2">{{ $doc->document_title }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Document Link (URL)</label>
                                                                <input type="url" class="form-control" name="academic_documents[{{ $index }}][document_link]" value="{{ $doc->document_link }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document File</label>
                                                                <input type="file" class="form-control" name="academic_documents[{{ $index }}][document_file]" accept=".pdf,.doc,.docx,image/*">
                                                                @if($doc->document_file)
                                                                    <small class="text-success">Current: <a href="{{ asset('storage/' . $doc->document_file) }}" target="_blank">View File</a></small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-academic-document" data-id="{{ $doc->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="academic-document-row card mb-3" data-index="0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document Title</label>
                                                                <textarea class="form-control" name="academic_documents[0][document_title]" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Document Link (URL)</label>
                                                                <input type="url" class="form-control" name="academic_documents[0][document_link]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Document File</label>
                                                                <input type="file" class="form-control" name="academic_documents[0][document_file]" accept=".pdf,.doc,.docx,image/*">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-academic-document">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary mb-4" id="add-academic-document">
                                        <i class="fas fa-plus"></i> Add Academic Document
                                    </button>

                                    <!-- Section B: Results Class X -->
                                    <h5 class="mb-3 mt-4">Results - Class X</h5>
                                    <input type="hidden" name="results_x_to_delete" id="results_x_to_delete">
                                    <div id="results-x-container">
                                        @forelse($resultsClassX as $index => $result)
                                            <div class="result-x-row card mb-3" data-index="{{ $index }}">
                                                <div class="card-body">
                                                    <input type="hidden" name="results_class_x[{{ $index }}][id]" value="{{ $result->id }}">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" class="form-control" name="results_class_x[{{ $index }}][year]" value="{{ $result->year }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Registered Students</label>
                                                                <input type="number" class="form-control" name="results_class_x[{{ $index }}][no_of_registered_students]" value="{{ $result->no_of_registered_students }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Students Passed</label>
                                                                <input type="number" class="form-control" name="results_class_x[{{ $index }}][no_of_students_passed]" value="{{ $result->no_of_students_passed }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Pass %</label>
                                                                <input type="number" step="0.01" class="form-control" name="results_class_x[{{ $index }}][pass_percentage]" value="{{ $result->pass_percentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Remarks</label>
                                                                <input type="text" class="form-control" name="results_class_x[{{ $index }}][remarks]" value="{{ $result->remarks }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-result-x" data-id="{{ $result->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="result-x-row card mb-3" data-index="0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" class="form-control" name="results_class_x[0][year]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Registered Students</label>
                                                                <input type="number" class="form-control" name="results_class_x[0][no_of_registered_students]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Students Passed</label>
                                                                <input type="number" class="form-control" name="results_class_x[0][no_of_students_passed]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Pass %</label>
                                                                <input type="number" step="0.01" class="form-control" name="results_class_x[0][pass_percentage]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Remarks</label>
                                                                <input type="text" class="form-control" name="results_class_x[0][remarks]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-result-x">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary mb-4" id="add-result-x">
                                        <i class="fas fa-plus"></i> Add Class X Result
                                    </button>

                                    <!-- Section C: Results Class XII -->
                                    <h5 class="mb-3 mt-4">Results - Class XII</h5>
                                    <input type="hidden" name="results_xii_to_delete" id="results_xii_to_delete">
                                    <div id="results-xii-container">
                                        @forelse($resultsClassXII as $index => $result)
                                            <div class="result-xii-row card mb-3" data-index="{{ $index }}">
                                                <div class="card-body">
                                                    <input type="hidden" name="results_class_xii[{{ $index }}][id]" value="{{ $result->id }}">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" class="form-control" name="results_class_xii[{{ $index }}][year]" value="{{ $result->year }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Registered Students</label>
                                                                <input type="number" class="form-control" name="results_class_xii[{{ $index }}][no_of_registered_students]" value="{{ $result->no_of_registered_students }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Students Passed</label>
                                                                <input type="number" class="form-control" name="results_class_xii[{{ $index }}][no_of_students_passed]" value="{{ $result->no_of_students_passed }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Pass %</label>
                                                                <input type="number" step="0.01" class="form-control" name="results_class_xii[{{ $index }}][pass_percentage]" value="{{ $result->pass_percentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Remarks</label>
                                                                <input type="text" class="form-control" name="results_class_xii[{{ $index }}][remarks]" value="{{ $result->remarks }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-result-xii" data-id="{{ $result->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="result-xii-row card mb-3" data-index="0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" class="form-control" name="results_class_xii[0][year]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Registered Students</label>
                                                                <input type="number" class="form-control" name="results_class_xii[0][no_of_registered_students]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Students Passed</label>
                                                                <input type="number" class="form-control" name="results_class_xii[0][no_of_students_passed]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Pass %</label>
                                                                <input type="number" step="0.01" class="form-control" name="results_class_xii[0][pass_percentage]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Remarks</label>
                                                                <input type="text" class="form-control" name="results_class_xii[0][remarks]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-result-xii">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-result-xii">
                                        <i class="fas fa-plus"></i> Add Class XII Result
                                    </button>
                                </div>

                                <!-- TAB 4: STAFF INFORMATION -->
                                <div class="tab-pane fade" id="staff-info" role="tabpanel">
                                    <h4 class="mb-3">Staff Information (Teaching)</h4>
                                    <input type="hidden" name="staff_info[id]" value="{{ $staffInfo->id ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Principal Name</label>
                                                <input type="text" class="form-control" name="staff_info[principal_name]" value="{{ old('staff_info.principal_name', $staffInfo->principal_name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Teachers</label>
                                                <input type="number" class="form-control" name="staff_info[total_teachers]" value="{{ old('staff_info.total_teachers', $staffInfo->total_teachers ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PGT Teachers</label>
                                                <input type="number" class="form-control" name="staff_info[pgt_teachers]" value="{{ old('staff_info.pgt_teachers', $staffInfo->pgt_teachers ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>TGT Teachers</label>
                                                <input type="number" class="form-control" name="staff_info[tgt_teachers]" value="{{ old('staff_info.tgt_teachers', $staffInfo->tgt_teachers ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PRT Teachers</label>
                                                <input type="number" class="form-control" name="staff_info[prt_teachers]" value="{{ old('staff_info.prt_teachers', $staffInfo->prt_teachers ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Teacher Student Ratio</label>
                                                <input type="text" class="form-control" name="staff_info[teacher_student_ratio]" value="{{ old('staff_info.teacher_student_ratio', $staffInfo->teacher_student_ratio ?? '') }}" placeholder="e.g., 1:30">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Special Educator Details</label>
                                                <textarea class="form-control" name="staff_info[special_educator_details]" rows="3">{{ old('staff_info.special_educator_details', $staffInfo->special_educator_details ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Counsellor and Wellness Teacher Details</label>
                                                <textarea class="form-control" name="staff_info[counsellor_and_wellness_teacher_details]" rows="3">{{ old('staff_info.counsellor_and_wellness_teacher_details', $staffInfo->counsellor_and_wellness_teacher_details ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 5: INFRASTRUCTURE -->
                                <div class="tab-pane fade" id="infrastructure" role="tabpanel">
                                    <h4 class="mb-3">Infrastructure</h4>
                                    <input type="hidden" name="infrastructure[id]" value="{{ $infrastructure->id ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Campus Area</label>
                                                <input type="text" class="form-control" name="infrastructure[total_campus_area]" value="{{ old('infrastructure.total_campus_area', $infrastructure->total_campus_area ?? '') }}" placeholder="e.g., 5 acres">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number of Classrooms</label>
                                                <input type="number" class="form-control" name="infrastructure[no_of_classrooms]" value="{{ old('infrastructure.no_of_classrooms', $infrastructure->no_of_classrooms ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size of Classrooms</label>
                                                <input type="text" class="form-control" name="infrastructure[size_of_classrooms]" value="{{ old('infrastructure.size_of_classrooms', $infrastructure->size_of_classrooms ?? '') }}" placeholder="e.g., 30x40 sq ft">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number of Laboratories</label>
                                                <input type="number" class="form-control" name="infrastructure[no_of_laboratories]" value="{{ old('infrastructure.no_of_laboratories', $infrastructure->no_of_laboratories ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size of Laboratories</label>
                                                <input type="text" class="form-control" name="infrastructure[size_of_laboratories]" value="{{ old('infrastructure.size_of_laboratories', $infrastructure->size_of_laboratories ?? '') }}" placeholder="e.g., 40x50 sq ft">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Internet Facility</label>
                                                <select class="form-control" name="infrastructure[internet_facility]">
                                                    <option value="YES" {{ old('infrastructure.internet_facility', $infrastructure->internet_facility ?? 'NO') == 'YES' ? 'selected' : '' }}>YES</option>
                                                    <option value="NO" {{ old('infrastructure.internet_facility', $infrastructure->internet_facility ?? 'NO') == 'NO' ? 'selected' : '' }}>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number of Girls Toilets</label>
                                                <input type="number" class="form-control" name="infrastructure[no_of_girls_toilets]" value="{{ old('infrastructure.no_of_girls_toilets', $infrastructure->no_of_girls_toilets ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number of Boys Toilets</label>
                                                <input type="number" class="form-control" name="infrastructure[no_of_boys_toilets]" value="{{ old('infrastructure.no_of_boys_toilets', $infrastructure->no_of_boys_toilets ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>School Inspection Video Link (YouTube URL)</label>
                                                <input type="url" class="form-control" name="infrastructure[school_inspection_video_link]" value="{{ old('infrastructure.school_inspection_video_link', $infrastructure->school_inspection_video_link ?? '') }}" placeholder="https://www.youtube.com/watch?v=...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 6: TEACHER DETAILS -->
                                <div class="tab-pane fade" id="teacher-details" role="tabpanel">
                                    <h4 class="mb-3">Teacher Details</h4>
                                    <input type="hidden" name="teachers_to_delete" id="teachers_to_delete">
                                    <div id="teachers-container">
                                        @forelse($teachers as $index => $teacher)
                                            <div class="teacher-row card mb-3" data-index="{{ $index }}">
                                                <div class="card-body">
                                                    <input type="hidden" name="teachers[{{ $index }}][id]" value="{{ $teacher->id }}">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Teacher Name</label>
                                                                <input type="text" class="form-control" name="teachers[{{ $index }}][teacher_name]" value="{{ $teacher->teacher_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Qualification</label>
                                                                <input type="text" class="form-control" name="teachers[{{ $index }}][qualification]" value="{{ $teacher->qualification }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" class="form-control" name="teachers[{{ $index }}][designation]" value="{{ $teacher->designation }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Subject</label>
                                                                <input type="text" class="form-control" name="teachers[{{ $index }}][subject]" value="{{ $teacher->subject }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input type="text" class="form-control" name="teachers[{{ $index }}][experience]" value="{{ $teacher->experience }}" placeholder="e.g., 5 years">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-teacher" data-id="{{ $teacher->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="teacher-row card mb-3" data-index="0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Teacher Name</label>
                                                                <input type="text" class="form-control" name="teachers[0][teacher_name]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Qualification</label>
                                                                <input type="text" class="form-control" name="teachers[0][qualification]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" class="form-control" name="teachers[0][designation]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Subject</label>
                                                                <input type="text" class="form-control" name="teachers[0][subject]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input type="text" class="form-control" name="teachers[0][experience]" placeholder="e.g., 5 years">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-danger btn-block remove-teacher">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-teacher">
                                        <i class="fas fa-plus"></i> Add Teacher
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let documentIndex = {{ count($documents) }};
    let academicDocumentIndex = {{ count($academicDocuments) }};
    let resultXIndex = {{ count($resultsClassX) }};
    let resultXIIIndex = {{ count($resultsClassXII) }};
    let teacherIndex = {{ count($teachers) }};

    // Add Document
    $('#add-document').click(function() {
        const html = `
            <div class="document-row card mb-3" data-index="${documentIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Document Title</label>
                                <textarea class="form-control" name="documents[${documentIndex}][document_title]" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Document Link (URL)</label>
                                <input type="url" class="form-control" name="documents[${documentIndex}][document_link]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Document File</label>
                                <input type="file" class="form-control" name="documents[${documentIndex}][document_file]" accept=".pdf,.doc,.docx,image/*">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block remove-document">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#documents-container').append(html);
        documentIndex++;
    });

    // Remove Document
    $(document).on('click', '.remove-document', function() {
        const id = $(this).data('id');
        if (id) {
            const current = $('#documents_to_delete').val();
            $('#documents_to_delete').val(current ? current + ',' + id : id);
        }
        $(this).closest('.document-row').remove();
    });

    // Add Academic Document
    $('#add-academic-document').click(function() {
        const html = `
            <div class="academic-document-row card mb-3" data-index="${academicDocumentIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Document Title</label>
                                <textarea class="form-control" name="academic_documents[${academicDocumentIndex}][document_title]" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Document Link (URL)</label>
                                <input type="url" class="form-control" name="academic_documents[${academicDocumentIndex}][document_link]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Document File</label>
                                <input type="file" class="form-control" name="academic_documents[${academicDocumentIndex}][document_file]" accept=".pdf,.doc,.docx,image/*">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block remove-academic-document">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#academic-documents-container').append(html);
        academicDocumentIndex++;
    });

    // Remove Academic Document
    $(document).on('click', '.remove-academic-document', function() {
        const id = $(this).data('id');
        if (id) {
            const current = $('#academic_documents_to_delete').val();
            $('#academic_documents_to_delete').val(current ? current + ',' + id : id);
        }
        $(this).closest('.academic-document-row').remove();
    });

    // Add Result Class X
    $('#add-result-x').click(function() {
        const html = `
            <div class="result-x-row card mb-3" data-index="${resultXIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" name="results_class_x[${resultXIndex}][year]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Registered Students</label>
                                <input type="number" class="form-control" name="results_class_x[${resultXIndex}][no_of_registered_students]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Students Passed</label>
                                <input type="number" class="form-control" name="results_class_x[${resultXIndex}][no_of_students_passed]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Pass %</label>
                                <input type="number" step="0.01" class="form-control" name="results_class_x[${resultXIndex}][pass_percentage]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <input type="text" class="form-control" name="results_class_x[${resultXIndex}][remarks]">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block remove-result-x">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#results-x-container').append(html);
        resultXIndex++;
    });

    // Remove Result Class X
    $(document).on('click', '.remove-result-x', function() {
        const id = $(this).data('id');
        if (id) {
            const current = $('#results_x_to_delete').val();
            $('#results_x_to_delete').val(current ? current + ',' + id : id);
        }
        $(this).closest('.result-x-row').remove();
    });

    // Add Result Class XII
    $('#add-result-xii').click(function() {
        const html = `
            <div class="result-xii-row card mb-3" data-index="${resultXIIIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" name="results_class_xii[${resultXIIIndex}][year]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Registered Students</label>
                                <input type="number" class="form-control" name="results_class_xii[${resultXIIIndex}][no_of_registered_students]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Students Passed</label>
                                <input type="number" class="form-control" name="results_class_xii[${resultXIIIndex}][no_of_students_passed]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Pass %</label>
                                <input type="number" step="0.01" class="form-control" name="results_class_xii[${resultXIIIndex}][pass_percentage]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <input type="text" class="form-control" name="results_class_xii[${resultXIIIndex}][remarks]">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block remove-result-xii">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#results-xii-container').append(html);
        resultXIIIndex++;
    });

    // Remove Result Class XII
    $(document).on('click', '.remove-result-xii', function() {
        const id = $(this).data('id');
        if (id) {
            const current = $('#results_xii_to_delete').val();
            $('#results_xii_to_delete').val(current ? current + ',' + id : id);
        }
        $(this).closest('.result-xii-row').remove();
    });

    // Add Teacher
    $('#add-teacher').click(function() {
        const html = `
            <div class="teacher-row card mb-3" data-index="${teacherIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input type="text" class="form-control" name="teachers[${teacherIndex}][teacher_name]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" class="form-control" name="teachers[${teacherIndex}][qualification]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="teachers[${teacherIndex}][designation]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="teachers[${teacherIndex}][subject]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="teachers[${teacherIndex}][experience]" placeholder="e.g., 5 years">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block remove-teacher">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#teachers-container').append(html);
        teacherIndex++;
    });

    // Remove Teacher
    $(document).on('click', '.remove-teacher', function() {
        const id = $(this).data('id');
        if (id) {
            const current = $('#teachers_to_delete').val();
            $('#teachers_to_delete').val(current ? current + ',' + id : id);
        }
        $(this).closest('.teacher-row').remove();
    });
});
</script>
@endpush
