@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Visa Countries</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.visas.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Visa Country
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- DataTable -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Visa Countries</h3>
        </div>
        <div class="card-body">
            <table id="visaTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.No</th>
                        <th>Image</th>
                        <th>Country Title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visas as $key => $visa)
                        <tr>
                            <td width="10">{{ $key + 1 }}</td>
                            <td>
                                @if($visa->country_image)
                                    <img src="{{ asset('images/' . $visa->country_image) }}" alt="{{ $visa->country_title }}" width="50" height="35" style="object-fit:cover;border-radius:4px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $visa->country_title }}</td>
                            <td>
                                @if($visa->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $visa->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.visas.edit', $visa->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.visas.destroy', $visa->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
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
        $('#visaTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
        });
    });
</script>
@endsection
