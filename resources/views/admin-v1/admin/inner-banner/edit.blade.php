@extends('admin-v1.layouts.header')
@section('title', 'Edit Inner Banner')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Inner Banner Edit Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Inner Banner
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.inner-banner.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Inner Banners
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="editInner BannerForm" method="POST" action="{{ route('admin.inner-banner.update', $innerBanner->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Inner Banner Details</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Inner Banner Image</label>
                                            <div class="mb-3">
                                                @if($innerBanner->image)
                                                <img src="{{ asset('storage/' . $innerBanner->image) }}" alt="Current Inner Banner" class="img-thumbnail" style="max-width: 300px;">
                                                @else
                                                <span class="text-muted">No image uploaded</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Replace Inner Banner Image (Optional)</label>
                                            <input type="file" class="form-control" id="image" name="image" 
                                                   accept="image/*">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">Leave empty to keep current image. Accepted formats: JPEG, PNG, JPG, GIF, WEBP. Max size: 2MB</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title (Optional)</label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="{{ old('title', $innerBanner->title) }}" 
                                                   placeholder="Enter inner-banner title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active" {{ old('status', $innerBanner->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $innerBanner->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                                <i class="fas fa-save"></i> Update Inner Banner
                                            </button>
                                            <a href="{{ route('admin.inner-banner.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Inner Banner Statistics -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Inner Banner Statistics
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Inner Banner ID</span>
                                    <span class="info-box-number">{{ $innerBanner->id }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Created</span>
                                    <span class="info-box-number">{{ $innerBanner->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon {{ $innerBanner->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    <i class="fas {{ $innerBanner->status == 'active' ? 'fa-check' : 'fa-times' }}"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Status</span>
                                    <span class="info-box-number">{{ ucfirst($innerBanner->status) }}</span>
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
            $('#editInner BannerForm').on('submit', function(e) {
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
                                text: 'Inner Banner updated successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.inner-banner.index') }}";
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to update inner-banner', 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to update inner-banner.';
                        
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
