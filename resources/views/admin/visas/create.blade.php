@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add New Visa Country</h3>
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

            <form action="{{ route('admin.visas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Country Title -->
                <div class="form-group">
                    <label>Country Title <span class="text-danger">*</span></label>
                    <input type="text" name="country_title" class="form-control"
                           placeholder="Enter Country Name" value="{{ old('country_title') }}" required>
                </div>

                <!-- Flag Image -->
                <div class="form-group">
                    <label>Flag Image (Recommended: 80 x 50 px) <span class="text-danger">*</span></label>
                    <input type="file" name="country_image" class="form-control" required>
                    <small class="text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <!-- Feature Image -->
                <div class="form-group">
                    <label>Feature Image (Recommended: 1200 x 400 px) <span class="text-danger">*</span></label>
                    <input type="file" name="feature_image" class="form-control" required>
                    <small class="text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                </div>

                <!-- Visa Description -->
                <div class="form-group">
                    <label>Visa Description</label>
                    <textarea name="visa_description" id="visa_desc" class="form-control" rows="6"
                              placeholder="Enter Visa Description...">{{ old('visa_description') }}</textarea>
                </div>

                <!-- Embassy Requirements -->
                <div class="form-group">
                    <label>Embassy Requirements</label>
                    <textarea name="embassy_requirements" id="embassy_req" class="form-control" rows="6"
                              placeholder="Enter Embassy Requirements...">{{ old('embassy_requirements') }}</textarea>
                </div>

                <!-- Duration Description -->
                <div class="form-group">
                    <label>Duration Description</label>
                    <textarea name="duration_description" id="duration_desc" class="form-control" rows="6"
                              placeholder="Enter Duration Information...">{{ old('duration_description') }}</textarea>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Visa Country
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
