<!-- Topbar Start -->
<div class="container-fluid bg-dark pt-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <p><i class="fa fa-envelope mr-2"></i>{{ $global_settings->email }}</p>
                    <p class="text-body px-3">|</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>{{ $global_settings->contact_no }}</p>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    @if($global_settings->facebook_link)
                        <a class="text-primary px-3" href="{{ $global_settings->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($global_settings->twitter_link)
                        <a class="text-primary px-3" href="{{ $global_settings->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($global_settings->linkedin_link)
                        <a class="text-primary px-3" href="{{ $global_settings->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if($global_settings->instagram_link)
                        <a class="text-primary px-3" href="{{ $global_settings->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($global_settings->youtube_link)
                        <a class="text-primary pl-3" href="{{ $global_settings->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0 bg-dark">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-navy navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/' . $global_settings->header_logo) }}" width="160" alt="Logo">
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('page/about-us') }}" class="nav-item nav-link">About</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Visas</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="{{ route('visas.index') }}" class="dropdown-item">All Countries</a>

                            @foreach($visa_links as $visa)
                                <a href="{{ route('visas.show', $visa->slug) }}" class="dropdown-item d-flex align-items-center">
                                    @if($visa->country_image)
                                        <img src="{{ asset('images/' . $visa->country_image) }}" width="30" class="mr-2"/>
                                    @endif
                                    {{ $visa->country_title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Packages Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Packages</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            @foreach($package_links as $pkg)
                                <a href="{{ route('packages.category', $pkg->slug) }}" class="dropdown-item">
                                    {{ $pkg->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Hajj & Umrah / Religion -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hajj & Umrah</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            @foreach($hajj_umrah_links as $rel)
                                <a href="{{ route('packages.category', $rel->slug) }}" class="dropdown-item">
                                    {{ $rel->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Events -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Events</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            @foreach($events_links as $event)
                                <a href="{{ route('packages.category', $event->slug) }}" class="dropdown-item">
                                    {{ $event->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
                    <a href="{{ url('career') }}" class="nav-item nav-link">Career</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
