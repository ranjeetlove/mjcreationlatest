@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')

<div class="container my-5">
        <form class="row">
            <div class="col-md-7">
                <h2>Billing details</h2>
                <div class="form-group">
                    <label for="first-name">First name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="first-name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="last-name" required>
                </div>
                <div class="form-group">
                    <label for="company-name">Company name (optional)</label>
                    <input type="text" class="form-control" id="company-name">
                </div>
                <div class="form-group">
                    <label for="country">Country / Region <span class="text-danger">*</span></label>
                    <select class="form-control" id="country" required>
                        <option value="vietnam">India</option>
                        <option value="vietnam">Vietnam</option>
                        <!-- Add other countries as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="street-address">Street address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control mb-2" id="street-address" placeholder="House number and street name" required>
                    <input type="text" class="form-control" id="apartment" placeholder="Apartment, suite, unit, etc. (optional)">
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode / ZIP (optional)</label>
                    <input type="text" class="form-control" id="postcode">
                </div>
                <div class="form-group">
                    <label for="city">Town / City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="city" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="ship-different-address">
                    <label class="form-check-label" for="ship-different-address">Ship to a different address?</label>
                </div>
                <div class="form-group">
                    <label for="order-notes">Order notes (optional)</label>
                    <textarea class="form-control" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <h2>Your order</h2>
                <div class="border p-3 mb-3 order-summary">
                    <div class="d-flex justify-content-between">
                        <div>Unero Military Classical Backpack - Bold Blue × 1</div>
                        <div>₹1,195.09</div>
                    </div>
                    <div class="border-top pt-3 mt-3">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>₹1,195.09</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping: Global Store</span>
                            <span>Free shipping</span>
                        </div>
                        <div class="d-flex justify-content-between font-weight-bold text-danger">
                            <span>Total</span>
                            <span>₹1,195.09</span>
                        </div>
                    </div>
                </div>
             
                <button type="submit" class="btn btn-custom btn-block">Place order</button>
            </div>
        </form>
    </div>


    @endsection