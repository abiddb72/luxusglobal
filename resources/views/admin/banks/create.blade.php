@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add New Bank</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.banks.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Banks
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

            <form action="{{ route('admin.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="form-group">
                    <label>Bank Name <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Bank Name" value="{{ old('title') }}" required>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="summernote" class="form-control" rows="6" placeholder="Enter bank description...">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small class="text-danger" id="description-validation-text"></small>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label>Bank Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required>
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Bank
                </button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<!-- Summernote -->
<link href="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
<script src="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
$(function () {
    $('#summernote').summernote({
        height: 350,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Frontend required validation for Summernote
    $('form').on('submit', function(e) {
        // Remove previous error
        $('#summernoteError').remove();

        var content = $('#summernote').summernote('code');  // Get HTML
        var text = $('<div>').html(content).text().trim();   // Strip HTML and trim
        if (text === '') {
            e.preventDefault();  // Prevent form submission
            // Inject error message below textarea
            $('#description-validation-text').html('Description field is required.');
        }
    });
});
</script>
@endsection
