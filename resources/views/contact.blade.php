@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('images/contact_feature.jpg') }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase mt-4">Contact</h3>
            
        </div>
    </div>
</div>

<div class="container-fluid py-5" id="contact-section">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
            <h1>Contact For Any Query</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h3 class="mb-4">Contact Information</h3>
                
                <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $global_settings->address }}</p>
                <p><i class="fa fa-phone-alt mr-2"></i>{{ $global_settings->contact_no }}</p>
                <p><i class="fa fa-envelope mr-2"></i>{{ $global_settings->email }}</p>
            </div>

            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Contact Form --}}
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="control-group col-sm-6 p-2">
                                <input type="text" name="name" class="form-control p-4" placeholder="Your Name" required />
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="control-group col-sm-6 p-2">
                                <input type="email" name="email" class="form-control p-4" placeholder="Your Email" required />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="control-group p-2">
                            <input type="text" name="subject" class="form-control p-4" placeholder="Subject" required />
                            @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="control-group p-2">
                            <textarea name="message" class="form-control py-3 px-4" rows="5" placeholder="Message" required></textarea>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="text-center p-2">
                            <button class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                        </div>
                    </form>
                    {{-- End Form --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@if(session('success') || $errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('contact-section').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });
</script>
@endif