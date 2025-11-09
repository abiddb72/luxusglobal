@extends('layouts.main')

@section('content')
  <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title }}">
                    
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
    <form action="{{ route('packages.search') }}" method="GET">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 20px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    
                    <div class="col-md-10 py-4">
                        <div class="row">

                            <!-- Category Dropdown -->
                            
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select name="cat_id" class="custom-select px-4" style="height: 47px;">
                                        <option selected disabled>Category</option>
                                        @foreach($all_links as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Min Days -->
                            <div class="col-md-2">
                                <div class="mb-3 mb-md-0">
                                    <input type="number" name="min_days" class="form-control py-4" placeholder="Min Days" min="1">
                                </div>
                            </div>

                            <!-- Max Days -->
                            <div class="col-md-2">
                                <div class="mb-3 mb-md-0">
                                    <input type="number" name="max_days" class="form-control py-4" placeholder="Max Days" min="1">
                                </div>
                            </div>

                            <!-- PRICE RANGE -->
                            <div class="wrapper col-md-5">
                                <div class="price-input">
                                    <div class="field">
                                        <span>Min</span>
                                        <input type="number" name="min_price" class="input-min" value="1250000">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <span>Max</span>
                                        <input type="number" name="max_price" class="input-max" value="5750000">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="50000" max="10000000" value="1250000" step="100">
                                    <input type="range" class="range-max" min="50000" max="10000000" value="5750000" step="100">
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">
                            Find Now
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>


    <!-- Booking End -->

    

<div class="container">
    <div class="text-center mb-3 pb-3">
        <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Travel The World Today</h5>
        <h1>Top travel deals for every budget.</h1>
    </div>
    <div class="row">

        @foreach($all_packages as $package)
            <div class="col-md-4 mb-4">
                <div class="card listing-card">

                    <!-- IMAGE + BADGE -->
                    <div class="position-relative">
                        <img src="{{ asset('images/' . $package->image) }}"
                            class="card-img-top listing-img" alt="Package Image">

                        @if(!empty($package->is_featured))
                            <span class="badge badge-dark badge-custom">Top</span>
                        @endif

                        @if($package->expire_date && $package->expire_date < now())
                            <span class="badge badge-danger badge-custom-exp">Expired</span>
                        @endif

                        
                    </div>

                    <!-- BODY -->
                    <div class="card-body">
                        
                        <!-- TITLE -->
                        <a href="{{ route('package.details', $package->slug) }}">
                            <h5 class="h5 text-decoration-none d-block" style="min-height: 40px;">
                                {{ mb_strimwidth($package->title, 0, 70, '...') }}
                            </h5>
                        </a>

                        <!-- PRICE -->
                        <p class="price-tag mb-3">Rs {{ number_format($package->price, 0) }}</p>

                        <!-- LOCATION & DATE -->
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fas fa-map-marker-alt text-danger" style="font-size: 14px;"></i>
                                <i class="text-dark" style="font-size: 14px;">{{ $package->departure_city }}</i>
                            </div>
                            <div class="col-md-6 text-right">
                                <i class="fas fa-calendar-alt text-primary" style="font-size: 14px;"></i>
                                <i class="text-dark" style="font-size: 14px;">
                                    {{ \Carbon\Carbon::parse($package->stay)->format('d M Y') }}
                                </i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="container my-5">

    <div class="text-center mb-3 pb-3">
        <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Trusted Global Visa Experts</h5>
        <h1>Professional Support For All International Journeys</h1>
    </div>

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
    <div class="text-center mb-3 pb-3">
                <a href="{{ route('visas.index') }}" class="h4 text-dark">View All</a>
            </div>
</div>
    

    

    <!-- Service Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Our Professional Services</h5>
                <h1>Delivering Quality Solutions With Reliable Expert Support</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-file mx-auto mb-4"></i>
                        <h5 class="mb-2">Visas</h5>
                        <p class="m-0">Navigate the world with ease. We handle complex visa processes for a smooth, stress-free journey.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Secure the best fares for flights worldwide. We find you the perfect itinerary, whether for business or leisure.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Hotel Booking</h5>
                        <p class="m-0">Discover your ideal stay, from luxury resorts to cozy budget hotels. We ensure comfort and value at every destination.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Hajj & Umrah</h5>
                        <p class="m-0">Spiritual journeys with peace of mind. Our specialized packages offer complete guidance and compassionate support.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Tours Domestic & International</h5>
                        <p class="m-0">Curated tours to hidden gems and landmarks. Creating unforgettable memories across the world.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                        <h5 class="mb-2">Convenience</h5>
                        <p class="m-0">Your one-stop travel solution. We save time and effort, making planning simple and efficient.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Meeting & Board Rooms</h5>
                        <p class="m-0">Perfect professional spaces for your meetings. We book well-equipped board rooms in prime locations.

</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-calendar mx-auto mb-4"></i>
                        <h5 class="mb-2">Events Management</h5>
                        <p class="m-0">Turning visions into reality. We handle all details for seamless conferences, weddings, and events.



</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Service End -->

    

    <!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-3 pb-3">
            <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Client Testimonials & Feedback</h5>
            <h1>Honest Reviews Reflecting Our Quality Service</h1>
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

<div class="container-fluid py-5 bg-light">

    <!-- HEADING -->
    <div class="text-center mb-4">
        <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Our Airline Partners</h5>
                <h1>Connecting You With Trusted Global Airlines</h1>
    </div>

    <!-- Repeat these cols for all 10 images -->
    <div class="airline-wrapper">
        <img src="{{ asset('images/airlines/air_arabia.jpg') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/air_china.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/airblue.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/airfrance.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/american.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/british.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/cathey.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/china_southern.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/eitihad.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/emirates.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/flydubai.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/gulf.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/Japan_Airlines_log.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/kuwait.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/malaysia.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/malindo-airlines.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/oman.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/PIA.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/qantas.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/qatar.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/royal_brunei.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/royal_dutch.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/saudia.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/shaheenair.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/singapore.jpg') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/srilanka.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/Thai.png') }}" class="airline-img" alt="Airline Logo">
        <img src="{{ asset('images/airlines/turkish_air.png') }}" class="airline-img" alt="Airline Logo">
    </div>

        
</div>
    

      <!-- Blog Start -->
    <div class="container-fluid py-2">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Latest Articles & Blog Updates</h5>
                <h1>Fresh Insights Shared To Inspire Your Journey</h1>
            </div>
            <div class="row pb-3">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-0">
                                        {{ $blog->created_at->format('d M') }}
                                    </h6>
                                    <small class="text-white">{{ $blog->created_at->format('Y') }}</small>
                                </div>
                            </div>
                            <div class="bg-white p-4">
                                <div class="d-flex mb-2">
                                    <div class="text-primary text-uppercase text-decoration-none font-weight-bold" >By {{ $blog->author }}</div>
                                </div>
                                {{ Str::limit(strip_tags($blog->title), 25) }}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="text-center mb-3 pb-3">
                <a href="{{ route('blog.index') }}" class="h4 text-dark">View All</a>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- ✅ THUMBNAIL IMAGES (4 images) -->
    <div class="container">
        <div class="text-center mb-3 py-3">
                <h5 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Journey Through Our Happy Clients</h5>
                <h1>Capturing moments from clients’ amazing travel experiences</h1>
            </div>
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

    
@endsection
@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
  const rangeInputs = document.querySelectorAll(".range-input input");
  const priceInputs = document.querySelectorAll(".price-input input");
  const range = document.querySelector(".slider .progress");
  const priceGap = 1000;

  function updateProgress(minVal, maxVal) {
    const maxRange = parseInt(rangeInputs[0].max);
    range.style.left = (minVal / maxRange) * 100 + "%";
    range.style.right = 100 - (maxVal / maxRange) * 100 + "%";
  }

  // Sync numeric inputs → range slider
  priceInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minPrice = parseInt(priceInputs[0].value) || 0;
      let maxPrice = parseInt(priceInputs[1].value) || 0;

      if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInputs[1].max) {
        if (e.target.classList.contains("input-min")) {
          rangeInputs[0].value = minPrice;
        } else {
          rangeInputs[1].value = maxPrice;
        }
        updateProgress(minPrice, maxPrice);
      }
    });
  });

  // Sync range slider → numeric inputs
  rangeInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(rangeInputs[0].value);
      let maxVal = parseInt(rangeInputs[1].value);

      if (maxVal - minVal < priceGap) {
        if (e.target.classList.contains("range-min")) {
          rangeInputs[0].value = maxVal - priceGap;
        } else {
          rangeInputs[1].value = minVal + priceGap;
        }
      } else {
        priceInputs[0].value = minVal;
        priceInputs[1].value = maxVal;
        updateProgress(minVal, maxVal);
      }
    });
  });

  // ✅ Initialize range progress correctly on page load
  const initialMin = parseInt(priceInputs[0].value) || parseInt(rangeInputs[0].min);
  const initialMax = parseInt(priceInputs[1].value) || parseInt(rangeInputs[1].max);
  updateProgress(initialMin, initialMax);
});


    // ✅ Lightbox open function
    function openLightbox(src) {
        document.getElementById("lightboxImg").src = src;
        $("#lightboxModal").modal("show");
    }
</script>

@endsection
