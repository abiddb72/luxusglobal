@extends('layouts.main')

@section('content')

<div class="container py-5">

    <!-- TITLE -->
    <div class="text-center mb-5">
        <h1 class="font-weight-bold">Client Testimonial</h1>
    </div>

    <div class="row justify-content-center py-4">
        <div class="col-md-12 text-center">

            <!-- MAIN IMAGE -->
            <img src="{{ asset('images/' . $client->image) }}"
                class="main-img mb-3"
                alt="{{ $client->name }}">

            <!-- NAME -->
            <h2 class="font-weight-bold">{{ $client->name }}</h2>

            <!-- PROFESSION -->
            <h5 class="text-muted">{{ $client->profession }}</h5>

            <!-- ⭐ DYNAMIC RATING -->
            <div class="my-3">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $client->rating)
                        <i class="fas fa-star star"></i>     <!-- Filled -->
                    @else
                        <i class="far fa-star star star-grey"></i> <!-- Grey -->
                    @endif
                @endfor
            </div>

            <!-- DESCRIPTION -->
            <p class="lead">
                {{ $client->description }}
            </p>

        </div>
    </div>

    <!-- ✅ THUMBNAIL IMAGES (4 images) -->
    <div class="container-fluid">
        <div class="row">

            @forelse ($gallery as $img)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('images/' . $img->image) }}"
                        class="thumb-img"
                        onclick="openLightbox(this.src)">
                </div>
            @empty
                <p class="text-muted">No gallery images available.</p>
            @endforelse

        </div>
    </div>

    
</div>




<!-- ✅ LIGHTBOX MODAL -->
<div class="modal fade" id="lightboxModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" style="font-size: 5em; outline:none;border:none; color:red !important;" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        
        <div class="modal-content bg-dark">
            <div class="modal-body p-2">
                <img id="lightboxImg" src="" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-2">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
            <h1>What Say Our Clients</h1>
        </div>

        <div class="owl-carousel testimonial-carousel">
            @foreach($clients as $client)
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto"
                         src="{{ asset('images/' . $client->image) }}"
                         style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">

                    <div class="testimonial-text bg-white p-4 mt-n5">

                        <!-- ⭐ Rating Stars Start -->
                        <div class="mb-2 mt-5">
                            @php
                                $rating = $client->rating; // value from DB (1–5)
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $rating)
                                    <!-- Filled Star -->
                                    <i class="fas fa-star" style="color: #f6b500; font-size: 18px;"></i>
                                @else
                                    <!-- Empty Star -->
                                    <i class="far fa-star" style="color: #ccc; font-size: 18px;"></i>
                                @endif
                            @endfor
                        </div>
                        <!-- ⭐ Rating Stars End -->

                        <a href="{{ route('client.show', $client->slug) }}">
                            <h5 class="text-truncate">{{ $client->name }}</h5>
                        </a>

                        <span>{{ $client->profession }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Testimonial End -->
@endsection
@section('scripts')
<script>
    // ✅ Lightbox open function
    function openLightbox(src) {
        document.getElementById("lightboxImg").src = src;
        $("#lightboxModal").modal("show");
    }
</script>
@endsection