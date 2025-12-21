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
                    <form action="{{ route('admin.infrastructure-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <label for="section_key">Section Name <span class="text-danger">*</span></label>
                                <select name="section_key" id="section_key" class="form-control @error('section_key') is-invalid @enderror" required>
                                    <option value="">-- Select Section --</option>
                                    @foreach($availableSections as $key => $name)
                                        <option value="{{ $key }}" {{ old('section_key') == $key ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('section_key')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="main_image">Main Image <span class="text-danger">*</span></label>
                                <input type="file" 
                                       name="main_image" 
                                       id="main_image" 
                                       class="form-control @error('main_image') is-invalid @enderror" 
                                       accept="image/png,image/jpg,image/jpeg"
                                       required>
                                <small class="form-text text-muted">Allowed: PNG, JPG, JPEG | Max size: 2MB</small>
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
                                          required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slider_images">Slider Images (Multiple)</label>
                                <input type="file" 
                                       name="slider_images[]" 
                                       id="slider_images" 
                                       class="form-control @error('slider_images.*') is-invalid @enderror" 
                                       accept="image/png,image/jpg,image/jpeg"
                                       multiple>
                                <small class="form-text text-muted">Allowed: PNG, JPG, JPEG | Max size: 2MB per image</small>
                                @error('slider_images.*')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Section
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
