@extends("layouts.app")

@section("titleSection")
<title>HOME - FOODSWEET</title>
@endsection("titleSection")

@section("mainSection")

<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(/assets/images/fruit_banner_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate1 text-center">
                        <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
                        <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                        <p><a href="#" class="btn btn-primary">View Details</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(/assets/images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-sm-12 ftco-animate1 text-center">
                        <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                        <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                        <p><a href="#" class="btn btn-primary">View Details</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate1">
                    <h2 class="mb-4">Top Categories</h2>
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="categorygoods">

                <div class="category_list shadow-sm">
                    <a href="/shop">
                        <div class="p-3 text-center">
                            <figure class="figure">
                                <img src="/assets/images/categories/all.png" class="img-fluid" alt="">
                            </figure>
                            <div class="mt-2">
                                <h6 class="fs-1">All</h6>
                                <strong>[218]</strong>
                            </div>
                        </div>
                    </a>
                </div>

                @foreach ($categories as $category)
                <div class="category_list shadow-sm">
                    <a href="/categories/{{$category->slug}}">
                        <div class="p-3 text-center">
                            <figure class="figure">
                                <img src="/assets/images/categories/{{$category->image}}" class="img-fluid" alt="{{$category->title}}">
                            </figure>
                            <div cla ss="mt-2">
                                <h6 class="fs-1">{{$category->title}}</h6>
                                <strong>[218]</strong>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate1">
                <span class="subheading">Featured Products</span>
                <h2 id="fpro" class="mb-4">Our Featured Products</h2>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($fproducts as $featured)
            <div class="col-md-6 col-lg-3 ftco-animate1">
                <div class="product">
                    <a href="/product/{{$featured->slug}}" class="img-prod">
                        <img class="img-fluid" src="/assets/images/{{$featured->image_link}}" alt="{{$featured->title}}">
                        @if ($featured->discount != 0)
                        <span class="status">{{$featured->discount}}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{$featured->title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    @if ($featured->discount != 0)
                                    <span class="mr-2 price-dc">N{{$featured->old_price}}</span>
                                    @endif
                                    <span class="price-sale">N{{$featured->price}}</span>
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



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate1">
                <h2 class="mb-4">Our Catalog</h2>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category2 filter-button-groups">
                    <li class="active" data-filter="*"><a href="#?all">All</a></li>
                    @foreach($categories as $cat)
                    <li data-filter=".{{$cat->id}}"><a href="#?{{$cat->slug}}">{{$cat->title}}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="row products_grid">
            @foreach($allproducts as $product)
            <div class="col-md-6 col-lg-3 item {{$product->category_id}} ftco-animate1 ">
                <div class="product">
                    <a href="/product/{{$product->slug}}" class="img-prod">
                        <img class="img-fluid" src="/assets/images/{{$product->image_link}}" alt="{{$product->title}}">
                        @if ($product->discount != 0)
                        <span class="status">{{$product->discount}}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{$product->title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    @if ($product->discount != 0)
                                    <span class="mr-2 price-dc">N{{$product->old_price}}</span>
                                    @endif
                                    <span class="price-sale">N{{$product->price}}</span>
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
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate1 text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate1 ">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($testimonials as $testi)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{$testi->photo}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">{{$testi->message}}</p>
                                <p class="name">{{$testi->name}}</p>
                                <span class="position">{{$testi->post}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


<hr>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endSection("mainSection")




@section('scriptSection')

<!-- init isotope -->
<script src="{{asset('assets/js/isotope.js')}}"></script>

<script>
    $grid = $(".products_grid");

    // <!-- on button click -->
    $('.filter-button-groups').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value

        $grid.children(".item").hide(100)
        $grid.children(filterValue).show(100)

    });

    // change active button class on buttons
    $('.filter-button-groups').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'li', function() {
            $buttonGroup.find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection('scriptSection')