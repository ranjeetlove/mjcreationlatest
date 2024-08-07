@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')

<div class="container mt-5">
    <div class="account-header text-center">
        <h2>User Account</h2>
        <p>Welcome, Alok!</p>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="account-sidebar">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#" class="account-link">Account Overview</a></li>
                    <li class="list-group-item"><a href="#" class="account-link">Profile</a></li>
                    <li class="list-group-item"><a href="#" class="account-link">Orders</a></li>
                    <li class="list-group-item"><a href="#" class="account-link">Wishlist</a></li>
                    <li class="list-group-item"><a href="#" class="account-link">Settings</a></li>
                    <li class="list-group-item"><a href="#" class="account-link">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="account-details">
                <div class="row pt-3">
                    <div class="col-md-4">
                        <img src="{{ asset('img/profile.jpg') }}" class="img-fluid rounded-circle profile-image" alt="User Image">
                    </div>
                    <div class="col-md-8">
                        <h5>Alok</h5>
                        <p>Email: alok@example.com</p>
                        <p>Phone: (123) 456-7890</p>
                        <p>Address: 123 Main Street, City, State, ZIP</p>
                    </div>
                </div>
            </div>
            <div class="account-content">
                <h4>Recent Orders</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345</td>
                            <td>2024-08-01</td>
                            <td>Shipped</td>
                            <td>₹100.00</td>
                            <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>12346</td>
                            <td>2024-07-28</td>
                            <td>Delivered</td>
                            <td>₹75.00</td>
                            <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>12347</td>
                            <td>2024-07-20</td>
                            <td>Processing</td>
                            <td>₹150.00</td>
                            <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection