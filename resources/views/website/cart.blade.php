@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            @foreach ($cart as $item)
            <div class="product-card1 d-flex align-items-center mb-3">
                <img src="{{ asset('assets/images/products/' . $item['image']) }}" class="img-fluid" alt="Product Image">
                <div class="ml-3">
                    <h5>{{ $item['name'] }}</h5>
                    <p>Seller: NiraFragrances</p>
                    <p>MRP: <s>₹{{ $item['price'] + $item['price'] * 0.02 }}</s> <span class="discount-text">₹{{ $item['price'] }}</span> <span class="offer-badge">2% off</span> <span class="text-success">2 offers applied</span></p>
                    <p class="delivery-info">Delivery by Thu Jun 27 | <s>₹40.00</s> <span class="text-success">Free</span></p>
                    <div class="d-flex align-items-center">
                        <div class="quantity-buttons">
                            <button type="button" class="btn-decrement" data-product-id="{{ $item['id'] }}">-</button>
                            <input type="number" value="{{ $item['quantity'] }}" class="form-control quantity-input" data-product-id="{{ $item['id'] }}">
                            <button type="button" class="btn-increment" data-product-id="{{ $item['id'] }}">+</button>
                        </div>
                        <div class="action-buttons">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-outline-secondary ml-2">Remove</button>
                            </form>
                            <button class="btn btn-outline-secondary ml-2 save-for-later" data-product-id="{{ $item['id'] }}">Save for later</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-4">
            <div class="price-details">
                <h5>PRICE DETAILS</h5>
                <hr>
                <p>Price ({{ count($cart) }} items): <span class="float-right">₹{{ $totalPrice }}</span></p>
                <p>Discount: <span class="float-right text-success">- ₹{{ $totalDiscount }}</span></p>
                <p>Delivery Charges: <span class="float-right text-success">{{ $deliveryCharges == 0 ? 'Free' : '₹' . $deliveryCharges }}</span></p>
                <hr>
                <p class="total">Total Amount: <span class="float-right">₹{{ $totalAmount }}</span></p>
                <p class="text-success">You will save ₹{{ $totalDiscount }} on this order</p>
            </div>
        </div>
    </div>
</div>

@endsection
