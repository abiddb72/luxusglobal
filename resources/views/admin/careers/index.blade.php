@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Career Applications</h3>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table id="careersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Applied On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $key => $c)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->created_at->format('d M, Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.careers.show', $c->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
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
        $('#careersTable').DataTable();
    });
</script>
@endsection
