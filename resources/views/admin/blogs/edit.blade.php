@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="row mb-3">
        <div class="col-md-6"><h3>Edit Blog</h3></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <!-- Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label>Blog Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>

                <!-- Author -->
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" value="{{ $blog->author }}">
                </div>

                <!-- Current Image -->
                @if($blog->image)
                <div class="form-group">
                    <label>Current Image</label><br>
                    <img src="{{ asset('images/' . $blog->image) }}" width="200" style="object-fit:cover;">
                    <small class="form-text text-muted">Leave blank if you don't want to change image</small>
                </div>
                @endif

                <!-- Replace Image -->
                <div class="form-group">
                    <label>Replace Image (Recommended: 1200 x 400 px)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="summernote" class="form-control">{{ $blog->description }}</textarea>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Save -->
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i> Update Blog
                </button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.css') }}">
<script src="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
        $('#summernote').summernote({ height: 300 });
    });
</script>
@endsection
