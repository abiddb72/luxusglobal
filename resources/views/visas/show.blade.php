@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('images/' . $visa->feature_image) }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase mt-4">{{ $visa->country_title }}</h3>
        </div>
    </div>
</div>
<h2 class="text-center py-5">Visa Information</h2>


<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4 ">{{ $visa->country_title }} </h2>
            <div id="accordion">

            <!-- Visa Description -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                    <button class="btn btn-link d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-passport mr-2 text-primary"></i> Visa Description
                    </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                @if($visa->country_image)
                                    <img src="{{ asset('images/' . $visa->country_image) }}" width="100%" alt="{{ $visa->country_title }}">
                                @endif
                            </div>
                            <div class="col-10">
                                {!! nl2br(e($visa->visa_description)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Embassy Requirements -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                    <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-university mr-2 text-success"></i> Embassy Requirements
                    </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        {!! nl2br(e($visa->embassy_requirements)) !!}
                    </div>
                </div>
            </div>

            <!-- Duration of Stay / Visa Processing Timing -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                    <button class="btn btn-link d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-clock mr-2 text-danger"></i> Duration of Stay / Visa Processing Timing
                    </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        {!! nl2br(e($visa->duration_description)) !!}
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="col-md-4">
            <div class="row">
            <h2 class="text-center mb-4 w-100">Visa Countries List</h2>
            @forelse($all_visas as $country)
                <div class="col-md-6 mb-2">
                    <a href="{{ url('visa/' . $country->slug) }}" class="text-decoration-none text-dark">
                        <div class="d-flex align-items-center border p-2 rounded shadow-sm bg-white">
                            
                            @if($country->country_image)
                                <img src="{{ asset('images/' . $country->country_image) }}" 
                                    alt="{{ $country->country_title }}" 
                                    class="mr-3"
                                    style="width: 50px; height: 35px; object-fit: cover; border-radius: 5px;">
                            @endif

                            <h5 class="mb-0"><a href="{{ url('visa/' . $country->slug) }}" class=" text-dark">{{ $country->country_title }}</a></h5>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No visa countries available.</p>
                </div>
            @endforelse
            </div>
        </div>
    </div>

    
</div>
@endsection
