@extends('layouts.main')

@section('content')

<!-- Carousel Start -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class="py-3">{{ $package->title }}</h1>
            <div class="py-5">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @if($package->is_featured)
                            <div class="ribbon">TOP</div>
                        @endif
                        @if($package->expire_date && $package->expire_date < now())
                            <div class="ribbon_exp">EXPIRED</div>
                        @endif
                        <img class="w-100" src="{{ asset('images/' . $package->feature_image) }}" alt="{{ $package->title }}">
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="py-5 mt-5">
            <!-- Description Section -->
            
                <h4 class="mb-3">Package Price Starting From:</h4>
                <h2 class="mb-3 text-primary">PKR {{ number_format($package->price, 0) }}</h2>


                <h4 class="mb-3">Package Details:</h4>
                <p><b>Package Title:</b> {{ $package->title }}</p>

                <p><b>Departure Countries:</b> {{ $package->departure_country ?? 'N/A' }}</p>

                <p><b>Departure Cities:</b> {{ $package->departure_city ?? 'N/A' }}</p>

                <p><b>Destination Countries:</b> {{ $package->destination_country ?? 'N/A' }}</p>

                <p><b>Destination Cities:</b> {{ $package->destination_city ?? 'N/A' }}</p>

                <p><b>Min Allowed:</b> {{ $package->min_person_allowed ?? 'N/A' }} Person</p>

                <p><b>Ticket:</b> {{ $package->ticket ? 'Included' : 'Not Included' }}</p>

                <p><b>Visa:</b> {{ $package->visa ? 'Included' : 'Not Included' }}</p>

                <p><b>Insurance:</b> {{ $package->insurance ? 'Included' : 'Not Included' }}</p>

                <p><b>Stay:</b> {{ $package->stay }}</p>

                <p><b>Hotel Choice:</b> {{ $package->hotel_choice ?? 'N/A' }}</p>

                <p><b>Company:</b> {{ $package->company ?? 'N/A' }}</p>

                <p><b>Rate mentioned:</b> {{ $package->rate_mentioned ?? 'Per Head' }}</p>

                <p><b>Valid Till:</b> {{ $package->expire_date ? $package->expire_date->format('F d, Y') : 'Until Further Notice' }}</p>

                <p><b>Posted on:</b> {{ $package->created_at->format('F d, Y') }}</p>
            </div>
        </div>
        <div class="col-md-12 row" id="accordion">
            <div class="col-md-6">
                <!-- Package Description -->
                @if($package->description)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne">
                                <i class="fas fa-folder-open mr-2 text-success"></i> Package Description
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" >
                        <div class="card-body">{!! $package->description !!}</div>
                    </div>
                </div>
                @endif

                <!-- Package Included -->
                @if($package->package_included)
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                <i class="fas fa-folder-open mr-2 text-success"></i> Package Included
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" >
                        <div class="card-body">{!! $package->package_included !!}</div>
                    </div>
                </div>
                @endif

                <!-- Package Summary -->
                @if($package->package_summary)
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseThree">
                                <i class="fas fa-building mr-2 text-success"></i> Package Summary
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" >
                        <div class="card-body">{!! $package->package_summary !!}</div>
                    </div>
                </div>
                @endif
                <!-- Exclusions -->
                @if($package->package_exclusions)
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFour">
                                <i class="fas fa-file mr-2 text-success"></i> Package Exclusions
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" >
                        <div class="card-body">{!! $package->package_exclusions !!}</div>
                    </div>
                </div>
                @endif

                <!-- Terms -->
                @if($package->terms_condition)
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFive">
                                <i class="fas fa-file mr-2 text-success"></i> Terms and Condition
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" >
                        <div class="card-body">{!! $package->terms_condition !!}</div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <!--Inquiry Form-->
                <div class="py-2">
                <div class="text-center mb-3 pb-3">
                    <h3>Contact For Any Query</h3>
                </div>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="contact-form bg-white" style="padding: 30px;">

                            <!-- Success & Error Messages -->
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('package.inquiry.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">

                                <div class="form-row">
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="text" class="form-control p-4" name="name" placeholder="Your Name"
                                            required />
                                    </div>
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="email" class="form-control p-4" name="email" placeholder="Your Email"
                                            required />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="tel" class="form-control p-4" name="phone" placeholder="Phone No"
                                            required />
                                    </div>
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="text" class="form-control p-4" name="address" placeholder="Address"
                                            required />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="date" class="form-control p-4" name="travel_date" placeholder="Travel Date" min="{{ date('Y-m-d') }}" 
                                            required />
                                    </div>
                                    <div class="control-group col-sm-6 p-2">
                                        <input type="number" class="form-control p-4" name="no_of_person" placeholder="No of Person"
                                            required />
                                    </div>
                                </div>

                                <div class="control-group p-2">
                                    <input type="text" class="form-control p-4" name="destination_address" placeholder="Destination Address"
                                        required />
                                </div>

                                <div class="control-group p-2">
                                    <textarea class="form-control py-3 px-4" rows="5" name="message" placeholder="Message" required></textarea>
                                </div>

                                <div class="text-center p-2">
                                    <button class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


    <!-- Contact Info -->
    {{-- <div class="card">
        <div class="card-header" id="headingSix">
            <h5 class="mb-0">
                <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseSix">
                    <i class="fas fa-bookmark mr-2 text-success"></i> Contact Info
                </button>
            </h5>
        </div>
        <div id="collapseSix" class="collapse" >
            <div class="card-body">
                <p><b>UAN:</b> {{ $package->uan ?? '+92 000 0000000' }}</p>
                <p><b>WhatsApp:</b> {{ $package->whatsapp ?? '+92 000 0000000' }}</p>
            </div>
        </div>
    </div> --}}



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
