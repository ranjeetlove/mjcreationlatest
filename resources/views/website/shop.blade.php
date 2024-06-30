
@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-md-3">
            <div class="filter-section">
                <div class="filter-title">Filter by Price</div>
                <div class="filter">
                    <label for="priceRange">Price: $0 - $30</label>
                    <input type="range" class="custom-range" id="priceRange" min="0" max="30">
                </div>

                <div class="filter-title">Filter by Brands</div>
                <div class="filter">
                    <input type="checkbox" id="brand1">
                    <label for="brand1">3K Crayon</label><br>
                    <input type="checkbox" id="brand2">
                    <label for="brand2">A KAREVER Crafts</label><br>
                </div>

                <div class="filter-title">Filter by Ratings</div>
                <div class="filter">
                    <input type="checkbox" id="rating4">
                    <label for="rating4">4 ★ & above</label><br>
                    <input type="checkbox" id="rating3">
                    <label for="rating3">3 ★ & above</label><br>
                </div>

                <div class="filter-title">Discount</div>
                <div class="filter">
                    <input type="checkbox" id="discount1">
                    <label for="discount1">10% or more</label><br>
                    <input type="checkbox" id="discount2">
                    <label for="discount2">20% or more</label><br>
                </div>

                <div class="filter-title">Product Status</div>
                <div class="filter">
                    <input type="checkbox" id="status1">
                    <label for="status1">In Stock</label><br>
                    <input type="checkbox" id="status2">
                    <label for="status2">On Sale</label><br>
                </div>
            </div>
        </div>

        <!-- Product Listing -->
        <div class="col-md-9">
            <div class="top-section">
                <div>Showing {{ $category->vendorProducts->count() }} results;</div>
                <div class="top-right-section">
                    <div>
                        Sort:
                        <select class="custom-select" id="sortSelect" data-category-id="{{ $category->id }}">
                            <option selected value="latest">Sort by latest</option>
                            <option value="lowToHigh">Price: Low to High</option>
                            <option value="highToLow">Price: High to Low</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                    <div>
                        Show:
                        <select class="custom-select">
                            <option selected>20 items</option>
                            <option value="1">10 items</option>
                            <option value="2">30 items</option>
                            <option value="3">40 items</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-light"><i class="fas fa-th"></i></button>
                        <button class="btn btn-light"><i class="fas fa-bars"></i></button>
                    </div>
                </div>
            </div>
            <div class="row product-listing equal-height" id="productListings">
                @if ($category->vendorProducts->count() > 0)
                @foreach ($category->vendorProducts as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                <img src="{{ asset('img/' . $product->product_banner_image) }}"
                                    class="shop-pimage" /> <!-- Placeholder image -->
                            </a>

                            <h5>{{ $product->product_title }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="price">₹{{ $product->product_measurment_quantity_price }}</div>
                                <div class="stock-status">IN STOCK</div>
                            </div>
                            <div class="rating my-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form">
                                    @csrf
                                    <button type="submit" class="btn btn-prodadd addtocart" data-id="{{ $product->id }}">Add to Cart</button>
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
</div>
@endsection
