<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')
    
    <x-seo
        title="{{ $seo['title'] }}"
        description="{{ $seo['description'] }}"
        keywords="{{ $seo['keywords'] }}"
        image="{{ $seo['image'] }}"
    />
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- Banner -->
    <x-inner-banner 
        title="Mandatory Public Disclosure" 
        subtitle="As per CBSE Guidelines"
        pageKey="mandatory-disclosure"
    />

    <!-- Mandatory Disclosure Content -->
    <section class="mandatoryDisclosure py-5">
        <div class="container">
            
            <!-- Tabs Navigation -->
            <div class="disclosureTabs mb-4">
                <ul class="nav nav-pills justify-content-center" id="disclosureTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab">
                            <i class="fas fa-info-circle"></i> General Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="documents-tab" data-toggle="pill" href="#documents" role="tab">
                            <i class="fas fa-file-alt"></i> Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="results-tab" data-toggle="pill" href="#results" role="tab">
                            <i class="fas fa-graduation-cap"></i> Results & Academics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="staff-tab" data-toggle="pill" href="#staff" role="tab">
                            <i class="fas fa-users"></i> Staff Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="infrastructure-tab" data-toggle="pill" href="#infrastructure" role="tab">
                            <i class="fas fa-building"></i> Infrastructure
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="teachers-tab" data-toggle="pill" href="#teachers" role="tab">
                            <i class="fas fa-chalkboard-teacher"></i> Teacher Details
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content" id="disclosureTabContent">
                
                <!-- TAB 1: GENERAL INFORMATION -->
                <div class="tab-pane fade show active" id="general" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">General Information</h3>
                        @if($generalInfo)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>School Name:</label>
                                        <p>{{ $generalInfo->school_name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Affiliation No:</label>
                                        <p>{{ $generalInfo->affiliation_no ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>School Code:</label>
                                        <p>{{ $generalInfo->school_code ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Principal Name:</label>
                                        <p>{{ $generalInfo->principal_name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Principal Qualification:</label>
                                        <p>{{ $generalInfo->principal_qualification ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Principal Experience:</label>
                                        <p>{{ $generalInfo->principal_experience ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Email:</label>
                                        <p>{{ $generalInfo->email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Contact Number:</label>
                                        <p>{{ $generalInfo->contact_number ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="infoItem">
                                        <label>Address:</label>
                                        <p>{{ $generalInfo->address ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Year of Establishment:</label>
                                        <p>{{ $generalInfo->year_of_establishment ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Total Campus Area:</label>
                                        <p>{{ $generalInfo->total_campus_area ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No general information available.</p>
                        @endif
                    </div>
                </div>

                <!-- TAB 2: DOCUMENTS -->
                <div class="tab-pane fade" id="documents" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">Documents</h3>
                        @if($documents->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Document Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $index => $doc)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $doc->document_title }}</td>
                                                <td>
                                                    @if($doc->document_file)
                                                        <a href="{{ asset('storage/' . $doc->document_file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
                                                    @endif
                                                    @if($doc->document_link)
                                                        <a href="{{ $doc->document_link }}" target="_blank" class="btn btn-sm btn-info">
                                                            <i class="fas fa-external-link-alt"></i> View Link
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No documents available.</p>
                        @endif
                    </div>
                </div>

                <!-- TAB 3: RESULTS & ACADEMICS -->
                <div class="tab-pane fade" id="results" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">Results & Academics</h3>
                        
                        <!-- Academic Documents -->
                        @if($academicDocuments->count() > 0)
                            <h5 class="mb-3">Academic Documents</h5>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Document Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($academicDocuments as $index => $doc)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $doc->document_title }}</td>
                                                <td>
                                                    @if($doc->document_file)
                                                        <a href="{{ asset('storage/' . $doc->document_file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
                                                    @endif
                                                    @if($doc->document_link)
                                                        <a href="{{ $doc->document_link }}" target="_blank" class="btn btn-sm btn-info">
                                                            <i class="fas fa-external-link-alt"></i> View Link
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <!-- Class X Results -->
                        @if($resultsClassX->count() > 0)
                            <h5 class="mb-3">Class X Results</h5>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Total Students</th>
                                            <th>Students Passed</th>
                                            <th>Pass Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($resultsClassX as $result)
                                            <tr>
                                                <td>{{ $result->year }}</td>
                                                <td>{{ $result->total_students }}</td>
                                                <td>{{ $result->students_passed }}</td>
                                                <td>{{ $result->pass_percentage }}%</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <!-- Class XII Results -->
                        @if($resultsClassXII->count() > 0)
                            <h5 class="mb-3">Class XII Results</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Total Students</th>
                                            <th>Students Passed</th>
                                            <th>Pass Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($resultsClassXII as $result)
                                            <tr>
                                                <td>{{ $result->year }}</td>
                                                <td>{{ $result->total_students }}</td>
                                                <td>{{ $result->students_passed }}</td>
                                                <td>{{ $result->pass_percentage }}%</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if($academicDocuments->count() == 0 && $resultsClassX->count() == 0 && $resultsClassXII->count() == 0)
                            <p class="text-muted">No results or academic documents available.</p>
                        @endif
                    </div>
                </div>

                <!-- TAB 4: STAFF INFORMATION -->
                <div class="tab-pane fade" id="staff" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">Staff Information</h3>
                        @if($staffInfo)
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>Principal:</label>
                                        <p>{{ $staffInfo->principal ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>Vice Principal:</label>
                                        <p>{{ $staffInfo->vice_principal ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>PGT Teachers:</label>
                                        <p>{{ $staffInfo->pgt_teachers ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>TGT Teachers:</label>
                                        <p>{{ $staffInfo->tgt_teachers ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>PRT Teachers:</label>
                                        <p>{{ $staffInfo->prt_teachers ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>PET Teachers:</label>
                                        <p>{{ $staffInfo->pet_teachers ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>Non-Teaching Staff:</label>
                                        <p>{{ $staffInfo->non_teaching_staff ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="infoItem">
                                        <label>Total Staff:</label>
                                        <p>{{ $staffInfo->total_staff ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No staff information available.</p>
                        @endif
                    </div>
                </div>

                <!-- TAB 5: INFRASTRUCTURE -->
                <div class="tab-pane fade" id="infrastructure" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">Infrastructure</h3>
                        @if($infrastructure)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Total Classrooms:</label>
                                        <p>{{ $infrastructure->total_classrooms ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Laboratories:</label>
                                        <p>{{ $infrastructure->laboratories ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Library:</label>
                                        <p>{{ $infrastructure->library ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Playground Area:</label>
                                        <p>{{ $infrastructure->playground_area ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Computer Labs:</label>
                                        <p>{{ $infrastructure->computer_labs ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Smart Classrooms:</label>
                                        <p>{{ $infrastructure->smart_classrooms ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Auditorium:</label>
                                        <p>{{ $infrastructure->auditorium ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Medical Room:</label>
                                        <p>{{ $infrastructure->medical_room ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Hostel Capacity:</label>
                                        <p>{{ $infrastructure->hostel_capacity ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Transport Facility:</label>
                                        <p>{{ $infrastructure->transport_facility ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No infrastructure information available.</p>
                        @endif
                    </div>
                </div>

                <!-- TAB 6: TEACHER DETAILS -->
                <div class="tab-pane fade" id="teachers" role="tabpanel">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle">Teacher Details</h3>
                        @if($teachers->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Teacher Name</th>
                                            <th>Qualification</th>
                                            <th>Designation</th>
                                            <th>Subject</th>
                                            <th>Experience (Years)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teachers as $index => $teacher)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $teacher->teacher_name }}</td>
                                                <td>{{ $teacher->qualification }}</td>
                                                <td>{{ $teacher->designation }}</td>
                                                <td>{{ $teacher->subject }}</td>
                                                <td>{{ $teacher->experience }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No teacher details available.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')

<style>
.mandatoryDisclosure {
    background: #f8f9fa;
}

.disclosureTabs .nav-pills {
    flex-wrap: wrap;
}

.disclosureTabs .nav-link {
    background: #fff;
    color: #333;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px 20px;
    margin: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.disclosureTabs .nav-link:hover {
    background: #ff8a00;
    color: #fff;
    border-color: #ff8a00;
}

.disclosureTabs .nav-link.active {
    background: #ff8a00;
    color: #fff;
    border-color: #ff8a00;
}

.disclosureTabs .nav-link i {
    margin-right: 8px;
}

.disclosureCard {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.sectionTitle {
    color: #ff8a00;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #ff8a00;
}

.infoItem {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #ff8a00;
}

.infoItem label {
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

.infoItem p {
    margin: 0;
    color: #666;
}

.table {
    background: #fff;
}

.table thead {
    background: #ff8a00;
    color: #fff;
}

.table thead th {
    border: none;
    font-weight: 600;
}

.table tbody tr:hover {
    background: #fff3e6;
}

.btn-primary {
    background: #ff8a00;
    border-color: #ff8a00;
}

.btn-primary:hover {
    background: #e67a00;
    border-color: #e67a00;
}

@media (max-width: 768px) {
    .disclosureTabs .nav-link {
        font-size: 14px;
        padding: 10px 15px;
    }
    
    .disclosureCard {
        padding: 20px;
    }
}
</style>

</body>
</html>
