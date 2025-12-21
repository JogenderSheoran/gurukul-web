@extends('admin-v1.layouts.header')
@section('title', 'About Us Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- About Us Management -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-info-circle mr-2"></i>
                                About Us Management
                            </h3>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if($aboutUs)
                                <!-- View/Edit Mode -->
                                <ul class="nav nav-tabs" id="aboutUsTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="aboutUsTabContent">
                                    <!-- View Tab -->
                                    <div class="tab-pane fade show active" id="view" role="tabpanel">
                                        <div class="row mt-3">
                                            <!-- Principal Section -->
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h3 class="card-title">Principal Message</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($aboutUs->principal_image)
                                                            <img src="{{ asset('storage/' . $aboutUs->principal_image) }}" 
                                                                 alt="Principal" 
                                                                 class="img-fluid mb-3"
                                                                 style="max-height: 300px; border: 2px solid #ddd; padding: 10px;">
                                                        @endif
                                                        <div class="mt-2">
                                                            {!! $aboutUs->principal_message !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Chairman Section -->
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-success">
                                                        <h3 class="card-title">Chairman Message</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($aboutUs->chairman_image)
                                                            <img src="{{ asset('storage/' . $aboutUs->chairman_image) }}" 
                                                                 alt="Chairman" 
                                                                 class="img-fluid mb-3"
                                                                 style="max-height: 300px; border: 2px solid #ddd; padding: 10px;">
                                                        @endif
                                                        <div class="mt-2">
                                                            {!! $aboutUs->chairman_message !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Our Vision Section -->
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-primary">
                                                        <h3 class="card-title">Our Vision</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($aboutUs->our_vision_image)
                                                            <img src="{{ asset('storage/' . $aboutUs->our_vision_image) }}" 
                                                                 alt="Vision" 
                                                                 class="img-fluid mb-3"
                                                                 style="max-height: 300px; border: 2px solid #ddd; padding: 10px;">
                                                        @endif
                                                        <div class="mt-2">
                                                            {!! $aboutUs->our_vision !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Our Mission Section -->
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header bg-warning">
                                                        <h3 class="card-title">Our Mission</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($aboutUs->our_mission_image)
                                                            <img src="{{ asset('storage/' . $aboutUs->our_mission_image) }}" 
                                                                 alt="Mission" 
                                                                 class="img-fluid mb-3"
                                                                 style="max-height: 300px; border: 2px solid #ddd; padding: 10px;">
                                                        @endif
                                                        <div class="mt-2">
                                                            {!! $aboutUs->our_mission !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Core Value Section -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-danger">
                                                        <h3 class="card-title">Core Value</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($aboutUs->core_value_image)
                                                            <img src="{{ asset('storage/' . $aboutUs->core_value_image) }}" 
                                                                 alt="Core Value" 
                                                                 class="img-fluid mb-3"
                                                                 style="max-height: 300px; border: 2px solid #ddd; padding: 10px;">
                                                        @endif
                                                        <div class="mt-2">
                                                            {!! $aboutUs->core_value !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Tab -->
                                    <div class="tab-pane fade" id="edit" role="tabpanel">
                                        <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                            @csrf
                                            @method('PUT')

                                            <!-- Principal Section -->
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h3 class="card-title">Principal Section</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="principal_message">Principal Message <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="principal_message" name="principal_message" rows="6" required>{{ old('principal_message', $aboutUs->principal_message) }}</textarea>
                                                                @error('principal_message')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="principal_image">Principal Image</label>
                                                                <input type="file" class="form-control @error('principal_image') is-invalid @enderror" 
                                                                       id="principal_image" name="principal_image" accept="image/*">
                                                                @error('principal_image')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($aboutUs->principal_image)
                                                                <img src="{{ asset('storage/' . $aboutUs->principal_image) }}" 
                                                                     alt="Current Principal Image" 
                                                                     class="img-thumbnail"
                                                                     style="max-height: 150px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Chairman Section -->
                                            <div class="card">
                                                <div class="card-header bg-success">
                                                    <h3 class="card-title">Chairman Section</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="chairman_message">Chairman Message <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="chairman_message" name="chairman_message" rows="6" required>{{ old('chairman_message', $aboutUs->chairman_message) }}</textarea>
                                                                @error('chairman_message')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="chairman_image">Chairman Image</label>
                                                                <input type="file" class="form-control @error('chairman_image') is-invalid @enderror" 
                                                                       id="chairman_image" name="chairman_image" accept="image/*">
                                                                @error('chairman_image')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($aboutUs->chairman_image)
                                                                <img src="{{ asset('storage/' . $aboutUs->chairman_image) }}" 
                                                                     alt="Current Chairman Image" 
                                                                     class="img-thumbnail"
                                                                     style="max-height: 150px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Our Vision Section -->
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                    <h3 class="card-title">Our Vision Section</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="our_vision">Our Vision <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="our_vision" name="our_vision" rows="6" required>{{ old('our_vision', $aboutUs->our_vision) }}</textarea>
                                                                @error('our_vision')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="our_vision_image">Vision Image</label>
                                                                <input type="file" class="form-control @error('our_vision_image') is-invalid @enderror" 
                                                                       id="our_vision_image" name="our_vision_image" accept="image/*">
                                                                @error('our_vision_image')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($aboutUs->our_vision_image)
                                                                <img src="{{ asset('storage/' . $aboutUs->our_vision_image) }}" 
                                                                     alt="Current Vision Image" 
                                                                     class="img-thumbnail"
                                                                     style="max-height: 150px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Our Mission Section -->
                                            <div class="card">
                                                <div class="card-header bg-warning">
                                                    <h3 class="card-title">Our Mission Section</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="our_mission">Our Mission <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="our_mission" name="our_mission" rows="6" required>{{ old('our_mission', $aboutUs->our_mission) }}</textarea>
                                                                @error('our_mission')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="our_mission_image">Mission Image</label>
                                                                <input type="file" class="form-control @error('our_mission_image') is-invalid @enderror" 
                                                                       id="our_mission_image" name="our_mission_image" accept="image/*">
                                                                @error('our_mission_image')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($aboutUs->our_mission_image)
                                                                <img src="{{ asset('storage/' . $aboutUs->our_mission_image) }}" 
                                                                     alt="Current Mission Image" 
                                                                     class="img-thumbnail"
                                                                     style="max-height: 150px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Core Value Section -->
                                            <div class="card">
                                                <div class="card-header bg-danger">
                                                    <h3 class="card-title">Core Value Section</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="core_value">Core Value <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="core_value" name="core_value" rows="6" required>{{ old('core_value', $aboutUs->core_value) }}</textarea>
                                                                @error('core_value')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="core_value_image">Core Value Image</label>
                                                                <input type="file" class="form-control @error('core_value_image') is-invalid @enderror" 
                                                                       id="core_value_image" name="core_value_image" accept="image/*">
                                                                @error('core_value_image')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($aboutUs->core_value_image)
                                                                <img src="{{ asset('storage/' . $aboutUs->core_value_image) }}" 
                                                                     alt="Current Core Value Image" 
                                                                     class="img-thumbnail"
                                                                     style="max-height: 150px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-save"></i> Update About Us
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <!-- Add Mode -->
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> No About Us information found. Please add the information below.
                                </div>

                                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Principal Section -->
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h3 class="card-title">Principal Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="principal_message">Principal Message <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="principal_message" name="principal_message" rows="6" required>{{ old('principal_message') }}</textarea>
                                                        @error('principal_message')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="principal_image">Principal Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control @error('principal_image') is-invalid @enderror" 
                                                               id="principal_image" name="principal_image" accept="image/*" required>
                                                        @error('principal_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Chairman Section -->
                                    <div class="card">
                                        <div class="card-header bg-success">
                                            <h3 class="card-title">Chairman Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="chairman_message">Chairman Message <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="chairman_message" name="chairman_message" rows="6" required>{{ old('chairman_message') }}</textarea>
                                                        @error('chairman_message')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="chairman_image">Chairman Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control @error('chairman_image') is-invalid @enderror" 
                                                               id="chairman_image" name="chairman_image" accept="image/*" required>
                                                        @error('chairman_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Our Vision Section -->
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h3 class="card-title">Our Vision Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="our_vision">Our Vision <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="our_vision" name="our_vision" rows="6" required>{{ old('our_vision') }}</textarea>
                                                        @error('our_vision')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="our_vision_image">Vision Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control @error('our_vision_image') is-invalid @enderror" 
                                                               id="our_vision_image" name="our_vision_image" accept="image/*" required>
                                                        @error('our_vision_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Our Mission Section -->
                                    <div class="card">
                                        <div class="card-header bg-warning">
                                            <h3 class="card-title">Our Mission Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="our_mission">Our Mission <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="our_mission" name="our_mission" rows="6" required>{{ old('our_mission') }}</textarea>
                                                        @error('our_mission')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="our_mission_image">Mission Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control @error('our_mission_image') is-invalid @enderror" 
                                                               id="our_mission_image" name="our_mission_image" accept="image/*" required>
                                                        @error('our_mission_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Core Value Section -->
                                    <div class="card">
                                        <div class="card-header bg-danger">
                                            <h3 class="card-title">Core Value Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="core_value">Core Value <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="core_value" name="core_value" rows="6" required>{{ old('core_value') }}</textarea>
                                                        @error('core_value')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="core_value_image">Core Value Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control @error('core_value_image') is-invalid @enderror" 
                                                               id="core_value_image" name="core_value_image" accept="image/*" required>
                                                        @error('core_value_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Create About Us
                                            </button>
                                        </div>
                                    </div>
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
    $(document).ready(function() {
        // CKEditor configuration
        const editorConfig = {
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
        };

        // Initialize CKEditor for all textareas
        CKEDITOR.replace('principal_message', editorConfig);
        CKEDITOR.replace('chairman_message', editorConfig);
        CKEDITOR.replace('our_vision', editorConfig);
        CKEDITOR.replace('our_mission', editorConfig);
        CKEDITOR.replace('core_value', editorConfig);
    });
</script>
@endpush
