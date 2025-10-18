@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Banks</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.banks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Bank
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
            <h3 class="card-title">All Banks</h3>
        </div>
        <div class="card-body">
            <table id="banksTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banks as $key => $bank)
                        <tr>
                            <td width="10">{{ $key + 1 }}</td>
                            <td>{{ $bank->title }}</td>
                            <td>
                                @if($bank->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $bank->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.banks.edit', $bank->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.banks.destroy', $bank->id) }}" method="POST" style="display:inline-block;">
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
        $('#banksTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
        });
    });
</script>
@endsection
