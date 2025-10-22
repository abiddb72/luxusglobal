@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url({{ asset('images/search_feature.jpg') }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            
            
        </div>
    </div>
</div>
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
                        <option value="{{ $category->id }}" 
                            {{ request('cat_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Min Days -->
        <div class="col-md-2">
            <div class="mb-3 mb-md-0">
                <input type="number" name="min_days" class="form-control py-4" 
                    placeholder="Min Days" min="1" 
                    value="{{ request('min_days') }}">
            </div>
        </div>

        <!-- Max Days -->
        <div class="col-md-2">
            <div class="mb-3 mb-md-0">
                <input type="number" name="max_days" class="form-control py-4" 
                    placeholder="Max Days" min="1" 
                    value="{{ request('max_days') }}">
            </div>
        </div>

        <!-- PRICE RANGE -->
        <div class="wrapper col-md-5">
            <div class="price-input">
                <div class="field">
                    <span>Min</span>
                    <input type="number" name="min_price" class="input-min" 
                        value="{{ request('min_price', 1250000) }}">
                </div>
                <div class="separator">-</div>
                <div class="field">
                    <span>Max</span>
                    <input type="number" name="max_price" class="input-max" 
                        value="{{ request('max_price', 5750000) }}">
                </div>
            </div>
            <div class="slider">
                <div class="progress"></div>
            </div>
            <div class="range-input">
                <input type="range" class="range-min" 
                    name="min_price_range" min="50000" max="10000000" 
                    value="{{ request('min_price', 1250000) }}" step="100">
                <input type="range" class="range-max" 
                    name="max_price_range" min="50000" max="10000000" 
                    value="{{ request('max_price', 5750000) }}" step="100">
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
<div class="container ">
    <h2 class="text-center mb-5">Search Results</h2>

    <div class="row">
        @forelse($packages as $package)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2 position-relative">
                    @if($package->is_featured)
                        <div class="ribbon">TOP</div>
                    @endif
                    @if($package->expire_date && $package->expire_date < now())
                        <div class="ribbon_exp">EXPIRE</div>
                    @endif
                    <img class="img-fluid" src="{{ asset('images/' . $package->image) }}" alt="">
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
                                <h5 class="m-0">Rs {{ number_format($package->price, 0) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center w-100">No packages found.</p>
        @endforelse
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
</script>

@endsection
