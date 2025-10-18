@extends('layouts.main')

@section('content')
<div class="container-fluid page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('images/about_feature.jpg') }} ), no-repeat center center;background-size: cover;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase mt-4">{{ $page->title }}</h3>
            
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="page-content">
        <h1 class="text-center py-4">{{ $page->title }}</h1>
        {!! $page->description !!}
    </div>
</div>
@endsection