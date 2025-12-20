@extends('admin-v1.layouts.header')
@section('title', 'Add Top Scorer')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Top Scorer Create Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Add New Top Scorer
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.top-scorer.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Top Scorers
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="createScorerForm" method="POST" action="{{ route('admin.top-scorer.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Student Details</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Student Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                   value="{{ old('name') }}" 
                                                   placeholder="Enter student name" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Student Image</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class">Class <span class="text-danger">*</span></label>
                                            <select class="form-control" id="class" name="class" required>
                                                <option value="">Select Class</option>
                                                <option value="1st" {{ old('class') == '1st' ? 'selected' : '' }}>1st</option>
                                                <option value="2nd" {{ old('class') == '2nd' ? 'selected' : '' }}>2nd</option>
                                                <option value="3rd" {{ old('class') == '3rd' ? 'selected' : '' }}>3rd</option>
                                                <option value="4th" {{ old('class') == '4th' ? 'selected' : '' }}>4th</option>
                                                <option value="5th" {{ old('class') == '5th' ? 'selected' : '' }}>5th</option>
                                                <option value="6th" {{ old('class') == '6th' ? 'selected' : '' }}>6th</option>
                                                <option value="7th" {{ old('class') == '7th' ? 'selected' : '' }}>7th</option>
                                                <option value="8th" {{ old('class') == '8th' ? 'selected' : '' }}>8th</option>
                                                <option value="9th" {{ old('class') == '9th' ? 'selected' : '' }}>9th</option>
                                                <option value="10th" {{ old('class') == '10th' ? 'selected' : '' }}>10th</option>
                                                <option value="11th" {{ old('class') == '11th' ? 'selected' : '' }}>11th</option>
                                                <option value="12th" {{ old('class') == '12th' ? 'selected' : '' }}>12th</option>
                                            </select>
                                            @error('class')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="section">Section <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="section" name="section" 
                                                   value="{{ old('section') }}" 
                                                   placeholder="Enter section (e.g., A, B)" required>
                                            @error('section')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="subject">Subject <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject" name="subject" 
                                                   value="{{ old('subject') }}" 
                                                   placeholder="Enter subject name" required>
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="percentage">Percentage</label>
                                            <input type="number" class="form-control" id="percentage" name="percentage" 
                                                   value="{{ old('percentage') }}" 
                                                   placeholder="Enter percentage (0-100)" min="0" max="100" step="0.01">
                                            @error('percentage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="academic_year">Academic Year</label>
                                            <input type="text" class="form-control" id="academic_year" name="academic_year" 
                                                   value="{{ old('academic_year') }}" 
                                                   placeholder="e.g., 2023-2024">
                                            @error('academic_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Add Top Scorer
                                            </button>
                                            <a href="{{ route('admin.top-scorer.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Scorer Info -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-2"></i>
                                Guidelines
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <h5><i class="fas fa-lightbulb text-warning"></i> Tips</h5>
                                    <ul class="pl-3">
                                        <li>Enter complete student name</li>
                                        <li>Specify correct class</li>
                                        <li>Mention section clearly</li>
                                        <li>Add subject name</li>
                                        <li>Verify details before saving</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="info-box bg-info">
                                <span class="info-box-icon">
                                    <i class="fas fa-trophy"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Achievement</span>
                                    <span class="info-box-number">Top Scorer Recognition</span>
                                </div>
                            </div>

                            <div class="info-box bg-success">
                                <span class="info-box-icon">
                                    <i class="fas fa-star"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Excellence</span>
                                    <span class="info-box-number">Academic Performance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main Content  -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // Form submission with validation
            $('#createScorerForm').on('submit', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                var actionUrl = $(this).attr('action');
                
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Top scorer added successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.top-scorer.index') }}";
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to add top scorer', 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to add top scorer.';
                        
                        if (errors) {
                            errorMessage = Object.values(errors).flat().join('<br>');
                        }
                        
                        Swal.fire('Error', errorMessage, 'error');
                    }
                });
            });
        });
    </script>
@endpush

@push('style')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    }
    
    .info-box {
        margin-bottom: 15px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #495057;
    }
    
    .text-danger {
        font-size: 0.875em;
    }
</style>
@endpush
