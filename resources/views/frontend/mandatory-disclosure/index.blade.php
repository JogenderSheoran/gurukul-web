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
            
            <!-- SECTION 1: GENERAL INFORMATION -->
            <div class="disclosureSection mb-5">
                <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-info-circle"></i> General Information</h3>
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
                                        <label>School Email:</label>
                                        <p>{{ $generalInfo->school_email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Contact Details:</label>
                                        <p>{{ $generalInfo->contact_details ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="infoItem">
                                        <label>Complete Address:</label>
                                        <p>{{ $generalInfo->complete_address ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No general information available.</p>
                        @endif
                    </div>
                </div>

                <!-- SECTION 2: DOCUMENTS -->
                <div class="disclosureSection mb-5">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-file-alt"></i> Documents</h3>
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

                <!-- SECTION 3: RESULTS & ACADEMICS -->
                <div class="disclosureSection mb-5">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-graduation-cap"></i> Results & Academics</h3>
                        
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
                                                <td>{{ $result->no_of_registered_students }}</td>
                                                <td>{{ $result->no_of_students_passed }}</td>
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
                                                <td>{{ $result->no_of_registered_students }}</td>
                                                <td>{{ $result->no_of_students_passed }}</td>
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

                <!-- SECTION 4: STAFF INFORMATION -->
                <div class="disclosureSection mb-5">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-users"></i> Staff Information</h3>
                        @if($staffInfo)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Principal Name:</label>
                                        <p>{{ $staffInfo->principal_name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Total Teachers:</label>
                                        <p>{{ $staffInfo->total_teachers ?? 'N/A' }}</p>
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
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Teacher-Student Ratio:</label>
                                        <p>{{ $staffInfo->teacher_student_ratio ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="infoItem">
                                        <label>Special Educator Details:</label>
                                        <p>{{ $staffInfo->special_educator_details ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="infoItem">
                                        <label>Counsellor and Wellness Teacher Details:</label>
                                        <p>{{ $staffInfo->counsellor_and_wellness_teacher_details ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No staff information available.</p>
                        @endif
                    </div>
                </div>

                <!-- SECTION 5: INFRASTRUCTURE -->
                <div class="disclosureSection mb-5">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-building"></i> Infrastructure</h3>
                        @if($infrastructure)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Total Campus Area:</label>
                                        <p>{{ $infrastructure->total_campus_area ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Number of Classrooms:</label>
                                        <p>{{ $infrastructure->no_of_classrooms ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Size of Classrooms:</label>
                                        <p>{{ $infrastructure->size_of_classrooms ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Number of Laboratories:</label>
                                        <p>{{ $infrastructure->no_of_laboratories ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Size of Laboratories:</label>
                                        <p>{{ $infrastructure->size_of_laboratories ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Internet Facility:</label>
                                        <p>{{ $infrastructure->internet_facility ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Number of Girls Toilets:</label>
                                        <p>{{ $infrastructure->no_of_girls_toilets ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="infoItem">
                                        <label>Number of Boys Toilets:</label>
                                        <p>{{ $infrastructure->no_of_boys_toilets ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="infoItem">
                                        <label>School Inspection Video Link:</label>
                                        <p>
                                            @if($infrastructure->school_inspection_video_link)
                                                <a href="{{ $infrastructure->school_inspection_video_link }}" target="_blank" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-video"></i> Watch Video
                                                </a>
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No infrastructure information available.</p>
                        @endif
                    </div>
                </div>

                <!-- SECTION 6: TEACHER DETAILS -->
                <!-- <div class="disclosureSection mb-5">
                    <div class="disclosureCard">
                        <h3 class="sectionTitle"><i class="fas fa-chalkboard-teacher"></i> Teacher Details</h3>
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
                </div> -->

        </div>
    </section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')

<style>
.mandatoryDisclosure {
    background: #f8f9fa;
}

.disclosureSection {
    margin-bottom: 2rem;
}

.disclosureCard {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.sectionTitle {
    color: #ff8a00;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #ff8a00;
    display: flex;
    align-items: center;
}

.sectionTitle i {
    margin-right: 12px;
    font-size: 1.2em;
}

.infoItem {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #ff8a00;
    transition: all 0.3s ease;
}

.infoItem:hover {
    box-shadow: 0 4px 12px rgba(255, 138, 0, 0.15);
    transform: translateX(5px);
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
    word-wrap: break-word;
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

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background: #fff3e6;
    transform: scale(1.01);
}

.btn-primary {
    background: #ff8a00;
    border-color: #ff8a00;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #e67a00;
    border-color: #e67a00;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(255, 138, 0, 0.3);
}

@media (max-width: 768px) {
    .disclosureCard {
        padding: 20px;
    }
    
    .sectionTitle {
        font-size: 1.3rem;
    }
}
</style>

</body>
</html>
