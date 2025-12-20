@extends('admin-v1.layouts.header')
@section('title', 'Create Banner')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Banner Create Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Create New Banner
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.banner.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Banners
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="createBannerForm" method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Banner Details</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Banner Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image" 
                                                   accept="image/*" required>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">Accepted formats: JPEG, PNG, JPG, GIF, WEBP. Max size: 2MB</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title (Optional)</label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="{{ old('title') }}" 
                                                   placeholder="Enter banner title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Create Banner
                                            </button>
                                            <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Banner Info -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-2"></i>
                                Banner Guidelines
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <h5><i class="fas fa-lightbulb text-warning"></i> Tips</h5>
                                    <ul class="pl-3">
                                        <li>Use high-quality images</li>
                                        <li>Recommended size: 1920x600px</li>
                                        <li>Keep file size under 2MB</li>
                                        <li>Use web-optimized formats</li>
                                        <li>Test on mobile devices</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="info-box bg-info">
                                <span class="info-box-icon">
                                    <i class="fas fa-image"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Image Format</span>
                                    <span class="info-box-number">JPEG, PNG, GIF, WEBP</span>
                                </div>
                            </div>

                            <div class="info-box bg-success">
                                <span class="info-box-icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Active Status</span>
                                    <span class="info-box-number">Visible on frontend</span>
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
            // Image preview
            $('#image').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // You can add image preview here if needed
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Form submission with validation
            $('#createBannerForm').on('submit', function(e) {
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
                                text: 'Banner created successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.banner.index') }}";
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to create banner', 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to create banner.';
                        
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
