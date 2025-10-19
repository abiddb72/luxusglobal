@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('images/career_feature.jpg') }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase mt-4">Blog</h3>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Latest Articles</h2>

    <div class="row">
        @forelse($blogs as $blog)
        
        <div class="col-lg-4 col-md-6 mb-4 pb-2">
            <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-0">
                                {{ $blog->created_at->format('d M') }}
                            </h6>
                            <small class="text-white">{{ $blog->created_at->format('Y') }}</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <div class="text-primary text-uppercase text-decoration-none font-weight-bold" >By {{ $blog->author }}</div>
                        </div>
                        {{ Str::limit(strip_tags($blog->title), 25) }}
                    </div>
                </div>
            </a>
        </div>
                
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No blog posts available.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
