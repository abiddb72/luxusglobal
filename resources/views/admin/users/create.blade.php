@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6"><h3>Add New User</h3></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label>User Image (Recommended: 100 x 100 px)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save User</button>
            </form>
        </div>
    </div>
</div>
@endsection
