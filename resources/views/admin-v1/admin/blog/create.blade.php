@extends('admin-v1.layouts.header')
@section('title', 'Create Blog Post')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Blog Create Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Create New Blog Post
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Blogs
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="createBlogForm" method="POST" action="{{ route('admin.blog.store') }}">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Blog Details</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="{{ old('title') }}" 
                                                   placeholder="Enter blog title" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author">Author <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="author" name="author" 
                                                   value="{{ old('author') }}" 
                                                   placeholder="Enter author name" required>
                                            @error('author')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
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
                                            <label for="content">Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="content" name="content" rows="10" 
                                                      placeholder="Enter blog content" required>{{ old('content') }}</textarea>
                                            @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="publish_date">Publish Date (Optional)</label>
                                            <input type="date" class="form-control" id="publish_date" name="publish_date" 
                                                   value="{{ old('publish_date') }}">
                                            @error('publish_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Create Blog Post
                                            </button>
                                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Blog Info -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-2"></i>
                                Blog Guidelines
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <h5><i class="fas fa-lightbulb text-warning"></i> Tips</h5>
                                    <ul class="pl-3">
                                        <li>Write a catchy title</li>
                                        <li>Keep content engaging</li>
                                        <li>Use proper formatting</li>
                                        <li>Add relevant images</li>
                                        <li>Proofread before publishing</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="info-box bg-info">
                                <span class="info-box-icon">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Status</span>
                                    <span class="info-box-number">Draft blogs won't appear on frontend</span>
                                </div>
                            </div>

                            <div class="info-box bg-success">
                                <span class="info-box-icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Published</span>
                                    <span class="info-box-number">Visible to all users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main Content  -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>

    $(document).ready(function () {
    $('#createBlogForm').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let actionUrl = $(this).attr('action');

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            dataType: 'json', // 🔴 IMPORTANT
            success: function (response) {
                console.log(response); // 👈 confirm response in console

                if (response.success === true) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('admin.blog.index') }}";
                    });
                }
            },
            error: function (xhr) {
                let errorMessage = 'Failed to create blog post.';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors)
                        .flat()
                        .join('<br>');
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
    
    .info-box {
        margin-bottom: 15px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #495057;
    }
    
    .text-danger {
        font-size: 0.875em;
    }
</style>
@endpush
