<div class="container-fluid py-5 ">
    <div class="container text-center">
        <h2 class="mb-5">Our Bank Account Details</h2>

        <div class="d-flex justify-content-around">
            @foreach($global_banks as $bank)
                <div class="p-4 bg-light">
                    <img src="{{ asset('images/banks/'.$bank->image) }}" 
                         class="img-fluid rounded shadow-sm bank-img" 
                         alt="{{ $bank->title }}"
                         width="200" height="200" 
                         data-toggle="modal" data-target="#bankModal{{ $bank->id }}">
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modals for each bank -->
@foreach($global_banks as $bank)
<div class="modal fade" id="bankModal{{ $bank->id }}" tabindex="-1" role="dialog" aria-labelledby="bankModalLabel{{ $bank->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <h5 class="modal-title" id="bankModalLabel{{ $bank->id }}">Bank Account Details</h5>
                <button type="button" class="close position-absolute" style="right:15px;top: 20px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3>{{ $bank->title }}</h3>
                <img src="{{ asset('images/banks/'.$bank->image) }}" class="mb-3 rounded" width="200" height="200" alt="{{ $bank->title }}">
                <p>{!! $bank->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Footer Start -->
<div class="container-fluid bg-navy text-white-50 py-2 px-sm-3 px-lg-5">
    <div class="row pt-5">
        <!-- Logo & Description -->
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/' . $global_settings->footer_logo) }}" width="200" alt="Footer Logo">
            </a>
            <p>{{ $global_settings->description }}</p>

            <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
            <div class="d-flex justify-content-start">
                @foreach (['twitter', 'facebook', 'linkedin', 'instagram', 'youtube'] as $social)
                    @php $link = $global_settings->{$social.'_link'}; @endphp
                    @if($link)
                        <a class="btn btn-outline-primary btn-square mr-2" href="{{ $link }}" target="_blank">
                            <i class="fab fa-{{ $social }}"></i>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Packages -->
        <div class="col-lg-2 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Packages</h5>
            <div class="d-flex flex-column justify-content-start">
                @foreach($package_links as $package)
                    <a href="{{ route('packages.category', $package->slug) }}" class="text-white-50 mb-2">
                        <i class="fa fa-angle-right mr-2"></i>{{ $package->title }}
                    </a>
                @endforeach
            </div>
            <div class="d-flex flex-column justify-content-start">
                @foreach($hajj_umrah_links as $rel)
                    <a href="{{ route('packages.category', $rel->slug) }}" class="text-white-50 mb-2">
                        <i class="fa fa-angle-right mr-2"></i>{{ $rel->title }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Visas -->
        <div class="col-lg-2 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Visas</h5>
            <div class="d-flex flex-column justify-content-start">
                <a href="{{ route('visas.index') }}" class="text-white-50 mb-2">
                    <i class="fa fa-angle-right mr-2"></i>All Countries
                </a>
                @foreach($visa_links as $visa)
                    <a href="{{ route('visas.show', $visa->slug) }}" class="text-white-50 mb-2">
                        @if($visa->country_image)
                            <img src="{{ asset('images/' . $visa->country_image) }}" width="30" class="mr-2"/>
                        @endif
                        {{ $visa->country_title }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Other Links -->
        <div class="col-lg-2 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Other Links</h5>
            <div class="d-flex flex-column justify-content-start">
                <a href="{{ url('blog') }}" class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Blogs</a>
                @foreach($global_pages as $page)
                    <a href="{{ route('page', $page->slug) }}" class="text-white-50 mb-2">
                        <i class="fa fa-angle-right mr-2"></i>{{ $page->title }}
                    </a>
                @endforeach
                <a href="{{ url('contact') }}" class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                <a href="{{ url('career') }}" class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Career</a>
            </div>
        </div>

        <!-- Contact + Newsletter -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
            <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $global_settings->address }}</p>
            <p><i class="fa fa-phone-alt mr-2"></i>{{ $global_settings->contact_no }}</p>
            <p><i class="fa fa-envelope mr-2"></i>{{ $global_settings->email }}</p>

            <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
            <div class="w-100">
                <form action="{{ route('newsletter.store') }}" method="POST">
                    @csrf
                    
                    <div class="input-group-append">
                        <input type="email" name="newsletter_email" class="form-control border-light" style="padding: 25px;" placeholder="Your Email"/>
                        <button type="submit" class="btn btn-primary px-3">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Copyright -->
<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="m-0 text-white-50">{{ $global_settings->footer_text ?? 'All Rights Reserved' }}</p>
        </div>
    </div>
</div>

<!-- WhatsApp Floating Button -->
@if($global_settings->whatsapp_number)
<a href="https://wa.me/{{ $global_settings->whatsapp_number }}" target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i>
</a>
@endif

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif

@if ($errors->any())
<script>
    alert("{{ $errors->first('email') }}");
</script>
@endif