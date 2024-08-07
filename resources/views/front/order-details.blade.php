@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')

<div class="container mt-5">
    <div class="order-header text-center">
        <h2>Order Details</h2>
        <p>Order #12345</p>
        <p>Date: 2024-08-06</p>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h4>Items Ordered</h4>
            <div class="order-item">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('uploads/product-img/shop28-product-1-1-267x300.jpg') }}" class="img-fluid" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h5>Product Name 1</h5>
                        <p>Quantity: 1</p>
                        <p>Price: ₹50.00</p>
                    </div>
                </div>
            </div>
            <div class="order-item">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('uploads/product-img/shop28-product-1-1-267x300.jpg') }}" class="img-fluid" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h5>Product Name 2</h5>
                        <p>Quantity: 2</p>
                        <p>Price: ₹30.00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Order Summary</h4>
            <div class="order-summary">
                <p>Subtotal: ₹110.00</p>
                <p>Shipping: ₹10.00</p>
                <p>Tax: ₹5.50</p>
                <hr>
                <h5>Total: ₹125.50</h5>
            </div>
        </div>
    </div>
<div class="row my-3">
    <div class="col-lg-6">
    <div class="mt-5">
        <h4>Shipping Address</h4>
        <p>Alok</p>
        <p>123 Main Street</p>
        <p>City, State, ZIP</p>
        <p>Country</p>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="mt-5">
        <h4>Payment Method</h4>
        <p>Credit Card</p>
        <p>**** **** **** 1234</p>
    </div>
    </div>
</div>
   

  
</div>

@endsection