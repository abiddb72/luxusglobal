@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6"><h3>Add New Blog</h3></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Blog Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Blog Title" required>
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Author Name">
                </div>

                <div class="form-group">
                    <label>Blog Image (Recommended: 1200 x 400 px)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                </div>

                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="summernote" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Blog</button>
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
