@extends('admin-v1.layouts.header')
@section('title', 'Edit Gallery Image')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Gallery Image
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Gallery
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="editGalleryForm" method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data" accept-charset="UTF-8">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Gallery Image</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">Leave empty to keep current image. Max size: 5MB</small>
                                        </div>
                                        <div class="mt-2">
                                            <label>Current Image:</label><br>
                                            <img src="{{ asset('storage/' . $gallery->image) }}" class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                        <div id="imagePreview" class="mt-2"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title (Optional)</label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="{{ old('title', $gallery->title) }}" 
                                                   placeholder="Enter image title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order">Display Order</label>
                                            <input type="number" class="form-control" id="order" name="order" 
                                                   value="{{ old('order', $gallery->order) }}" 
                                                   placeholder="0">
                                            @error('order')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description (Optional)</label>
                                            <textarea class="form-control" id="description" name="description" 
                                                      rows="3" placeholder="Enter image description">{{ old('description', $gallery->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active" {{ old('status', $gallery->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $gallery->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                                <i class="fas fa-save"></i> Update Image
                                            </button>
                                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-2"></i>
                                Image Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Created:</strong> {{ $gallery->created_at->format('M d, Y h:i A') }}</p>
                            <p><strong>Last Updated:</strong> {{ $gallery->updated_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        $('#imagePreview').html('<label>New Image Preview:</label><br><img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 300px;">');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Form submission
            $('#editGalleryForm').on('submit', function(e) {
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
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.gallery.index') }}";
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to update image.';
                        
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
    
    .form-group label {
        font-weight: 600;
        color: #495057;
    }
</style>
@endpush
