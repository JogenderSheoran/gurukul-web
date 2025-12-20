@extends('admin-v1.layouts.header')
@section('title', $title)
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- User Info Card -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-edit mr-2"></i>
                                Edit User - {{ $user->username }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-v1.users') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Users
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="editUserForm" method="POST" action="{{ route('admin-v1.users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Profile Details</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username" 
                                                   value="{{ old('username', $user->username) }}" 
                                                   placeholder="First name" required>
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="{{ old('email', $user->email) }}" 
                                                   placeholder="Email" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" 
                                                   value="{{ old('mobile', $user->mobile) }}" 
                                                   placeholder="Phone number" required>
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Blocked</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lead_count">Lead Count</label>
                                            <input type="number" class="form-control" id="lead_count" name="lead_count" 
                                                   value="{{ old('lead_count', $user->lead_count) }}" 
                                                   placeholder="Lead count" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Information -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3 mt-3">Location Information</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" 
                                                   value="{{ old('latitude', $user->latitude) }}" 
                                                   placeholder="Latitude">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" 
                                                   value="{{ old('longitude', $user->longitude) }}" 
                                                   placeholder="Longitude">
                                        </div>
                                    </div>
                                </div>

                                @if($user->latitude && $user->longitude)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Location</label>
                                            <div>
                                                <a href="https://www.google.com/maps?q={{ $user->latitude }},{{ $user->longitude }}" 
                                                   target="_blank" class="btn btn-info btn-sm">
                                                    <i class="fas fa-map-marker-alt"></i> View on Google Maps
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save Changes
                                            </button>
                                            <a href="{{ route('admin-v1.users') }}" class="btn btn-secondary ml-2">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- User Statistics -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-2"></i>
                                User Statistics
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">User ID</span>
                                    <span class="info-box-number">{{ $user->id }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Registered</span>
                                    <span class="info-box-number">{{ $user->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon bg-warning">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Lead Count</span>
                                    <span class="info-box-number">{{ $user->lead_count ?? 0 }}</span>
                                </div>
                            </div>

                            <div class="info-box">
                                <span class="info-box-icon {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                                    <i class="fas {{ $user->status ? 'fa-check' : 'fa-times' }}"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Status</span>
                                    <span class="info-box-number">{{ $user->status ? 'Active' : 'Blocked' }}</span>
                                </div>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('admin-v1.users.rides', $user->id) }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-car"></i> View Ride History
                                </a>
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
        $(document).ready(function() {
            // Form submission with validation
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                var actionUrl = $(this).attr('action');
                
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'User updated successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin-v1.users') }}";
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to update user', 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON?.errors;
                        var errorMessage = 'Failed to update user.';
                        
                        if (errors) {
                            errorMessage = Object.values(errors).flat().join('<br>');
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
