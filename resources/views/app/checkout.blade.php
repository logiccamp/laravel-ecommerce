@extends("layouts.app")

@section("titleSection")
<title>HOME - FOODSWEET</title>
@endsection("titleSection")

@section("mainSection")
<div class="hero-wrap hero-bread" style="background-image: url({{env('APP_CDN')}}/bg_1.jpg); ">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate1 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <checkout></checkout>
    </div>
</section> <!-- .section -->

@endSection("mainSection")