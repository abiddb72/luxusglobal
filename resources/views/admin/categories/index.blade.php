@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Categories</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Category
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Categories Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Categories</h3>
        </div>
        <div class="card-body">
            <table id="categoriesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width="50">Sort</th>
                        <th class="text-center" width="50">SR.No</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th >Status</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach($categories as $key => $category)
                        <tr data-id="{{ $category->id }}">
                            <td class="sort-handle text-center" style="cursor:move;">
                                <i class="fas fa-arrows-alt"></i>
                            </td>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                @if($category->type == 1) Package 
                                @elseif($category->type == 2) Religion 
                                @elseif($category->type == 3) Event 
                                @endif
                            </td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- Delete removed --}}
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
    $('#categoriesTable').DataTable({
        paging: true,
        searching: true,
        ordering: false, // disable default ordering for sortable
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [4,5] } // disable sort on sort handle and actions
        ]
    });

    // Make tbody sortable
    $("#sortable").sortable({
        handle: ".sort-handle",
        update: function(event, ui) {
            let order = [];
            $('#sortable tr').each(function(index, element){
                order.push({
                    id: $(element).data('id'),
                    position: index + 1
                });
            });

            // Send AJAX to update order in backend
            $.ajax({
                url: '{{ route("admin.categories.sort") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response){
                    console.log('Sort order updated');
                }
            });
        }
    }).disableSelection();
});
</script>
@endsection
