<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title>{{ $global_settings->meta_title ?? 'Luxus Global' }}</title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta Keywords & Description -->
    <meta name="keywords" content="{{ $global_settings->meta_keywords ?? 'travel, tours, luxus' }}">
    <meta name="description" content="{{ $global_settings->meta_description ?? 'Best Travel and Tours Agency' }}">

    <!-- Favicon -->
    @if($global_settings->favicon)
        <link rel="icon" href="{{ asset('images/' . $global_settings->favicon) }}">
    @else
        <link rel="icon" href="{{ asset('images/favicon.jpg') }}">
    @endif

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
</head>

<body>

  {{-- Navbar --}}
  @include('layouts.partials.navbar')

  @yield('content')
          
  {{-- Footer --}}
  @include('layouts.partials.footer')

<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('theme/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('theme/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('theme/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('theme/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
