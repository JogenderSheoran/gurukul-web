@extends('admin-v1.layouts.header')
@section('title', $title)
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.infrastructure-section.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.infrastructure-section.update', $infrastructureSection->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Section Name</label>
                                <input type="text" 
                                       class="form-control" 
                                       value="{{ $sectionNames[$infrastructureSection->section_key] ?? $infrastructureSection->section_key }}" 
                                       disabled>
                                <small class="form-text text-muted">Section name cannot be changed</small>
                            </div>

                            <div class="form-group">
                                <label for="main_image">Main Image</label>
                                @if($infrastructureSection->main_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $infrastructureSection->main_image) }}" 
                                             alt="Current Main Image" 
                                             class="img-thumbnail" 
                                             style="max-width: 200px;">
                                        <p class="text-muted small">Current image</p>
                                    </div>
                                @endif
                                <input type="file" 
                                       name="main_image" 
                                       id="main_image" 
                                       class="form-control @error('main_image') is-invalid @enderror" 
                                       accept="image/png,image/jpg,image/jpeg">
                                <small class="form-text text-muted">Leave empty to keep current image | Allowed: PNG, JPG, JPEG | Max size: 2MB</small>
                                @error('main_image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" 
                                          id="description" 
                                          class="form-control ckeditor @error('description') is-invalid @enderror" 
                                          rows="5"
                                          required>{{ old('description', $infrastructureSection->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slider_images">Slider Images (Multiple)</label>
                                @if($infrastructureSection->slider_images && count($infrastructureSection->slider_images) > 0)
                                    <div class="mb-2">
                                        <p class="text-muted small">Current slider images:</p>
                                        <div class="row">
                                            @foreach($infrastructureSection->slider_images as $image)
                                                <div class="col-md-2 mb-2">
                                                    <img src="{{ asset('storage/' . $image) }}" 
                                                         alt="Slider Image" 
                                                         class="img-thumbnail" 
                                                         style="width: 100%; height: 100px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <input type="file" 
                                       name="slider_images[]" 
                                       id="slider_images" 
                                       class="form-control @error('slider_images.*') is-invalid @enderror" 
                                       accept="image/png,image/jpg,image/jpeg"
                                       multiple>
                                <small class="form-text text-muted">Leave empty to keep current images | Uploading new images will replace all existing slider images | Allowed: PNG, JPG, JPEG | Max size: 2MB per image</small>
                                @error('slider_images.*')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Section
                            </button>
                            <a href="{{ route('admin.infrastructure-section.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush
