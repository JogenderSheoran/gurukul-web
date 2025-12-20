@extends('admin-v1.layouts.header')
@section('title', 'Create Lab')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus mr-2"></i>Create New Lab</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.lab.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.lab.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lab_name">Lab Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lab_name" name="lab_name" 
                                               value="{{ old('lab_name') }}" 
                                               placeholder="Enter lab name (e.g., Physics Lab, Art Lab)" required>
                                        @error('lab_name')
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
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" 
                                                  placeholder="Enter lab description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="main_banner">Main Banner Image</label>
                                        <input type="file" class="form-control" id="main_banner" name="main_banner" accept="image/*">
                                        <small class="text-muted">Recommended size: 1920x600px. Max: 2MB</small>
                                        @error('main_banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div id="mainBannerPreview" class="mt-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slider_images">Slider Images (Multiple)</label>
                                        <input type="file" class="form-control" id="slider_images" name="slider_images[]" accept="image/*" multiple>
                                        <small class="text-muted">You can select multiple images. Max: 2MB each</small>
                                        @error('slider_images.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="sliderImagesPreview" class="row mt-2"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Create Lab
                                    </button>
                                    <a href="{{ route('admin.lab.index') }}" class="btn btn-secondary ml-2">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
document.getElementById('main_banner').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('mainBannerPreview');
    preview.innerHTML = '';
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 300px;">';
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('slider_images').addEventListener('change', function(e) {
    const files = e.target.files;
    const preview = document.getElementById('sliderImagesPreview');
    preview.innerHTML = '';
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function(e) {
            const col = document.createElement('div');
            col.className = 'col-md-3 mb-2';
            col.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="width: 100%;">';
            preview.appendChild(col);
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
