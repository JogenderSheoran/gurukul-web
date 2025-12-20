@extends('admin-v1.layouts.header')
@section('title', 'Edit Lab')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Edit Lab</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.lab.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.lab.update', $lab->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lab_name">Lab Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lab_name" name="lab_name" 
                                               value="{{ old('lab_name', $lab->lab_name) }}" 
                                               placeholder="Enter lab name" required>
                                        @error('lab_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active" {{ old('status', $lab->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $lab->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                                  placeholder="Enter lab description">{{ old('description', $lab->description) }}</textarea>
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
                                        @if($lab->main_banner)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $lab->main_banner) }}" class="img-thumbnail" style="max-width: 300px;">
                                                <p class="text-muted mt-1">Current Banner</p>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" id="main_banner" name="main_banner" accept="image/*">
                                        <small class="text-muted">Upload new image to replace. Max: 2MB</small>
                                        @error('main_banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div id="mainBannerPreview" class="mt-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slider_images">Add More Slider Images</label>
                                        <input type="file" class="form-control" id="slider_images" name="slider_images[]" accept="image/*" multiple>
                                        <small class="text-muted">Select multiple images to add. Max: 2MB each</small>
                                        @error('slider_images.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if($lab->slider_images && count($lab->slider_images) > 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Existing Slider Images</label>
                                        <div class="row" id="existingSliderImages">
                                            @foreach($lab->slider_images as $index => $image)
                                            <div class="col-md-3 mb-3" id="slider-image-{{ $index }}">
                                                <div class="position-relative">
                                                    <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" style="width: 100%;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute" 
                                                            style="top: 5px; right: 20px;" 
                                                            onclick="removeSliderImage({{ $lab->id }}, {{ $index }})">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="sliderImagesPreview" class="row mt-2"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Lab
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

function removeSliderImage(labId, imageIndex) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This image will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/lab/' + labId + '/remove-slider-image',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    image_index: imageIndex
                },
                success: function(response) {
                    Swal.fire('Deleted!', response.message, 'success');
                    $('#slider-image-' + imageIndex).remove();
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
}
</script>
@endpush
