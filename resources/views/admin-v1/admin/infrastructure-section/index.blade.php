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
                            <a href="{{ route('admin.infrastructure-section.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Section
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
                                        <th width="20%">Section Name</th>
                                        <th width="15%">Main Image</th>
                                        <th width="35%">Description</th>
                                        <th width="10%">Slider Images</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sections as $section)
                                        <tr>
                                            <td>{{ $section->id }}</td>
                                            <td>
                                                <strong>{{ $sectionNames[$section->section_key] ?? $section->section_key }}</strong>
                                            </td>
                                            <td>
                                                @if($section->main_image)
                                                    <img src="{{ asset('storage/' . $section->main_image) }}" 
                                                         alt="Main Image" 
                                                         class="img-thumbnail" 
                                                         style="max-width: 100px; max-height: 80px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="max-height: 80px; overflow: hidden;">
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($section->description), 150) !!}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if($section->slider_images && count($section->slider_images) > 0)
                                                    <span class="badge badge-info">{{ count($section->slider_images) }} images</span>
                                                @else
                                                    <span class="text-muted">No images</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.infrastructure-section.show', $section->id) }}" 
                                                       class="btn btn-info btn-sm" 
                                                       title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.infrastructure-section.edit', $section->id) }}" 
                                                       class="btn btn-warning btn-sm" 
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.infrastructure-section.destroy', $section->id) }}" 
                                                          method="POST" 
                                                          style="display: inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this section?');">
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
                                            <td colspan="6" class="text-center">No infrastructure sections found.</td>
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
