@extends('admin-v1.layouts.header')
@section('title', 'Add Page Banner')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus mr-2"></i>Add Page Banner</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.page-banner.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.page-banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="page_key">Page <span class="text-danger">*</span></label>
                                        <select class="form-control @error('page_key') is-invalid @enderror" id="page_key" name="page_key" required>
                                            <option value="">-- Select Page --</option>
                                            @foreach($pageKeys as $key => $name)
                                                @if(!in_array($key, $existingKeys))
                                                    <option value="{{ $key }}" {{ old('page_key', request('page_key')) == $key ? 'selected' : '' }}>{{ $name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('page_key')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" name="banner_image" accept="image/png,image/jpg,image/jpeg" required>
                                        <small class="form-text text-muted">Allowed: PNG, JPG, JPEG | Max: 2MB</small>
                                        @error('banner_image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_content">Banner Content (Optional)</label>
                                        <textarea class="form-control" id="banner_content" name="banner_content" rows="6">{{ old('banner_content') }}</textarea>
                                        @error('banner_content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Banner</button>
                            <a href="{{ route('admin.page-banner.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('banner_content', {
        height: 300,
        toolbar: [
            { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print' ] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll' ] },
            '/',
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
        ]
    });
</script>
@endpush
