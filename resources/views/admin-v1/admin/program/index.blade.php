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
                            <a href="{{ route('admin.program.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Program
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="15%">Program Key</th>
                                        <th width="20%">Title</th>
                                        <th width="15%">Main Image</th>
                                        <th width="10%">Slider Images</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($programs as $program)
                                        <tr>
                                            <td>{{ $program->id }}</td>
                                            <td>
                                                <code>{{ $program->program_key }}</code><br>
                                                <small class="text-muted">{{ $programNames[$program->program_key] ?? $program->program_key }}</small>
                                            </td>
                                            <td><strong>{{ $program->title }}</strong></td>
                                            <td>
                                                @if($program->main_image)
                                                    <img src="{{ asset('storage/' . $program->main_image) }}" 
                                                         alt="Main Image" 
                                                         class="img-thumbnail" 
                                                         style="max-width: 100px; max-height: 80px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($program->slider_images && count($program->slider_images) > 0)
                                                    <span class="badge badge-info">{{ count($program->slider_images) }} images</span>
                                                @else
                                                    <span class="text-muted">No images</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($program->status === 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.program.show', $program->id) }}" 
                                                       class="btn btn-info btn-sm" 
                                                       title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.program.edit', $program->id) }}" 
                                                       class="btn btn-warning btn-sm" 
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.program.destroy', $program->id) }}" 
                                                          method="POST" 
                                                          style="display: inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this program?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No programs found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
