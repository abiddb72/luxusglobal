@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ================= General Information ================= -->
        <h4 class="mb-3 mt-4"><strong>General Information</strong></h4>
        <div class="card card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $setting->meta_title }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $setting->meta_keywords }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ $setting->meta_description }}</textarea>
                </div>
            </div>
        </div>

        <!-- ================= Contact Information ================= -->
        <h4 class="mb-3 mt-4"><strong>Contact Information</strong></h4>
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Contact No</label>
                    <input type="text" name="contact_no" class="form-control" value="{{ $setting->contact_no }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Whatsapp No</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="{{ $setting->whatsapp_number }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="2">{{ $setting->address }}</textarea>
                </div>
            </div>
        </div>

        <!-- ================= Social Links ================= -->
        <h4 class="mb-3 mt-4"><strong>Social Links</strong></h4>
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Facebook</label>
                    <input type="text" name="facebook_link" class="form-control" value="{{ $setting->facebook_link }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Twitter</label>
                    <input type="text" name="twitter_link" class="form-control" value="{{ $setting->twitter_link }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>LinkedIn</label>
                    <input type="text" name="linkedin_link" class="form-control" value="{{ $setting->linkedin_link }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Instagram</label>
                    <input type="text" name="instagram_link" class="form-control" value="{{ $setting->instagram_link }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>YouTube</label>
                    <input type="text" name="youtube_link" class="form-control" value="{{ $setting->youtube_link }}">
                </div>
            </div>
        </div>

        <!-- ================= Logos & Images ================= -->
        <h4 class="mb-3 mt-4"><strong>Logos & Images</strong></h4>
        <div class="card card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label>Header Logo</label><br>
                    <input type="file" class="form-control" name="header_logo">
                    @if($setting->header_logo)
                        <img src="{{ asset('images/'.$setting->header_logo) }}" width="100" class="mt-2">
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label>Footer Logo</label><br>
                    <input type="file" class="form-control" name="footer_logo">
                    @if($setting->footer_logo)
                        <img src="{{ asset('images/'.$setting->footer_logo) }}" width="100" class="mt-2">
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label>Favicon</label><br>
                    <input type="file" class="form-control" name="favicon">
                    @if($setting->favicon)
                        <img src="{{ asset('images/'.$setting->favicon) }}" width="50" class="mt-2">
                    @endif
                </div>

            </div>
        </div>

        <!-- ================= Footer & Description ================= -->
        <h4 class="mb-3 mt-4"><strong>Footer & Description</strong></h4>
        <div class="card card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Footer Text</label>
                    <textarea name="footer_text" class="form-control" rows="2">{{ $setting->footer_text }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="2">{{ $setting->description }}</textarea>
                </div>
            </div>
        </div>

        <!-- ================= Submit ================= -->
        <div class="pb-4 text-right mt-3">
            <button type="submit" class="btn btn-lg btn-primary">Update Settings</button>
        </div>

    </form>
</div>
@endsection
