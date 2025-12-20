@extends('admin-v1.layouts.header')
@section('title', 'Welcome Popup Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Welcome Popup Management -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-window-maximize mr-2"></i>
                                Welcome Popup Management
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h3 class="card-title">Upload/Replace Popup Image</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.welcome-popup.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="image">Popup Image <span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                           id="image" name="image" accept="image/*" required>
                                                    @error('image')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                    <small class="form-text text-muted">
                                                        Supported formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB)
                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <img id="imagePreview" src="#" alt="Image Preview" 
                                                         style="max-width: 100%; display: none; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-upload"></i> 
                                                    {{ $popup ? 'Replace Image' : 'Upload Image' }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-success">
                                            <h3 class="card-title">Current Popup Image</h3>
                                        </div>
                                        <div class="card-body">
                                            @if($popup && $popup->image)
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $popup->image) }}" 
                                                         alt="Welcome Popup" 
                                                         class="img-fluid mb-3"
                                                         style="max-height: 400px; border: 2px solid #ddd; padding: 10px;">
                                                    <br>
                                                    <form action="{{ route('admin.welcome-popup.destroy') }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Are you sure you want to delete this popup image?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Delete Image
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="alert alert-info text-center">
                                                    <i class="fas fa-info-circle"></i>
                                                    No popup image uploaded yet. Please upload an image.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        <h5><i class="icon fas fa-exclamation-triangle"></i> Important Note:</h5>
                                        <ul class="mb-0">
                                            <li>Only <strong>ONE</strong> popup image can exist at a time</li>
                                            <li>Uploading a new image will automatically <strong>replace</strong> the existing one</li>
                                            <li>The old image file will be permanently deleted when replaced</li>
                                            <li>Recommended image size: 800x600 pixels or similar aspect ratio</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
