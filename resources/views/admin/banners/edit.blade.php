@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6"><h3>Edit Banner</h3></div>
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
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($banner->image)
                <div class="form-group">
                    <label>Current Image (Recommended: 1600 x 600 px) <span class="text-danger">*</span></label><br>
                    <img src="{{ asset('images/' . $banner->image) }}" alt="banner" width="300" style="object-fit:cover;">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 300KB</small>
                </div>
                @endif

                <div class="form-group">
                    <label>Replace Image</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Leave empty to keep existing image.</small>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update Banner</button>
            </form>
        </div>
    </div>

</div>
@endsection
