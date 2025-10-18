@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h3>Add Client</h3>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Profession <span class="text-danger">*</span></label>
                    <input type="text" name="profession" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Image (Recommended: 50 x 50 px) <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required>
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Client</button>
            </form>

        </div>
    </div>

</div>
@endsection
