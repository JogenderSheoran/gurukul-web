@extends('admin-v1.layouts.header')
@section('title', 'Edit Top Scorer')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Top Scorer Edit Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Top Scorer - {{ $topScorer->name }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.top-scorer.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Top Scorers
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="editScorerForm" method="POST" action="{{ route('admin.top-scorer.update', $topScorer->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
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
                                                   value="{{ old('name', $topScorer->name) }}" 
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
                                            @if($topScorer->image)
                                                <img src="{{ asset('storage/' . $topScorer->image) }}" alt="Current Image" class="mt-2" style="max-width: 100px; max-height: 100px;">
                                            @endif
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
                                                <option value="1st" {{ old('class', $topScorer->class) == '1st' ? 'selected' : '' }}>1st</option>
                                                <option value="2nd" {{ old('class', $topScorer->class) == '2nd' ? 'selected' : '' }}>2nd</option>
                                                <option value="3rd" {{ old('class', $topScorer->class) == '3rd' ? 'selected' : '' }}>3rd</option>
                                                <option value="4th" {{ old('class', $topScorer->class) == '4th' ? 'selected' : '' }}>4th</option>
                                                <option value="5th" {{ old('class', $topScorer->class) == '5th' ? 'selected' : '' }}>5th</option>
                                                <option value="6th" {{ old('class', $topScorer->class) == '6th' ? 'selected' : '' }}>6th</option>
                                                <option value="7th" {{ old('class', $topScorer->class) == '7th' ? 'selected' : '' }}>7th</option>
                                                <option value="8th" {{ old('class', $topScorer->class) == '8th' ? 'selected' : '' }}>8th</option>
                                                <option value="9th" {{ old('class', $topScorer->class) == '9th' ? 'selected' : '' }}>9th</option>
                                                <option value="10th" {{ old('class', $topScorer->class) == '10th' ? 'selected' : '' }}>10th</option>
                                                <option value="11th" {{ old('class', $topScorer->class) == '11th' ? 'selected' : '' }}>11th</option>
                                                <option value="12th" {{ old('class', $topScorer->class) == '12th' ? 'selected' : '' }}>12th</option>
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
                                                   value="{{ old('section', $topScorer->section) }}" 
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
                                                   value="{{ old('subject', $topScorer->subject) }}" 
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
                                                   value="{{ old('percentage', $topScorer->percentage) }}" 
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
                                                   value="{{ old('academic_year', $topScorer->academic_year) }}" 
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
                                                <i class="fas fa-save"></i> Update Top Scorer
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

                <!-- Scorer Statistics -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Scorer Statistics
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Scorer ID</span>
                                    <span class="info-box-number">{{ $topScorer->id }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Created</span>
                                    <span class="info-box-number">{{ $topScorer->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-warning">
                                    <i class="fas fa-chalkboard"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Class</span>
                                    <span class="info-box-number">{{ $topScorer->class }} - {{ $topScorer->section }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-primary">
                                    <i class="fas fa-book"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Subject</span>
                                    <span class="info-box-number">{{ $topScorer->subject }}</span>
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
            $('#editScorerForm').on('submit', function(e) {
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
                                text: 'Top scorer updated successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.top-scorer.index') }}";
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to update top scorer', 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to update top scorer.';
                        
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
