@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url({{ asset('images/' . $category->feature_image) }}), no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">{{ $category->title }}</h3>
        </div>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-5">{{ $title }}</h2>

    {{-- 🌍 INTERNATIONAL TAB VIEW --}}
    @if(!empty($is_tabbed) && $is_tabbed)
        <ul class="nav nav-pills justify-content-center mb-4" id="cityTab" role="tablist">
            @foreach($cities as $index => $c)
                <li class="nav-item">
                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="tab-{{ $index }}" data-toggle="pill" href="#city-{{ $index }}" role="tab">
                        From {{ $c }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($cities as $index => $c)
                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="city-{{ $index }}" role="tabpanel">
                    <div class="row">
                        @forelse($packages_per_city[$c] as $package)
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
                                        <a class="h5 text-decoration-none" href="{{ route('package.details', $package->slug) }}">
                                            {{ $package->title }}
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
                            <p class="text-center w-100">No packages found for {{ $c }}.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>

    {{-- 🕋 NORMAL CATEGORIES VIEW --}}
    @else
        <div class="row">
            @foreach($packages as $package)
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
                            <a class="h5 text-decoration-none" href="{{ route('package.details', $package->slug) }}">
                                {{ $package->title }}
                            </a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="m-0">Rs {{ number_format($package->price, 0) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $packages->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection
