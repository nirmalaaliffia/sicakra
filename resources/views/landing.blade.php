@extends('layouts.landing_app')

@section('header-content')

<div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(assets/images/header-hero.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="header-hero-content">
                    <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Aplikasi</b> <span>SICAKRA</span></h1>
                    <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Aplikasi SICAKRA adalah program kecamatan Kota Madiun untuk merancanag program rencana Kerja guna dapat direalisasikan tepat waktu dan mencapai tujuan bersama  </p>
                    
                </div> <!-- header hero content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
        <div class="image">
            <img src="{{ asset('landing/assets/images/hero-image.jpg') }}" alt="Hero Image">
        </div>
    </div> <!-- header hero image -->
</div> <!-- header hero -->
@endsection