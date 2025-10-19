@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3 class="mb-4">My Profile</h3>

    <div class="row">
        <!-- ================= Profile Information ================= -->
        <div class="col-md-6">
            <div class="card card-body mb-4">
                <h5>Profile Details</h5>

                <!-- Validation Errors -->
                @if ($errors->hasBag('profileErrors'))
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->profileErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-center mb-3">
                        @php
                            $userImage = $user->image ? asset('images/'.$user->image) : asset('images/default-avatar.jpg');
                        @endphp
                        <img src="{{ $userImage }}" 
                             alt="Profile Image" 
                             class="rounded-circle" 
                             width="100" height="100" 
                             style="object-fit: cover;">
                    </div>

                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" 
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" 
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone No <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control"
                               maxlength="15"
                               pattern="^[0-9+\-\s]+$"
                               title="Only numbers, +, - and spaces allowed"
                               value="{{ old('phone', $user->phone) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Profile Image (Recommended: 100 x 100 px)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="form-text text-muted">Allowed types: jpg, jpeg, png | Max size: 50KB</small>
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>

                    <button class="btn btn-primary mt-2" type="submit">
                        <i class="fa fa-save"></i> Update Profile
                    </button>

                </form>
            </div>
        </div>

        <!-- ================= Change Password ================= -->
        <div class="col-md-6">
            <div class="card card-body mb-4">
                <h5>Change Password</h5>

                <!-- Validation Errors -->
                @if ($errors->hasBag('passwordErrors'))
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->passwordErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @csrf

                    <div class="form-group position-relative">
                        <label>Current Password <span class="text-danger">*</span></label>
                        <input type="password" id="current_password" name="current_password" 
                            class="form-control" value="{{ old('current_password') }}" required>
                        <span class="fa fa-eye toggle-password" data-target="#current_password" 
                            style="position:absolute; right:15px; top:45px; cursor:pointer;"></span>
                    </div>

                    <div class="form-group position-relative">
                        <label>New Password <span class="text-danger">*</span></label>
                        <input type="password" id="new_password" name="new_password" 
                            class="form-control" value="{{ old('new_password') }}" required>
                        <span class="fa fa-eye toggle-password" data-target="#new_password" 
                            style="position:absolute; right:15px; top:45px; cursor:pointer;"></span>
                    </div>

                    <div class="form-group position-relative">
                        <label>Confirm New Password <span class="text-danger">*</span></label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                            class="form-control" value="{{ old('new_password_confirmation') }}" required>
                        <span class="fa fa-eye toggle-password" data-target="#new_password_confirmation" 
                            style="position:absolute; right:15px; top:45px; cursor:pointer;"></span>
                    </div>

                    <button class="btn btn-warning mt-2" type="submit">
                        <i class="fa fa-key"></i> Update Password
                    </button>

                </form>
            </div>
        </div>

    </div>

</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(function(element) {
        element.addEventListener('click', function() {
            let input = document.querySelector(this.getAttribute('data-target'));
            if (input.type === "password") {
                input.type = "text";
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
</script>
@endsection
