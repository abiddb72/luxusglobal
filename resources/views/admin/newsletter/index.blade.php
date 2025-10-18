@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Newsletter Subscribers</h3>
    <table id="newsletterTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SR</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $key => $n)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $n->email }}</td>
                <td>{{ $n->created_at->format('d M, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $('#newsletterTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
        });
    });
</script>
@endsection
