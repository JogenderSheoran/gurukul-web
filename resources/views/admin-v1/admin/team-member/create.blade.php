@extends('admin-v1.layouts.header')
@section('title', 'Add Team Member')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus mr-2"></i>Add Team Member</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.team-member.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.team-member.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Member Type <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="member_type" id="teaching" value="teaching" {{ old('member_type') == 'teaching' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="teaching">Teaching</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="member_type" id="non_teaching" value="non_teaching" {{ old('member_type') == 'non_teaching' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="non_teaching">Non-Teaching</label>
                                            </div>
                                        </div>
                                        @error('member_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                        @error('full_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation') }}" required>
                                        @error('designation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6" id="teaching_subject_wrapper" style="display: none;">
                                    <div class="form-group">
                                        <label for="teaching_subject">Teaching Subject <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('teaching_subject') is-invalid @enderror" id="teaching_subject" name="teaching_subject" value="{{ old('teaching_subject') }}">
                                        @error('teaching_subject')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_image">Profile Image</label>
                                        <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image" accept="image/png,image/jpg,image/jpeg">
                                        <small class="form-text text-muted">Allowed: PNG, JPG, JPEG | Max: 2MB</small>
                                        @error('profile_image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Team Member</button>
                            <a href="{{ route('admin.team-member.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        function toggleTeachingSubject() {
            var memberType = $('input[name="member_type"]:checked').val();
            if (memberType === 'teaching') {
                $('#teaching_subject_wrapper').show();
                $('#teaching_subject').prop('required', true);
            } else {
                $('#teaching_subject_wrapper').hide();
                $('#teaching_subject').prop('required', false);
                $('#teaching_subject').val('');
            }
        }

        $('input[name="member_type"]').change(function() {
            toggleTeachingSubject();
        });

        // Initialize on page load
        toggleTeachingSubject();
    });
</script>
@endpush
