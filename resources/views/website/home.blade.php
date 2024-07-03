@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')
    <!-- Banner Section -->
    <section>
        <div class="container-fluid">
            <div class="owl-carousel owl-theme" id="home-owl-carousel">
                @if ($banner->count() > 0)
                    @foreach ($banner as $item)
                        <div class="item">
                            <!--<img src="{{ asset($item->banner_image) }}" alt="banner image" />-->
                            <img src="{{ asset('img/mhbanner.png') }}" alt="banner image" />
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p>No products found.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="">
        <div class="container prod-sec">
            @foreach ($datalist as $category)
                <div class="row">
                    <div class="prod-collection mt-5">
                        <h5>{{ $category->name }}</h5>

                        <a href="{{ route('product-list', ['id' => $category->id]) }}" id="product-list-link">
                            <h5>View more <i class="fas fa-long-arrow-alt-right"></i></h5>
                        </a>

                    </div>
                    <hr />
                </div>
                <div class="row gx-5">
                    @if ($category->vendorProducts->count() > 0)
                        @foreach ($category->vendorProducts as $product)
                            <div class="col-lg-3">
                                <div class="prod-box">
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <img src="{{ asset('product/banner/' . $product->product_banner_image) }}"
                                            class="prod-img mb-2" /> <!-- Placeholder image -->
                                    </a>
                                    <span class="prod-title">{{ $product->product_title }}</span><br />

                                    @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                        @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                            <span class="prod-title">₹{{ $priceDetail->price }}</span>
                                        @endforeach
                                    @else
                                        <span class="prod-title">Price not available</span><br />
                                    @endif



                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-prodadd addtocart"
                                                data-id="{{ $product->id }}">Add to Cart</button>
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

    {{-- <section class="my-5">
    <div class="container">
      <div class="poojam-sec">
        <h5>Pooja Materials</h5>
      </div>
      <div class="carousel-wrap">
        <div class="owl-carousel" id="poojamCarousel">
          <div class="poojam-item">
            <div class="poojam-card">
              <img
                src="./img/Rectangle44.png"
                class="mcard-img"
                alt="Rectangle29"
              />
              <div class="poojam-card-body">
                <p>Lakshmi Kuber Puja Combo Kit / Pack</p>
                <div class="rupee-div">
                  <img src="./img/rupee-sign.png" alt="rupee-sign" />100
                </div>
                <div class="d-flex justify-content-between py-2">
                  <button class="btn btn-prodadd">Add to Cart</button>
                  <button class="btn btn-whishlist">Wishlist</button>
              </div>
              </div>
            </div>
          </div>
          <div class="poojam-item">
            <div class="poojam-card">
              <img
                src="./img/imagew1.png"
                class="mcard-img"
                alt="Rectangle30"
              />
              <div class="poojam-card-body">
                <p>Lakshmi Kuber Puja Combo Kit / Pack</p>
                <div class="rupee-div">
                  <img src="./img/rupee-sign.png" alt="rupee-sign" />100
                </div>
                <div class="d-flex justify-content-between py-2">
                  <button class="btn btn-prodadd">Add to Cart</button>
                  <button class="btn btn-whishlist">Wishlist</button>
              </div>
              </div>
            </div>
          </div>
          <div class="poojam-item">
            <div class="poojam-card">
              <img
                src="./img/Rectangle46.png"
                class="mcard-img"
                alt="Rectangle31"
              />
              <div class="poojam-card-body">
                <p>Lakshmi Kuber Puja Combo Kit / Pack</p>
                <div class="rupee-div">
                  <img src="./img/rupee-sign.png" alt="rupee-sign" />100
                </div>
                <div class="d-flex justify-content-between py-2">
                  <button class="btn btn-prodadd">Add to Cart</button>
                  <button class="btn btn-whishlist">Wishlist</button>
              </div>
              </div>
            </div>
          </div>
          <div class="poojam-item">
            <div class="poojam-card">
              <img
                src="./img/image-23.png"
                class="mcard-img"
                alt="Rectangle31"
              />
              <div class="poojam-card-body">
                <p>Lakshmi Kuber Puja Combo Kit / Pack</p>
                <div class="rupee-div">
                  <img src="./img/rupee-sign.png" alt="rupee-sign" />100
                </div>
                <div class="d-flex justify-content-between py-2">
                  <button class="btn btn-prodadd">Add to Cart</button>
                  <button class="btn btn-whishlist">Wishlist</button>
              </div>
              </div>
            </div>
          </div>
          <div class="poojam-item">
            <div class="poojam-card">
              <img
                src="./img/image-24.png"
                class="mcard-img"
                alt="Rectangle31"
              />
              <div class="poojam-card-body">
                <p>Lakshmi Kuber Puja Combo Kit / Pack</p>
                <div class="rupee-div">
                  <img src="./img/rupee-sign.png" alt="rupee-sign" />100
                </div>
                <div class="d-flex justify-content-between py-2">
                  <button class="btn btn-prodadd">Add to Cart</button>
                  <button class="btn btn-whishlist">Wishlist</button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}


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
                                <div class="poojam-item">
                                    <div class="poojam-card">
                                        <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                            <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                                class="mcard-img" alt="{{ $product->product_title }}" />
                                        </a>
                                        <div class="poojam-card-body">
                                            <p>{{ $product->product_title }}</p>


                                            @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                                @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                                    <div class="rupee-div">
                                                        <img src="{{ asset('img/rupee-sign.png') }}"
                                                            alt="rupee-sign" />{{ $priceDetail->price }}
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="prod-title">Price not available</span><br />
                                            @endif
                                            <div class="d-flex justify-content-between py-2">
                                                <form method="POST" action="{{ route('add.to.cart') }}"
                                                    class="add-to-cart-form">
                                                    @csrf
                                                    <button type="submit" class="btn btn-prodadd addtocart"
                                                        data-id="{{ $product->id }}">Add to Cart</button>
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
                            <div class="poojam-item">
                                <div class="poojam-card">
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                            class="prod-img mb-2" /> <!-- Placeholder image -->
                                    </a>
                                    <div class="poojam-card-body">
                                        <p>{{ $product->product_title }}</p>
                                        @if ($product->productMeasurmentPriceDeatils->isNotEmpty())
                                            @foreach ($product->productMeasurmentPriceDeatils as $priceDetail)
                                                <div class="rupee-div">
                                                    <img src="{{ asset('img/rupee-sign.png') }}"
                                                        alt="rupee-sign" />{{ $priceDetail->price }}
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="prod-title">Price not available</span><br />
                                        @endif
                                        <div class="d-flex justify-content-between py-2">
                                            <form method="POST" action="{{ route('add.to.cart') }}"
                                                class="add-to-cart-form">
                                                @csrf
                                                <button type="submit" class="btn btn-prodadd addtocart"
                                                    data-id="{{ $product->id }}">Add to Cart</button>
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
