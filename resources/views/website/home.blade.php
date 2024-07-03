@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')
    <!-- Banner Section -->
    <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        @if ($banner->count() > 0)
                @foreach ($banner as $index => $item)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index }}"></button>
                @endforeach
        @endif
        </div>
        <div class="carousel-inner">
        @if ($banner->count() > 0)
                @foreach ($banner as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('uploads/banner/' . $item->banner_image) }}" class="d-block w-100" alt="banner image" />
                    </div>
                @endforeach
        @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <!-- <div class="container-fluid">
            <div class="owl-carousel owl-theme" id="home-owl-carousel">
                @if ($banner->count() > 0)
                    @foreach ($banner as $item)
                        <div class="item">
                            <img src="{{ asset('uploads/banner/' . $item->banner_image) }}" alt="banner image" />
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p>No products found.</p>
                    </div>
                @endif
            </div>
        </div> -->
    </section>

    <section class="product-listing">
        <!-- <div class="container">
            <div class="row">
                <div class="col-4"></div>
            </div>
        </div> -->
        <div class="container">
            @foreach ($datalist as $category)
                <div class="row">
                    <div class="prod-collection mt-5 mb-2">
                        <h5>{{ $category->name }}</h5>
                        <a class="btn view-more-btn" href="{{ route('product-list', ['id' => $category->id]) }}" id="product-list-link">
                            View more
                        </a>
                    </div>
                </div>
                <div class="row gx-5">
                    @if ($category->vendorProducts->count() > 0)
                        @foreach ($category->vendorProducts as $product)
                            <div class="col-lg-3">
                                <div class="prod-box">
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <div class="prodcut-img-outer-box">
                                        <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->product_title }}</a></h3>
                                    @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                    @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                    <span class="prod-title prodcut-price">₹{{ $priceDetail->price }} </span>
                                    @endforeach
                                    @else
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    @endif
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="{{ $product->id }}">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="{{ $product->id }}">Wishlist</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p>No products found.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <img src="{{ asset('img/shop-now.png') }}" class="img-fluid" />
            </div>
        </div>
    </section>
    <!--------------Start  Other---------->
    @foreach ($datalistafter as $category)
        <section class="my-5">
            <div class="container">
                <div class="poojam-sec">
                    <h5>{{ $category->name }}</h5>
                </div>
                <div class="carousel-wrap">
                    <div class="owl-carousel" id="poojamCarousel">
                        @if ($category->vendorProducts->count() > 0)
                            @foreach ($category->vendorProducts as $product)
                            <div class="prod-box">
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <div class="prodcut-img-outer-box">
                                        <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->product_title }}</a></h3>
                                    @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                    @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                    <span class="prod-title prodcut-price">₹{{ $priceDetail->price }} </span>
                                    @endforeach
                                    @else
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    @endif
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="{{ $product->id }}">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="{{ $product->id }}">Wishlist</button>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <p>No products found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endforeach


    <!---------- end other ---------->

    <!-- ===================================================================== -->
    <section class="my-5">
        <div class="container">
            <div class="poojam-sec">
                <h5>Most Viewed Products</h5>
            </div>
            <div class="carousel-wrap">
                <div class="owl-carousel" id="viewspCarousel">
                    @if ($mostViewedProducts->count() > 0)
                        @foreach ($mostViewedProducts as $product)
                                <div class="prod-box">
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <div class="prodcut-img-outer-box">
                                        <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->product_title }}</a></h3>
                                    @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                    @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                    <span class="prod-title prodcut-price">₹{{ $priceDetail->price }} </span>
                                    @endforeach
                                    @else
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    @endif
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="{{ $product->id }}">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="{{ $product->id }}">Wishlist</button>
                                    </div>
                                    </div>
                                </div>
                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p>No products found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- ===================================================================== -->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="sidebar-sec">
                        <h5>ON SALE</h5>
                        <div class="product-item">
                            <img src="{{ asset('img/image25(1).png') }}" alt="Product 1" />
                            <div class="product-info">
                                <div class="product-title">
                                    Ganapathi Homam / Ganesh Homam / Gana homa / Ganesh Puja
                                </div>
                                <div class="product-product_measurment_quantity_price">₹ 499</div>
                                <div class="product-icons mt-5">
                                    <img src="{{ asset('img/shopping-cart (1).png') }}" alt=""
                                        class="productb-image" />
                                    <img src="{{ asset('img/eye (1).png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <img src="{{ asset('img/image26.png') }}" alt="Product 2" />
                            <div class="product-info">
                                <div class="product-title">
                                    Citrine Mala / Sunehla Stone Mala 108 Beads (8 mm)
                                </div>
                                <div class="product-product_measurment_quantity_price">₹ 2,200</div>
                                <div class="product-icons mt-5">
                                    <img src="{{ asset('img/shopping-cart (1).png') }}" alt=""
                                        class="productb-image" />
                                    <img src="{{ asset('img/eye (1).png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="product-item" style="border-bottom: none">
                            <img src="{{ asset('img/image27.png') }}" alt="Product 3" />
                            <div class="product-info">
                                <div class="product-title mt-2">
                                    Sphatika Mala / Spadikam Mala / Crystal Quartz Beads
                                </div>
                                <div class="product-product_measurment_quantity_price">₹ 2,200</div>
                                <div class="product-icons mt-5">
                                    <img src="{{ asset('img/shopping-cart (1).png') }}" alt=""
                                        class="productb-image" />
                                    <img src="{{ asset('img/eye (1).png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-section">
                        <img src="{{ asset('img/image 34.png') }}" alt="" class="mb-5" />
                        <p>CUSTOMER SERVICE</p>
                        <p>Call us: +91 0987654321</p>
                        <p>9.00 AM to 7.30 PM</p>
                    </div>
                    <div class="info-section">
                        <img src="{{ asset('img/image33.png') }}" alt="" class="mb-5" />
                        <p>SHIPPING WORLDWIDE</p>
                        <p>On order over Rs.5000 - 7 days a week</p>
                    </div>
                    <div class="info-section">
                        <img src="{{ asset('img/image35.png') }}" alt="" class="mb-5" />
                        <p>MONEY BACK GUARANTEE!</p>
                        <p>Send within 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
