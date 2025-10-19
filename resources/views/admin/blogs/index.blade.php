@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Blogs</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Blog
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header"><h3 class="card-title">All Blogs</h3></div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:100px;">SR.No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th style="width:200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $key => $blog)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('images/' . $blog->image) }}" width="80">
                            @endif
                        </td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>
                            @if($blog->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $blog->created_at->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" type="submit">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
