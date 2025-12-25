@extends('admin-v1.layouts.header')
@section('title', 'Add Gallery Image')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Upload New Gallery Image
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Gallery
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="createGalleryForm" method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="images">Gallery Images <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="images" name="images[]" 
                                                   accept="image/*" multiple required>
                                            @error('images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">Select multiple images. Accepted formats: JPEG, PNG, JPG, GIF, WEBP. Max size: 5MB per image</small>
                                        </div>
                                        <div id="imagePreview" class="mt-3 row"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title (Optional)</label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="{{ old('title') }}" 
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
                                                   value="{{ old('order', 0) }}" 
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
                                                      rows="3" placeholder="Enter image description">{{ old('description') }}</textarea>
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
                                                <i class="fas fa-save"></i> Upload Image
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
                                Upload Guidelines
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <h5><i class="fas fa-lightbulb text-warning"></i> Tips</h5>
                                    <ul class="pl-3">
                                        <li>Use high-quality images</li>
                                        <li>Recommended size: 600x600px</li>
                                        <li>Keep file size under 5MB</li>
                                        <li>Use web-optimized formats</li>
                                        <li>Add descriptive titles</li>
                                    </ul>
                                </div>
                            </div>
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
            // Multiple images preview
            $('#images').on('change', function(e) {
                var files = e.target.files;
                $('#imagePreview').empty();
                
                if (files.length > 0) {
                    $.each(files, function(index, file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var col = $('<div class="col-md-3 mb-3"></div>');
                            var imgContainer = $('<div class="position-relative"></div>');
                            var img = $('<img src="' + e.target.result + '" class="img-thumbnail" style="width: 100%; height: 200px; object-fit: cover;">');
                            var fileName = $('<p class="text-center mt-1 mb-0 small">' + file.name + '</p>');
                            
                            imgContainer.append(img);
                            col.append(imgContainer).append(fileName);
                            $('#imagePreview').append(col);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            // Form submission
            $('#createGalleryForm').on('submit', function(e) {
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
                        var errorMessage = 'Failed to upload image.';
                        
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
