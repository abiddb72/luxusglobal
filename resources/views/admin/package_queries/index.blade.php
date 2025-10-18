@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Package Queries</h3>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        
        <div class="card-body">
            <table id="queriesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SR.</th>
                        <th>Package Title</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>No. of Persons</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($queries as $key => $q)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $q->package->title ?? 'N/A' }}</td>
                        <td>{{ $q->name }}</td>
                        <td>{{ $q->email }}</td>
                        <td>{{ $q->phone }}</td>
                        <td>{{ $q->no_of_person }}</td>
                        <td>{{ \Carbon\Carbon::parse($q->date)->format('d M, Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm 
                                    @if($q->status == 0) btn-warning 
                                    @elseif($q->status == 1) btn-success 
                                    @else btn-danger @endif
                                dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if($q->status == 0) Pending
                                    @elseif($q->status == 1) Completed
                                    @else Cancelled @endif
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('admin.package_queries.update_status', $q->id) }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" name="status" value="0">Pending</button>
                                        <button class="dropdown-item" name="status" value="1">Completed</button>
                                        <button class="dropdown-item" name="status" value="2">Cancelled</button>
                                    </form>
                                </div>
                            </div>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.package_queries.show', $q->id) }}" class="btn btn-sm btn-primary">
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
        $('#queriesTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
        });
    });
</script>
@endsection
