@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6"><h3>Edit User</h3></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password (Leave blank to keep same)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Current Image</label><br>
                    @if($user->image)
                        <img src="{{ asset('images/'.$user->image) }}" width="80">
                    @else
                        <img src="{{ asset('images/default-avatar.jpg') }}" width="80">
                    @endif
                    <small class="text-muted">Leave empty to keep current image</small>
                </div>

                <div class="form-group">
                    <label>Change Image (Recommended: 100 x 100 px)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
