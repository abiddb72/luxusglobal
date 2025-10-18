@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Edit Package</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Packages
            </a>
        </div>
    </div>

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

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $package->title) }}" required>
                </div>

                <!-- Category / Featured / Price -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Category <span class="text-danger">*</span></label>
                        <select name="cat_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $package->cat_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Is Featured?</label>
                        <select name="is_featured" class="form-control">
                            <option value="0" {{ $package->is_featured == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $package->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
                    </div>
                </div>

                <!-- Summernote Fields -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote">{{ old('description', $package->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Package Included</label>
                    <textarea name="package_included" class="form-control summernote">{{ old('package_included', $package->package_included) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Package Summary</label>
                    <textarea name="package_summary" class="form-control summernote">{{ old('package_summary', $package->package_summary) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Package Exclusions</label>
                    <textarea name="package_exclusions" class="form-control summernote">{{ old('package_exclusions', $package->package_exclusions) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Terms & Conditions</label>
                    <textarea name="terms_condition" class="form-control summernote">{{ old('terms_condition', $package->terms_condition) }}</textarea>
                </div>

                <!-- Images -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Feature Image (Recommended: 1200 x 400 px)</label>
                        <input type="file" name="feature_image" class="form-control">
                        <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 200KB</small>
                        @if($package->feature_image)
                            <img src="{{ asset("images/" . $package->feature_image) }}" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label>Image (Recommended: 400 x 350 px)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                        @if($package->image)
                            <img src="{{ asset("images/" . $package->image) }}" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                </div>

                <!-- Departure & Destination -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Departure Country <span class="text-danger">*</span></label>
                        <input type="text" name="departure_country" class="form-control" value="{{ old('departure_country', $package->departure_country) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Departure City <span class="text-danger">*</span></label>
                        <select name="departure_city" class="form-control" required>
                            <option value="">Select City</option>
                            <option value="Karachi" {{ old('departure_city', $package->departure_city) == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                            <option value="Lahore" {{ old('departure_city', $package->departure_city) == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                            <option value="Islamabad" {{ old('departure_city', $package->departure_city) == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Destination Country <span class="text-danger">*</span></label>
                        <input type="text" name="destination_country" class="form-control" value="{{ old('destination_country', $package->destination_country) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Destination City <span class="text-danger">*</span></label>
                        <input type="text" name="destination_city" class="form-control" value="{{ old('destination_city', $package->destination_city) }}" required>
                    </div>
                </div>

                <!-- Person / Ticket / Visa / Insurance -->
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Min Person Allowed <span class="text-danger">*</span></label>
                        <select name="min_person_allowed" class="form-control" required>
                            @for($i=1;$i<=50;$i++)
                                <option value="{{ $i }}" {{ $package->min_person_allowed == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Ticket <span class="text-danger">*</span></label>
                        <select name="ticket" class="form-control" required>
                            <option value="1" {{ $package->ticket == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $package->ticket == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Visa <span class="text-danger">*</span></label>
                        <select name="visa" class="form-control" required>
                            <option value="1" {{ $package->visa == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $package->visa == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Insurance <span class="text-danger">*</span></label>
                        <select name="insurance" class="form-control" required>
                            <option value="1" {{ $package->insurance == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $package->insurance == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <!-- Stay / Hotel -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Stay (Days) <span class="text-danger">*</span></label>
                        <select name="stay" class="form-control" required>
                            @for($i=1;$i<=100;$i++)
                                <option value="{{ $i }}" {{ intval($package->stay) == $i ? 'selected' : '' }}>{{ $i }} Day</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hotel Choice <span class="text-danger">*</span></label>
                        <select name="hotel_choice" class="form-control" required>
                            @for($i=1;$i<=5;$i++)
                                <option value="{{ $i }}" {{ intval($package->hotel_choice) == $i ? 'selected' : '' }}>{{ $i }} Star</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Company / Rate / Date / Status -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company <span class="text-danger">*</span></label>
                        <input type="text" name="company" class="form-control" value="{{ old('company', $package->company) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Rate Mentioned <span class="text-danger">*</span></label>
                        <select name="rate_mentioned" class="form-control" required>
                            <option value="1" {{ $package->rate_mentioned == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $package->rate_mentioned == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Expire Date <span class="text-danger">*</span></label>
                        <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date', \Carbon\Carbon::parse($package->expire_date)->format('Y-m-d')) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $package->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $package->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Package
                </button>
            </form>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.css') }}">
<script src="{{ asset('admin_theme/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>
@endsection
