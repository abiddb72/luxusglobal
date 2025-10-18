@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Banners</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Banner
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header"><h3 class="card-title">All Banners</h3></div>

        <div class="card-body">
            <table id="bannersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.No</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th style="width:160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $key => $banner)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($banner->image)
                                <img src="{{ asset('images/' . $banner->image) }}" alt="banner" width="150" style="object-fit:cover;">
                            @endif
                        </td>
                        <td>
                            @if($banner->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $banner->created_at->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
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

@section('scripts')
<script>
    $(function () {
        $('#bannersTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
        });
    });
</script>
@endsection
