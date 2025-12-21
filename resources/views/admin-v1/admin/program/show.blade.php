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
                            <a href="{{ route('admin.program.edit', $program->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.program.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Program Type</th>
                                        <td>{{ $programNames[$program->program_key] ?? $program->program_key }}</td>
                                    </tr>
                                    <tr>
                                        <th>Program Key</th>
                                        <td><code>{{ $program->program_key }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $program->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Main Image</th>
                                        <td>
                                            @if($program->main_image)
                                                <img src="{{ asset('storage/' . $program->main_image) }}" 
                                                     alt="Main Image" 
                                                     class="img-thumbnail" 
                                                     style="max-width: 300px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <div class="border p-3" style="background-color: #f8f9fa;">
                                                {!! $program->description !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Slider Images</th>
                                        <td>
                                            @if($program->slider_images && count($program->slider_images) > 0)
                                                <div class="row">
                                                    @foreach($program->slider_images as $image)
                                                        <div class="col-md-3 mb-3">
                                                            <img src="{{ asset('storage/' . $image) }}" 
                                                                 alt="Slider Image" 
                                                                 class="img-thumbnail" 
                                                                 style="width: 100%; height: 150px; object-fit: cover;">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-muted">No slider images</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($program->status === 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $program->created_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $program->updated_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
