@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6"><h3>Add New Banner</h3></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Banner Image (Recommended: 1600 x 600 px) <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required>
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Banner</button>
            </form>
        </div>
    </div>

</div>
@endsection
