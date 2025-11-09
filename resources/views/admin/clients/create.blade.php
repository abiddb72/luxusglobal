@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h3>Add Client</h3>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) 
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- BASIC FIELDS -->
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Profession <span class="text-danger">*</span></label>
                    <input type="text" name="profession" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Rating <span class="text-danger">*</span></label>
                    <select name="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Image (Recommended: 50 x 50 px) <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required>
                    <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- ✅ GALLERY SECTION -->
                <hr>
                <h5 class="mt-3 mb-3">Gallery (Max 12 Images) | Each Image (Recommended: 1000 x 600 px) | Allowed types: jpg, jpeg, png | Max size: 200KB</h5>

                <div id="gallery-wrapper">

                    <!-- First field by default -->
                    <div class="gallery-item mb-2 d-flex">
                        <input type="file" name="gallery_images[]" class="form-control" style="width:90%;" accept="image/*">
                        <button type="button" class="btn btn-danger btn-sm ml-2 remove-btn" style="display:none;">
                            Remove
                        </button>
                    </div>

                </div>

                <!-- Add More Button -->
                <button type="button" id="add-gallery-btn" class="btn btn-success btn-sm mt-2">
                    + Add More
                </button>

                <hr>

                <button type="submit" class="btn btn-primary mt-3">Save Client</button>
            </form>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    let maxGallery = 12;

    document.getElementById('add-gallery-btn').addEventListener('click', function () {
        
        let totalItems = document.querySelectorAll('#gallery-wrapper .gallery-item').length;

        if (totalItems >= maxGallery) {
            alert("Maximum 3 gallery images allowed!");
            return;
        }

        let wrapper = document.createElement('div');
        wrapper.classList.add('gallery-item', 'mb-2', 'd-flex');

        wrapper.innerHTML = `
            <input type="file" name="gallery_images[]" class="form-control" style="width:90%;" accept="image/*">
            <button type="button" class="btn btn-danger btn-sm ml-2 remove-btn">Remove</button>
        `;

        document.getElementById('gallery-wrapper').appendChild(wrapper);

        updateRemoveButtons();
    });

    // Show remove button only on added items
    function updateRemoveButtons() {
        let removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(btn => {
            btn.style.display = 'inline-block';
            btn.onclick = function () {
                btn.parentElement.remove();
            }
        });
    }
</script>
@endsection
