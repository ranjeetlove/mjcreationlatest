@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')


<section>
      <div class="container">
        <div class="row my-5">
            <div class="col-lg-1"></div>
          <div class="col-lg-4 left-box">
            <h2 class="mt-4">Login/Sign up</h2>
            <p class="get-p">Get access to your Orders,<br /> Wishlist and <br />Recommendations</p>
            <image src="{{ asset('img/user.png') }}" class="img-fluid user-img mt-4"></image>
          </div>
         
          <div class="col-lg-6 right-box">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1"
                  ><b>Enter Your Mobile No./ Email</b></label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Mobile No./ Email"
                />
              </div>
              <br />
              <div class="form-group">
                <label for="exampleInputPassword1"><b>Enter Your Password</b></label>
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Enter Your Password"
                />
              </div>
              <br />
              <p class="text-center">
                By continuing, you agree to Flipkart's Terms of Use and Privacy
                Policy.
              </p>
              <div class="s-box">
                <div>
                    <button type="submit" class="btn sbt-btn">
                        Register Now
                      </button>
                      
                </div>
              </div>
            </form>
            <div class="col-lg-1"></div>
          </div>
        </div>
      </div>
    </section>

    @endsection
