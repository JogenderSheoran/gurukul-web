@extends('admin-v1.layouts.header')
@section('title', 'View Page Banner')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-eye mr-2"></i>View Page Banner</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.page-banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.page-banner.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Page Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="40%">Page Name:</th>
                                                <td>{{ $pageKeys[$banner->page_key] ?? $banner->page_key }}</td>
                                            </tr>
                                            <tr>
                                                <th>Page Key:</th>
                                                <td><code>{{ $banner->page_key }}</code></td>
                                            </tr>
                                            <tr>
                                                <th>Created:</th>
                                                <td>{{ $banner->created_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated:</th>
                                                <td>{{ $banner->updated_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h3 class="card-title">Banner Image</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        @if($banner->banner_image)
                                            <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $pageKeys[$banner->page_key] ?? $banner->page_key }}" class="img-fluid" style="max-height: 300px;">
                                        @else
                                            <p class="text-muted">No image uploaded</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($banner->banner_content)
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h3 class="card-title">Banner Content</h3>
                                        </div>
                                        <div class="card-body">
                                            {!! $banner->banner_content !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
