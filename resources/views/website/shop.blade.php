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
                <div>Showing {{ $category->products->count() }} results;</div>
                <div class="top-right-section">
                    <div class="top-sort">
                        Sort:
                        <select class="custom-select" id="sortSelect" data-category-id="{{ $category->id }}">
                            <option selected value="latest">Sort by latest</option>
                            <option value="lowToHigh">Price: Low to High</option>
                            <option value="highToLow">Price: High to Low</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                    <div class="top-sort ms-2">
                        Show:
                        <select class="custom-select">
                            <option selected>20 items</option>
                            <option value="1">10 items</option>
                            <option value="2">30 items</option>
                            <option value="3">40 items</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-light" id="grid-view-btn"><img src="{{ asset('img/Link.png')}}" class="list-icon"></img></button>
                        <button class="btn btn-light" id="list-view-btn"><img src="{{ asset('img/List.png')}}" class="list-icon"></img></button>
                    </div>
                </div>
            </div>
            <div class="row product-listing grid-view" id="productListings">
                @if ($category->count() > 0)
                @foreach ($category->products as $product)
                    <div class="col-md-4 product-card-container">
                        <div class="product-card">

                        <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                            <img src="{{ asset($product->photo ? 'assets/images/products/' . $product->photo : 'assets/images/default-product.jpg') }}"
                                class="shop-pimage" /> <!-- Placeholder image -->
                        </a>

                        <h5>{{ $product->product_title }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price">₹{{ $product->price }}</div>
                            <div class="stock-status">IN STOCK</div>
                        </div>
                        <div class="rating-div">
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#grid-view-btn').on('click', function() {
        $('#productListings').removeClass('list-view').addClass('grid-view');
        $('.product-card-container').removeClass('col-md-12').addClass('col-md-4');
    });

    $('#list-view-btn').on('click', function() {
        $('#productListings').removeClass('grid-view').addClass('list-view');
        $('.product-card-container').removeClass('col-md-4').addClass('col-md-12');
    });
});
</script>

<style>
/* Default grid view */
.grid-view .product-card {
    margin-bottom: 30px;
}

/* List view */
.list-view .product-card {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 100%;
    margin-bottom: 20px;
}

.list-view .product-card img {
    max-width: 150px;
    margin-right: 20px;
}

.list-view .product-card h5 {
    font-size: 1.5rem;
}
</style>
