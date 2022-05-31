@extends("layouts.app")

@section("titleSection")
<title>{{$product->title}} - FOODSWEET</title>
@endsection("titleSection")

@section("mainSection")
<div class="hero-wrap hero-bread" style="background: url({{env('APP_CDN')}}/{{$product->image_link}}); background-position: center center; background-color: rgba(0,0,0,0.6); background-blend-mode: overlay">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate11 text-center">
                <p class="breadcrumbs"><span class="mr-2">
                        <a href="index.html">Home</a>
                    </span> <span class="mr-2"><a href="#?">Product</a></span>
                </p>
                <h1 class="mb-0 bread">{{$product->title}}</h1>
            </div>
        </div>
    </div>
</div>
<added-cart></added-cart>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate11">
                <a href="{{env('APP_CDN')}}/{{$product->image_link}}" class="image-popup"><img src="{{env('APP_CDN')}}/{{$product->image_link}}" class="img-fluid" alt="{{$product->title}}"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate11">
                <h3>{{$product->title}}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <p class="price">
                    <span>N{{$product->price}}</span>
                    @if ($product->discount != 0)
                    <small><del class="status">N{{$product->old_price}}</del></small>
                    @endif
                </p>
                <p>{{$product->description}}.</p>

                <add-to-cart user-id="{{auth()->user()->id ?? 0}}" p-id="{{$product->slug}}"></add-to-cart>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate1">
                <h2 class="mb-4">Related Products</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($related as $rproduct)
            <div class="col-md-6 col-lg-3 ftco-animate1">
                <div class="product">
                    <a href="/product/{{$rproduct->slug}}" class="img-prod">
                        <img class="img-fluid" src="/assets/images/{{$rproduct->image_link}}" alt="{{$rproduct->title}}">
                        @if ($rproduct->discount != 0)
                        <span class="status">{{$rproduct->discount}}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{$rproduct->title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    @if ($rproduct->discount != 0)
                                    <span class="mr-2 price-dc">N{{$rproduct->old_price}}</span>
                                    @endif
                                    <span class="price-sale">N{{$rproduct->price}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-eye"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection("mainSection")