@extends('layouts.main')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h2>{{ $blog->title }}</h2>
            <p class="font-weight-bold py-3">{{ $blog->created_at->format('F d, Y') }}</p>
            @if($blog->image)
                <img src="{{ asset('images/' . $blog->image) }}" class="w-100 mb-4 rounded">
            @endif

            
            

            <div class="text-primary text-uppercase text-decoration-none font-weight-bold" >By {{ $blog->author }}</div>

            <div class="blog-content">
                
               {{ $blog->description }}
            </div>

        </div>
    </div>
</div>
@endsection
