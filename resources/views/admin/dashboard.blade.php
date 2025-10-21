@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h2 class="mb-4">Dashboard Overview</h2>

    <div class="row">

        <!-- Total Packages -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data['total_packages'] }}</h3>
                    <p>Total Packages</p>
                </div>
                <div class="icon">
                    <i class="fas fa-suitcase"></i>
                </div>
                <a href="{{ route('admin.packages.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Package Queries -->
        {{-- <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $data['total_queries'] }}</h3>
                    <p>Package Enquiries</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <a href="{{ route('admin.package_queries.index') }}" class="small-box-footer">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> --}}

        <!-- Total Visas -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $data['total_visas'] }}</h3>
                    <p>Total Visas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-passport"></i>
                </div>
                <a href="{{ route('admin.visas.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Blogs Messages -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $data['total_blog'] }}</h3>
                    <p>Blogs & Articles</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Contact Messages -->
        {{-- <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $data['total_contacts'] }}</h3>
                    <p>Contact Messages</p>
                </div>
                <div class="icon">
                    <i class="fas fa-phone"></i>
                </div>
                <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> --}}

        <!-- Newsletter Subscribers -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $data['total_newsletter'] }}</h3>
                    <p>Newsletter Subscribers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <a href="{{ route('admin.newsletter.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        

    </div>

    <!-- Welcome Note -->
    <div class="card mt-4">
        <div class="card-body">
            <h4>Welcome Back, {{ Auth::user()->name }} 👋</h4>
            <p>Manage and customize every part of your website with ease using the menu on the left.<br>
                From pages to packages, everything is just a click away.<br>
                Stay organized, update content quickly, and keep your site fresh for visitors.<br>
                If you need any assistance, your tools and settings are always within reach.<br>
                Let’s make your admin experience simple and powerful!</p>
        </div>
    </div>

    <!-- Latest Career Applications -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-user-tie"></i> Latest Career Applications</h5>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Applied On</th>
                    <th>Resume</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latest_careers as $career)
                <tr>
                    <td>{{ $career->name }}</td>
                    <td>{{ $career->email }}</td>
                    <td>{{ $career->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ asset('resumes/' . $career->resume) }}" target="_blank" class="btn btn-sm btn-primary">
                            View Resume
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No applications yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


</div>
@endsection
