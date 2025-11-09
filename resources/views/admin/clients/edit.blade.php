@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h3>Edit Client</h3>

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

            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <!-- NAME -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
                </div>

                <!-- PROFESSION -->
                <div class="form-group">
                    <label>Profession <span class="text-danger">*</span></label>
                    <input type="text" name="profession" value="{{ $client->profession }}" class="form-control" required>
                </div>

                <!-- RATING -->
                <div class="form-group">
                    <label>Rating <span class="text-danger">*</span></label>
                    <select name="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        @for ($i=1; $i<=5; $i++)
                            <option value="{{ $i }}" {{ $client->rating == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>

                <!-- IMAGE -->
                <div class="form-group">
                    <label>Current Image</label><br>
                    @if($client->image)
                        <img src="{{ asset('images/'.$client->image) }}" width="80"><br><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-muted">Allowed: jpg, jpeg, png | Max size: 50KB</small>
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $client->description }}</textarea>
                </div>

                <!-- STATUS -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- GALLERY SECTION -->
                <hr>
                <h5 class="mt-3 mb-3">Gallery (Max 12 Images) | Each Image (Recommended: 1000 x 600 px) | Allowed types: jpg, jpeg, png | Max size: 200KB</h5>
                

                <div class="row" id="gallery-container">
                    @foreach($galleries as $gallery)
                        <div class="col-md-3 text-center mb-3" id="gallery-{{ $gallery->id }}">
                            <img src="{{ asset('images/'.$gallery->image) }}" width="100" class="mb-2"><br>
                            <button type="button" class="btn btn-sm btn-danger remove-gallery-btn" data-id="{{ $gallery->id }}">
                                Remove
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- ADD NEW GALLERY IMAGES -->
                <div id="gallery-wrapper">
                    <div class="gallery-item mb-2 d-flex">
                        <input type="file" name="gallery_images[]" class="form-control" style="width:90%;" accept="image/*">
                        <button type="button" class="btn btn-danger btn-sm ml-2 remove-btn" style="display:none;">Remove</button>
                    </div>
                </div>

                <button type="button" id="add-gallery-btn" class="btn btn-success btn-sm mt-2">
                    + Add More
                </button>

                <hr>
                <button type="submit" class="btn btn-primary">Update Client</button>

            </form>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    let maxGallery = 12;

    // Add new gallery input
    document.getElementById('add-gallery-btn').addEventListener('click', function () {
        let totalItems = document.querySelectorAll('#gallery-wrapper .gallery-item').length;
        let existing = {{ count($galleries) }};

        if (totalItems + existing >= maxGallery) {
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

    // Remove newly added gallery input
    function updateRemoveButtons() {
        let removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(btn => {
            btn.style.display = 'inline-block';
            btn.onclick = function () {
                btn.parentElement.remove();
            }
        });
    }

    updateRemoveButtons();

    // AJAX delete existing gallery image
    document.querySelectorAll('.remove-gallery-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!confirm('Delete this image?')) return;

            let galleryId = this.dataset.id;
            let token = "{{ csrf_token() }}";

            fetch("{{ url('admin/gallery/delete') }}/" + galleryId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    document.getElementById('gallery-' + galleryId).remove();
                } else {
                    alert('Something went wrong!');
                }
            })
            .catch(error => {
                alert('Something went wrong!');
            });
        });
    });
</script>
@endsection
