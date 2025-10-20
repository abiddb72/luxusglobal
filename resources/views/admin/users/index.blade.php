@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Users</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New User
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header"><h3 class="card-title">All Users</h3></div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($user->image)
                                <img src="{{ asset('images/'.$user->image) }}" width="50">
                            @else
                                <img src="{{ asset('images/default-avatar.jpg') }}" width="50">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
