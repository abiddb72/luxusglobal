@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Clients</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Client
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="clientsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Profession</th>
                        
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if($client->image)
                                <img src="{{ asset('images/'.$client->image) }}" width="40" class="img-circle">
                            @endif
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->profession }}</td>
                        
                        <td>
                            @if($client->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')">
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
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
$(function () {
    $('#clientsTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
    });
});
</script>
@endsection