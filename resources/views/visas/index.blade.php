@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('images/visa_feature.jpg') }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase mt-4">Visa</h3>
        </div>
    </div>
</div>

<div class="container my-5">

    <h2 class="text-center mb-4">Visa Countries List</h2>

    <div class="row">
        @forelse($visas as $visa)
            <div class="col-md-6 mb-4">
                <a href="{{ url('visa/' . $visa->slug) }}" class="text-decoration-none text-dark">
                    <div class="d-flex align-items-center border p-3 rounded shadow-sm bg-white">
                        
                        @if($visa->country_image)
                            <img src="{{ asset('images/' . $visa->country_image) }}" 
                                 alt="{{ $visa->country_title }}" 
                                 class="mr-3"
                                 style="width: 80px; height: 50px; object-fit: cover; border-radius: 5px;">
                        @endif

                        <h5 class="mb-0">{{ $visa->country_title }}</h5>
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
@endsection
