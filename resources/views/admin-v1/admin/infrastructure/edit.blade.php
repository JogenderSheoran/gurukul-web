@extends('admin-v1.layouts.header')
@section('title', 'Edit Infrastructure')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Infrastructure - {{ $infrastructure->heading }}
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.infrastructure.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.infrastructure.update', $infrastructure->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon">Icon Class <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="icon" name="icon" 
                                               value="{{ old('icon', $infrastructure->icon) }}" 
                                               placeholder="e.g., fas fa-building" required>
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <small class="form-text text-muted">FontAwesome icon class</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heading">Heading <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="heading" name="heading" 
                                               value="{{ old('heading', $infrastructure->heading) }}" 
                                               placeholder="Enter heading" required>
                                        @error('heading')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" 
                                                  placeholder="Enter description">{{ old('description', $infrastructure->description) }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order">Display Order</label>
                                        <input type="number" class="form-control" id="order" name="order" 
                                               value="{{ old('order', $infrastructure->order ?? 0) }}" 
                                               placeholder="Enter display order">
                                        @error('order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active" {{ old('status', $infrastructure->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $infrastructure->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                        <a href="{{ route('admin.infrastructure.index') }}" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle mr-2"></i>
                            Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="info-box">
                            <span class="info-box-icon bg-info">
                                <i class="fas fa-hashtag"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">ID</span>
                                <span class="info-box-number">{{ $infrastructure->id }}</span>
                            </div>
                        </div>

                        <div class="info-box">
                            <span class="info-box-icon bg-success">
                                <i class="fas fa-calendar"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Created</span>
                                <span class="info-box-number">{{ $infrastructure->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <div class="info-box">
                            <span class="info-box-icon {{ $infrastructure->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                <i class="fas {{ $infrastructure->status == 'active' ? 'fa-check' : 'fa-times' }}"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Status</span>
                                <span class="info-box-number">{{ ucfirst($infrastructure->status) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
