@extends('admin-v1.layouts.header')
@section('title', 'Page Banners Management')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-image mr-2"></i>Page Banners Management</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.page-banner.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Banner
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Page Name</th>
                                        <th width="20%">Banner Image</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Created Date</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pageKeys as $key => $name)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $name }}</strong></td>
                                            <td>
                                                @if(isset($banners[$key]))
                                                    <img src="{{ asset('storage/' . $banners[$key]->banner_image) }}" alt="{{ $name }}" class="img-thumbnail" style="max-height: 60px;">
                                                @else
                                                    <span class="badge badge-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($banners[$key]))
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Not Set</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($banners[$key]))
                                                    {{ $banners[$key]->created_at->format('d M, Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($banners[$key]))
                                                    <a href="{{ route('admin.page-banner.show', $banners[$key]->id) }}" class="btn btn-info btn-sm" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.page-banner.edit', $banners[$key]->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.page-banner.create') }}?page_key={{ $key }}" class="btn btn-primary btn-sm" title="Add Banner">
                                                        <i class="fas fa-plus"></i> Add
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No pages found.</td>
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
