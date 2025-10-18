<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE & Font Awesome CSS -->
  <link rel="stylesheet" href="{{ asset('admin_theme/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_theme/dist/css/adminlte.min.css') }}">

  <style>
    .login-logo img {
      width: 200px;
      height: auto;
      margin-bottom: 10px;
    }
    .login-box-msg {
      font-size: 15px;
      color: #555;
    }
    .login-page, .register-page {
    background-color: #001f3f;
  }
  </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <!-- Logo Section -->
  <div class="login-logo">
    <img src="{{ asset('images/logo.jpg') }}" alt="Admin Logo">
  </div>

  <!-- Login Card -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Welcome back! Please sign in to access your dashboard.</p>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="input-group mb-3">
          
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS Files -->
<script src="{{ asset('admin_theme/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_theme/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
