@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Edit Bank</h3>
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
            <form action="{{ route('admin.banks.update', $bank->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label>Bank Name <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" 
                           value="{{ old('title', $bank->title) }}" placeholder="Enter Bank Name" required>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $bank->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $bank->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="summernote" class="form-control" rows="6" 
                              placeholder="Enter bank description...">{{ old('description', $bank->description) }}</textarea>
                
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small class="text-danger" id="description-validation-text"></small>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label>Bank Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($bank->image)
                        <div class="mt-2">
                            <img src="{{ asset('images/banks/'.$bank->image) }}" alt="Bank Image" width="150">
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Bank
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
