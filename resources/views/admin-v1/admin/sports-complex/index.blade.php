@extends('admin-v1.layouts.header')
@section('title', 'Sports Complex Management')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-running mr-2"></i>Sports Complex Management</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif

                        @if($sportsComplex)
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view"><i class="fas fa-eye"></i> View</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#edit"><i class="fas fa-edit"></i> Edit</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="view">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header bg-info"><h3 class="card-title">Main Image</h3></div>
                                                <div class="card-body">
                                                    @if($sportsComplex->main_image)
                                                        <img src="{{ asset('storage/' . $sportsComplex->main_image) }}" alt="Main" class="img-fluid" style="max-height: 300px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header bg-primary"><h3 class="card-title">Description</h3></div>
                                                <div class="card-body">{!! $sportsComplex->description !!}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-warning"><h3 class="card-title">Gallery Images</h3></div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @if($sportsComplex->gallery_image)
                                                            @foreach($sportsComplex->gallery_image as $image)
                                                                <div class="col-md-3 mb-3">
                                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery" class="img-fluid" style="max-height: 200px;">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="edit">
                                    <form action="{{ route('admin.sports-complex.update') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="main_image">Main Image</label>
                                                    <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*">
                                                    <small class="form-text text-muted">Leave empty to keep current image</small>
                                                    @if($sportsComplex->main_image)
                                                        <img src="{{ asset('storage/' . $sportsComplex->main_image) }}" alt="Current" class="img-thumbnail mt-2" style="max-height: 150px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description', $sportsComplex->description) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="gallery_image">Gallery Images</label>
                                                    <input type="file" class="form-control" id="gallery_image" name="gallery_image[]" accept="image/*" multiple>
                                                    <small class="form-text text-muted">Leave empty to keep current images</small>
                                                    @if($sportsComplex->gallery_image)
                                                        <div class="row mt-2">
                                                            @foreach($sportsComplex->gallery_image as $image)
                                                                <div class="col-md-2 mb-2">
                                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery" class="img-thumbnail" style="max-height: 100px;">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info"><i class="fas fa-info-circle"></i> No information found. Please add below.</div>
                            <form action="{{ route('admin.sports-complex.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="main_image">Main Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="gallery_image">Gallery Images</label>
                                            <input type="file" class="form-control" id="gallery_image" name="gallery_image[]" accept="image/*" multiple>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
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
