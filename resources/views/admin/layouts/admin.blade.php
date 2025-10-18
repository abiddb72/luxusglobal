<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="{{ asset('admin_theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_theme/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_theme/dist/css/adminlte.min.css') }}">

  <style>
    .login-logo img {
      width: 170px;
      height: auto;
      margin-bottom: 10px;
    }
    [class*=sidebar-dark-] {
      background-color: #001f3f;
    }
    .form-control {
      height: calc(2.25rem + 8px);
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- Navbar --}}
  @include('admin.layouts.partials.navbar')

  {{-- Sidebar --}}
  @include('admin.layouts.partials.sidebar')

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  {{-- Footer --}}
  @include('admin.layouts.partials.footer')

</div>

<!-- JS -->
<script src="{{ asset('admin_theme/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_theme/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('admin_theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- Allow page specific scripts --}}
@yield('scripts')

</body>
</html>
