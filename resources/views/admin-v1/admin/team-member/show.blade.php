@extends('admin-v1.layouts.header')
@section('title', 'View Team Member')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-eye mr-2"></i>View Team Member</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.team-member.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.team-member.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Profile Image</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        @if($member->profile_image)
                                            <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->full_name }}" class="img-fluid" style="max-height: 300px;">
                                        @else
                                            <div class="text-muted">
                                                <i class="fas fa-user fa-5x"></i>
                                                <p class="mt-2">No image uploaded</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title">Member Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="35%">Full Name:</th>
                                                <td><strong>{{ $member->full_name }}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Designation:</th>
                                                <td>{{ $member->designation }}</td>
                                            </tr>
                                            <tr>
                                                <th>Member Type:</th>
                                                <td>
                                                    @if($member->member_type === 'teaching')
                                                        <span class="badge badge-success">Teaching</span>
                                                    @else
                                                        <span class="badge badge-info">Non-Teaching</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($member->member_type === 'teaching' && $member->teaching_subject)
                                                <tr>
                                                    <th>Teaching Subject:</th>
                                                    <td>{{ $member->teaching_subject }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Created:</th>
                                                <td>{{ $member->created_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated:</th>
                                                <td>{{ $member->updated_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                        </table>
                                    </div>
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
