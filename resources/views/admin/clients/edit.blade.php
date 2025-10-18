@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h3>Edit Client</h3>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Profession <span class="text-danger">*</span></label>
                    <input type="text" name="profession" value="{{ $client->profession }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Current Image (Recommended: 50 x 50 px)</label><br>
                    @if($client->image)
                        <img src="{{ asset('images/'.$client->image) }}" width="80"><br><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $client->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Client</button>
            </form>

        </div>
    </div>

</div>
@endsection
