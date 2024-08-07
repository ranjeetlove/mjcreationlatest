@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')

<div class="container my-5">
    <div class="order-card">
    <img src="{{ asset('uploads/product-img/shop28-product-1-1-267x300.jpg') }}" class="img-fluid" />
      <div class="order-details">
        <h5>JBL Quantum 400</h5>
        <p>Order ID: <strong>#125921</strong></p>
        <p>Date: <strong>12 Jan 2024</strong></p>
        <p>Amount: <strong>$47.95</strong></p>
        <p>Shipped To: <strong>Neeraj</strong></p>
        <p>Current Status: <strong>Delivered</strong></p>
        <div class="order-buttons">
          <button class="btn btn-order-active">Track Order</button>
          <button class="btn btn-order-active">Return/Replace</button>
          <button class="btn btn-order-active">Product Review</button>
          <button class="btn btn-order-active">Seller Review</button>
        </div>
      </div>
    </div>
  </div>

  @endsection