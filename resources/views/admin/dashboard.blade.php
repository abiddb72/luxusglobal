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

        <!-- Contact Messages -->
        <div class="col-lg-3 col-md-6 mb-4">
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
        </div>

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
            <p>Manage your website content using the menu on the left.</p>
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
