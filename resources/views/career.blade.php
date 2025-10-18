@extends('layouts.main')

@section('content')

    <div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('images/career_feature.jpg') }} ), no-repeat center center;background-size: cover;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase mt-4">Career</h3>
                
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" id="contact-section">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Career</h6>
                <h1>Career Application Form</h1>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-10" >
                    <div class="contact-form bg-white" style="padding: 30px;">
                        
                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-row">
                                <div class="control-group col-sm-6 p-2">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control p-4" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="control-group col-sm-6 p-2">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control p-4" name="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            
                            <div class="control-group p-2">
                                <label for="description">Short Description</label>
                                <textarea class="form-control py-3 px-4" rows="5" name="description" placeholder="Short Description"></textarea>
                            </div>

                            <div class="form-group p-2">
                                <label for="resume">Upload Resume (PDF / DOC) Upload Size (Min 300KB) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file" name="resume" accept=".pdf,.doc,.docx" required>
                            </div>

                            <div class="text-center p-2">
                                <button class="btn btn-primary py-3 px-4" type="submit">Submit Application</button>
                            </div>
                        </form>
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