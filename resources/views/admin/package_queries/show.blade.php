@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Package Query Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.package_queries.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="card shadow-sm">
        
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="25%">Package Title</th>
                    <td>{{ $query->package->title }}</td>
                </tr>
                <tr>
                    <th width="25%">Name</th>
                    <td>{{ $query->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $query->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $query->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $query->address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ \Carbon\Carbon::parse($query->date)->format('d M, Y') }}</td>
                </tr>
                <tr>
                    <th>No. of Persons</th>
                    <td>{{ $query->no_of_person }}</td>
                </tr>
                <tr>
                    <th>Destination Address</th>
                    <td>{{ $query->destination_address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($query->status == 0)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($query->status == 1)
                            <span class="badge badge-success">Completed</span>
                        @elseif($query->status == 2)
                            <span class="badge badge-danger">Cancelled</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td style="white-space: pre-line;">{{ $query->message ?? 'N/A' }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>
@endsection
