@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Edit Visa Country</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.visas.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Visa List
            </a>
        </div>
    </div>

    <!-- Form Start -->
    <div class="card">
        <div class="card-body">
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.visas.update', $visa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Country Title -->
                <div class="form-group">
                    <label>Country Title <span class="text-danger">*</span></label>
                    <input type="text" name="country_title" class="form-control"
                           value="{{ old('country_title', $visa->country_title) }}" required>
                </div>

                <!-- Old Flag Image -->
                <div class="form-group">
                    <label>Current Flag Image</label><br>
                    @if($visa->country_image)
                        <img src="{{ asset('images/'.$visa->country_image) }}" alt="" width="80">
                    @endif
                </div>

                <!-- Replace Flag Image -->
                <div class="form-group">
                    <label>Change Flag Image (Recommended: 80 x 50 px)</label>
                    <input type="file" name="country_image" class="form-control">
                    <small class="text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <!-- Old Feature Image -->
                <div class="form-group">
                    <label>Current Feature Image (Recommended: 1200 x 400 px)</label><br>
                    @if($visa->feature_image)
                        <img src="{{ asset('images/'.$visa->feature_image) }}" alt="" width="150">
                        <small class="text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                    @endif
                </div>

                <!-- Replace Feature Image -->
                <div class="form-group">
                    <label>Change Feature Image</label>
                    <input type="file" name="feature_image" class="form-control">
                </div>

                <!-- Visa Description -->
                <div class="form-group">
                    <label>Visa Description</label>
                    <textarea name="visa_description" id="visa_desc" class="form-control" rows="6">{{ old('visa_description', $visa->visa_description) }}</textarea>
                </div>

                <!-- Embassy Requirements -->
                <div class="form-group">
                    <label>Embassy Requirements</label>
                    <textarea name="embassy_requirements" id="embassy_req" class="form-control" rows="6">{{ old('embassy_requirements', $visa->embassy_requirements) }}</textarea>
                </div>

                <!-- Duration Description -->
                <div class="form-group">
                    <label>Duration Description</label>
                    <textarea name="duration_description" id="duration_desc" class="form-control" rows="6">{{ old('duration_description', $visa->duration_description) }}</textarea>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $visa->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $visa->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Visa Country
                </button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<link href="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
<script src="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
$(function () {
    $('#visa_desc, #embassy_req, #duration_desc').summernote({
        height: 300,
    });
});
</script>
@endsection
