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

    


    <!-- About Start -->
    <div class="container-fluid py-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('theme/img/about.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-secondary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p>Explore the world with our expertly crafted international and domestic travel packages.
Whether you’re planning a global adventure or a local escape, we’ve got you covered.
Discover comfort, value, and unforgettable experiences wherever you go.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <a href="{{ url('packages/domestic') }}"><img class="img-fluid" src="{{ asset('theme/img/about-1.jpg') }}" alt=""></a>
                            </div>
                            <div class="col-6">
                                <a href="{{ url('packages/international') }}"><img class="img-fluid" src="{{ asset('theme/img/about-2.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container my-5">

    <h2 class="text-center mb-4">Worldwide Visa</h2>

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
    <div class="container-fluid py-2">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Your Journey Begins Here</h1>
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
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-4 px-2">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Hajj & Umras</h5>
                        <p class="m-0">Spiritual journeys with peace of mind. Our specialized packages offer complete guidance and compassionate support.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
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

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>International</h1>
            </div>

            <!-- Tabs for each departure city -->
            <ul class="nav nav-pills justify-content-center mb-3" id="internationalSubTab" role="tablist">
                @foreach($grouped_packages as $city => $packages)
                    <li class="nav-item">
                        <a class="nav-link tab-btn {{ $loop->first ? 'active' : '' }}" id="{{ strtolower($city) }}-tab"
                            data-toggle="pill" href="#{{ strtolower($city) }}" role="tab">
                            From {{ $city }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="internationalSubTabContent">
                @foreach($grouped_packages as $city => $packages)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ strtolower($city) }}" role="tabpanel">
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="package-item bg-white mb-2 position-relative">
                                        
                                        @if($package->is_featured)
                                            <div class="ribbon">TOP</div>
                                        @endif

                                        @if($package->expire_date < now())
                                            <div class="ribbon_exp">EXPIRED</div>
                                        @endif
                                        
                                        <img class="img-fluid" src="{{ asset('images/' .$package->image) }}" alt="{{ $package->title }}">
                                        <div class="p-4">
                                            <div class="d-flex justify-content-between flex-wrap mb-3">
                                                <small class="my-2 w-100">
                                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $package->departure_city }}
                                                </small>
                                                <small class="my-2 w-100">
                                                    <i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $package->stay }}
                                                </small>
                                            </div>
                                            <a class="h5 text-decoration-none d-block" style="min-height: 40px;" href="{{ route('package.details', $package->slug) }}">
                                                {{ mb_strimwidth($package->title, 0, 70, '...') }}
                                            </a>
                                            <div class="border-top mt-4 pt-4">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="m-0">Rs {{ number_format($package->price) }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Packages End -->

    <!-- Testimonial Start -->
<div class="container-fluid py-2">
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
                        <p class="mt-5">
                            {{ Str::limit($client->description, 150, '...') }}
                        </p>
                        <h5 class="text-truncate">{{ $client->name }}</h5>
                        <span>{{ $client->profession }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Testimonial End -->


    

      <!-- Blog Start -->
    <div class="container-fluid py-2">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-secondary text-uppercase" style="letter-spacing: 5px;">Our Blog</h6>
                <h1>Latest Articles</h1>
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
</script>

@endsection
