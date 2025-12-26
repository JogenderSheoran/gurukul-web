@extends('admin-v1.layouts.header')
@section('title', 'Add Adventure/Celebration')
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
                                Add New Adventure/Celebration
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.adventure-celebration.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.adventure-celebration.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="section_type">Section Type <span class="text-danger">*</span></label>
                                            <select class="form-control @error('section_type') is-invalid @enderror" 
                                                    id="section_type" name="section_type" required>
                                                <option value="">Select Type</option>
                                                <option value="adventure" {{ old('section_type') == 'adventure' ? 'selected' : '' }}>
                                                    Adventure Trip
                                                </option>
                                                <option value="celebration" {{ old('section_type') == 'celebration' ? 'selected' : '' }}>
                                                    Celebration
                                                </option>
                                            </select>
                                            @error('section_type')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control @error('status') is-invalid @enderror" 
                                                    id="status" name="status" required>
                                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" 
                                                   name="title" 
                                                   value="{{ old('title') }}" 
                                                   placeholder="Enter title"
                                                   required>
                                            @error('title')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="card_image">Card Image</label>
                                            <input type="file" 
                                                   class="form-control @error('card_image') is-invalid @enderror" 
                                                   id="card_image" 
                                                   name="card_image" 
                                                   accept="image/*"
                                                   onchange="previewImage(event)">
                                            @error('card_image')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">
                                                Accepted formats: JPEG, PNG, JPG, GIF, WEBP. Max size: 2MB
                                            </small>
                                        </div>
                                        <div id="imagePreview" class="mt-2"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="gallery_link">Gallery Link (Google Photos)</label>
                                            <input type="url" 
                                                   class="form-control @error('gallery_link') is-invalid @enderror" 
                                                   id="gallery_link" 
                                                   name="gallery_link" 
                                                   value="{{ old('gallery_link') }}" 
                                                   placeholder="https://photos.google.com/...">
                                            @error('gallery_link')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">
                                                Enter Google Photos album link or any external gallery URL
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save Record
                                            </button>
                                            <a href="{{ route('admin.adventure-celebration.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main Content -->
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <img src="${e.target.result}" 
                             class="img-thumbnail" 
                             style="max-width: 300px; max-height: 300px;"
                             alt="Preview">
                    `;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
@endpush
