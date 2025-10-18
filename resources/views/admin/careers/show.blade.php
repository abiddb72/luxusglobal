@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Career Application Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $career->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $career->email }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td style="white-space: pre-line;">{{ $career->description ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Resume</th>
                    <td>
                        @if($career->resume)
                            <a href="{{ asset('resumes/' . $career->resume) }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-download"></i> View / Download Resume
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Applied On</th>
                    <td>{{ $career->created_at->format('d M, Y h:i A') }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection
