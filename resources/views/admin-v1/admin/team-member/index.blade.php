@extends('admin-v1.layouts.header')
@section('title', 'Team Members Management')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-users mr-2"></i>Team Members Management</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.team-member.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Team Member
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
                                        <th width="10%">Image</th>
                                        <th width="20%">Full Name</th>
                                        <th width="15%">Designation</th>
                                        <th width="15%">Member Type</th>
                                        <th width="15%">Teaching Subject</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($member->profile_image)
                                                    <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->full_name }}" class="img-thumbnail" style="max-height: 50px;">
                                                @else
                                                    <span class="badge badge-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td><strong>{{ $member->full_name }}</strong></td>
                                            <td>{{ $member->designation }}</td>
                                            <td>
                                                @if($member->member_type === 'teaching')
                                                    <span class="badge badge-success">Teaching</span>
                                                @else
                                                    <span class="badge badge-info">Non-Teaching</span>
                                                @endif
                                            </td>
                                            <td>{{ $member->teaching_subject ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('admin.team-member.show', $member->id) }}" class="btn btn-info btn-sm" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.team-member.edit', $member->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No team members found.</td>
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
