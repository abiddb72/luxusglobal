@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Contact Message Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{ $contact->subject }}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td style="white-space: pre-line;">{{ $contact->message }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>
@endsection
