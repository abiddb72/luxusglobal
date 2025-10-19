<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin.profile') }}" class="nav-link">Profile</a>
    </li>
  </ul>

  <!-- Right Navbar (Quick Links) -->
  <ul class="navbar-nav ml-auto">

    <!-- Clients -->
    <li class="nav-item">
      <a href="{{ route('admin.clients.index') }}" class="nav-link" title="Clients">
        <i class="fas fa-users"></i>
      </a>
    </li>

    <!-- Contacts -->
    <li class="nav-item">
      <a href="{{ route('admin.contacts.index') }}" class="nav-link" title="Contact Messages">
        <i class="fas fa-phone"></i>
      </a>
    </li>

    <!-- Newsletter -->
    <li class="nav-item">
      <a href="{{ route('admin.newsletter.index') }}" class="nav-link" title="Newsletter Subscribers">
        <i class="fas fa-envelope-open-text"></i>
      </a>
    </li>

    <!-- Settings -->
    <li class="nav-item">
      <a href="{{ route('admin.settings') }}" class="nav-link" title="Settings">
        <i class="fas fa-cogs"></i>
      </a>
    </li>

    <!-- Profile -->
    <li class="nav-item">
      <a href="{{ route('admin.profile') }}" class="nav-link" title="Profile">
        <i class="fas fa-user"></i>
      </a>
    </li>

    <!-- Fullscreen -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
      <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
          </button>
      </form>
    </li>

  </ul>
</nav>
