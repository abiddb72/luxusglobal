<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/admin') }}" class="brand-link">
    <div class="login-logo">
      <img src="{{ asset('images/logo.jpg') }}" alt="Admin Logo">
    </div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @php
            $userImage = Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('images/default-avatar.jpg');
        @endphp
        <img src="{{ $userImage }}" width="40" height="40" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        

        <!-- Banks -->
        <li class="nav-item">
          <a href="{{ route('admin.banks.index') }}" class="nav-link {{ request()->is('admin/banks*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-university"></i>
            <p>Banks</p>
          </a>
        </li>

        <!-- Banners -->
        <li class="nav-item">
          <a href="{{ route('admin.banners.index') }}" class="nav-link {{ request()->is('admin/banners*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-image"></i>
            <p>Banners</p>
          </a>
        </li>

        <!-- Banners -->
        <li class="nav-item">
          <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Blogs & Articles</p>
          </a>
        </li>

        <!-- Clients -->
        <li class="nav-item">
          <a href="{{ route('admin.careers.index') }}" class="nav-link {{ request()->is('admin/careers*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Career Applications</p>
          </a>
        </li>

        <!-- Clients -->
        <li class="nav-item">
          <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->is('admin/clients*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Clients & Testimonial</p>
          </a>
        </li>

        <!-- Clients -->
        <li class="nav-item">
          <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-phone"></i>
            <p>Contact Messages</p>
          </a>
        </li>
        
        <!-- Newsletter -->
        <li class="nav-item">
          <a href="{{ route('admin.newsletter.index') }}" class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-envelope-open-text"></i>
            <p>Newsletter Subscribers</p>
          </a>
        </li>

        <!-- Pages -->
        <li class="nav-item">
          <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>Pages</p>
          </a>
        </li>

        

        <!-- Packages Dropdown -->
        <li class="nav-item {{ request()->is('admin/packages*') || request()->is('admin/categories*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/packages*') || request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-suitcase"></i>
            <p>
              Packages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- Categories -->
            <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
            <!-- Packages -->
            <li class="nav-item">
              <a href="{{ route('admin.packages.index') }}" class="nav-link {{ request()->is('admin/packages*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Packages</p>
              </a>
            </li>
            <!-- Packages Queries -->
            <li class="nav-item">
              <a href="{{ route('admin.package_queries.index') }}" class="nav-link {{ request()->is('admin/package_queries*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Packages Queries</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Visas -->
        <li class="nav-item">
          <a href="{{ route('admin.visas.index') }}" class="nav-link {{ request()->is('admin/visas*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-passport"></i>
            <p>Visas</p>
          </a>
        </li>

        <!-- Settings -->
        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Website Settings</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>