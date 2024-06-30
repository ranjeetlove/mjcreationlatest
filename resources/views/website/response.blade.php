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
