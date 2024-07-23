@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')
<style>
.payment-p{
    font-size: 14px !important;
}
.credit-card{
    font-size:16px !important
}
.paym{
    border: 0.5px solid #E5E7EB;
    border-radius: 5px;
    padding: 10px;
}
.buy-now{
    background-color:#243164;
    font-size:12px;
}
.buy-now:hover{
    background-color:#fff;
    font-size:12px;
    color:#000;
    border:1px solid #243164
}
.prod-hr{
    height:0.3px !important;
}
.form-control{
    width: 50%;
}
.main-image{
    text-align:center;
    border:none;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.thum-box{
    border:none;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.prod-gallery{
    display:flex;
    justify-content: space-evenly;
}
.product-counter {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    margin-right: 10px;
}

.counter-btn {
    background-color: #fff;
    border: none;
    width: 40px;
    height: 40px;
    font-size: 24px;
    cursor: pointer;
    outline: none;
}

.counter-input {
    width: 50px;
    height: 40px;
    text-align: center;
    border: none;
    font-size: 18px;
    outline: none;
}
.product-title{
    font-size:34px;
}
.add-to-cart-form{
    width: 70% !important;
}
.thumbnail {
    width: 7.2rem;
    height: 65px;
    cursor: pointer;
    margin-right: 10px;
}
.counter-btn {
    background-color: #fff;
    border: none;
    width: 30px;
    height: 40px;
    font-size: 24px;
    cursor: pointer;
    outline: none;
}
.btn {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #fff;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: #243164;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.review {
      border-bottom: 1px solid #eee;
      padding: 20px 0;
    }
    .review .user-img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 20px;
    }
    .review .user-img img {
      width: 100%;
      height: auto;
    }
    .review .stars i {
      color: #f1c40f;
    }
    .add-review .stars i {
      cursor: pointer;
    }
    .social-icons {
    display: flex;
    gap: 5px;
}

.sc-icon {
    font-size: 18px !important;
    transition: background-color 0.3s, color 0.3s;
    padding: 4px;
    border-radius: 50%;
}

.sc-icon:hover {
    color: white;
}

.fa-instagram:hover {
    background-color: #e4405f;
}

.fa-facebook-square:hover {
    background-color: #3b5998;
}

.fa-twitter-square:hover {
    background-color: #55acee;
}

.fa-whatsapp:hover {
    background-color: #25d366;
}
@media only screen and (max-width: 600px) {
  .whish{
    cursor: pointer;
    display: block;
    justify-content: space-between;
    align-items: center !important;
  }
}
</style>
    <section>
        <div class="container">
            <div class="row">
            <div class="breadcrum-div">
                <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Dhoop Collection</a></li>
                  <li>Hari Darshan Deluxe Doop 20 Sticks</li>
                </ul>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-image">
                        <img src="{{ asset('assets/images/products/' . $product->photo) }}" title="{{ $product->name }}"
                            class="" id="main-image" />
                    </div>
                    <div class="row mt-3">
                        <div class="prod-gallery">
                            <div class="thum-box">
                                <img src="{{ asset('img/image-36.png') }}" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="{{ asset('img/image-37.png') }}" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="{{ asset('img/image-38.png') }}" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="{{ asset('img/image-40.png') }}" class="thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <div>
                        <span>MRP :</span><span> ₹ {{ $product->price }}</span><span>
                            ₹23.00</span><span>2%off</span>
                    </div>
                    <span><b></b>Availability: {{ $product->stock }} in stock</b></span>
                    <div class="add-btn add-btn1 my-3">
                        <form method="POST" action="{{ route('add.to.cart') }}" class="add-to-cart-form add-to-cart-form1 d-flex">
                            @csrf
                            <div class="product-counter">
                            <button type="button" class="counter-btn minus-btn">-</button>
                            <input type="text" class="counter-input" value="1" readonly>
                            <button type="button" class="counter-btn plus-btn">+</button>
                            </div>
                            <button type="submit" class="btn btn-prodadd addtocart" data-id="{{ $product->id }}"><i class="fa fa-shopping-bag"></i> Add to Cart</button>
                            <button class="buy-now">
                            <i class="fa fa-shopping-bag"></i> Buy Now
                        </button>
                        </form>

                    </div>

                    <div class="paym">
                        <div class="paym1">
                            <span class="c-card"><i class="fa fa-credit-card credit-card"></i></span>
                            <div>
                                <p class="payment-p">
                                <b>Payment.</b>Payment upon receipt of goods, Payment by card
                                in the department, Google Pay, Online card, -5% discount in
                                case of payment
                                </p>

                            </div>
                        </div>
                        <hr class="prod-hr"/>
                        <div class="paym1">
                            <span class="c-card"><i class="fa fa-shield credit-card"></i>
                         </span>
                            <div>
                            <p class="payment-p">
                                <b>Warranty.</b> The Consumer Protection Act does not provide
                                for the return of this product of proper quality.
                               </p>
                            </div>
                        </div>
                    </div>
                    <div class="whish mt-3">
                        <div class="me-3">
                            <span><i class="fa fa-heart-o"></i></span> Add to wishlist
                        </div>
                        <div class="me-3 d-flex">
                            <span><i class="fa fa-share"></i></span><div class="media-links ms-2">
                        <div class="social-icons">
        <span><i class="fa fa-instagram sc-icon"></i></span>
        <span><i class="fa fa-facebook-square sc-icon"></i></span>
        <span><i class="fa fa-twitter-square sc-icon"></i></span>
        <span><i class="fa fa-whatsapp sc-icon"></i></span>
    </div>
                    </div>
                        </div>
                        <div class="me-3">
                            <span><img src="{{ asset('img/compare-icon.png') }}" alt="compare-icon" /></span>Compare
                        </div>
                    </div>
                    <div class="mt-2">
                        <b>Features & Details</b>
                        <ul>
                            <li>It has a pleasing aroma</li>
                            <li>It is perfect for all your pooja rituals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container mt-5">
            <div class="row">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">
                            Reviews
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">
                            Specification
                        </button>
                    </li>
                </ul>
                
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        Hari Darshan Deluxe Dhoop Sticks have a sweet and serene fragrance
                        that adds to the purity of your pooja ceremony. These dhoop sticks
                        also can be used as an aromatic room freshener. So go ahead and
                        buy this product online today! Hari Darshan Deluxe Dhoop Sticks
                        have a sweet and serene fragrance that adds to the purity of your
                        pooja ceremony. These dhoop sticks also can be used as an aromatic
                        room freshener. So go ahead and buy this product online today!
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container mt-5">
                    <div class="review">
                   <div class="d-flex">
                     <div class="user-img">
                    <img src="https://via.placeholder.com/60" alt="User Image">
                    </div>
                 <div>
        <h5>Jeny Doe</h5>
        <div class="stars">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-half-alt"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
      </div>
    </div>
  </div>

  <div class="review">
    <div class="d-flex">
      <div class="user-img">
        <img src="https://via.placeholder.com/60" alt="User Image">
      </div>
      <div>
        <h5>Linda Morgus</h5>
        <div class="stars">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
      </div>
    </div>
  </div>

  <div class="add-review mt-5">
    <h5>Add a Review</h5>
    <div class="stars">
      <i class="fa fa-star-o"></i>
      <i class="fa fa-star-o"></i>
      <i class="fa fa-star-o"></i>
      <i class="fa fa-star-o"></i>
      <i class="fa fa-star-o"></i>
    </div>
    <form class="mt-3">
      <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Name">
      </div>
      <div class="form-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group mb-3">
        <textarea class="form-control" rows="3" placeholder="Enter Your Comment"></textarea>
      </div>
      <button type="submit" class="btn btn-submit">Submit</button>
    </form>
  </div>
</div>
                       
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        Hari Darshan Deluxe Dhoop Sticks have a sweet and serene fragrance
                        that adds to the purity of your pooja ceremony. These dhoop sticks
                        also can be used as an aromatic room freshener. So go ahead and
                        buy this product online today! Hari Darshan Deluxe Dhoop Sticks
                        have a sweet and serene fragrance that adds to the purity of your
                        pooja ceremony. These dhoop sticks also can be used as an aromatic
                        room freshener. So go ahead and buy this product online today!
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <div class="row">
                <h5>Similar Products</h5>
                <hr />
                @if ($relatedproducts->count() > 0)
                    @foreach ($relatedproducts as $relatedproduct)
                        <div class="col-lg-3">
                            <div class="prod-box">
                                <a href="{{ route('product-detail', ['id' => $relatedproduct->id]) }}">
                                    <img src="{{ asset('img/' . $relatedproduct->photo) }}"
                                        class="prod-img mb-2" />
                                </a>
                                <span class="prod-title">{{ $relatedproduct->name }}</span><br />
                                <span class="prod-title">₹{{ $relatedproduct->price }}</span>
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
    </section>

    <script>
        // Get all thumbnail images
        const thumbnails = document.querySelectorAll(".thumbnail");

        // Add click event listener to each thumbnail
        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener("click", function() {
                // Change main image source to clicked thumbnail's source
                document.getElementById("main-image").src = this.src;
            });
        });
    </script>
@endsection
