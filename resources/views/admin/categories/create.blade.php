@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add New Category</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Categories
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <!-- Type & Status in one row -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-control" required>
                            <option value="1" {{ old('type')==1 ? 'selected' : '' }}>Package</option>
                            <option value="2" {{ old('type')==2 ? 'selected' : '' }}>Religion</option>
                            <option value="3" {{ old('type')==3 ? 'selected' : '' }}>Event</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',1)==1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status')==0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Feature Image -->
                <div class="form-group">
                    <label>Feature Image (Recommended: 1200 x 400 px) <span class="text-danger">*</span></label>
                    <input type="file" name="feature_image" class="form-control" accept=".jpg,.jpeg,.png" required>
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 300KB</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Category
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
