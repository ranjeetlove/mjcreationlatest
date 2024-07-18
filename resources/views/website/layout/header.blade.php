<section class="h-top">
    <div class="container">
        <div class="row">
            <div class="top-content">
                <div class="col-12 col-sm-8">
                    <div class="wel-header">
                        <span>Welcome Visitor!</span>
                        <span>Contact with us</span>
                    </div>
                </div>
                <div class="col-12 col-sm-2">
                <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
                    <a href="https://www.linkedin.com" target="_blank" class="fa fa-linkedin"></a>
                </div>
                </div>
                <div class="col-12 col-sm-2">
                    <select class="form-select" id="languageSelect">
                        <option selected>English</option>
                        <option value="Hindi">Hindi</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row py-2">
            <div class="col-lg-3">
                <a wire:navigate href="{{ url('users/home') }}" class="headerLogo">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid logo" />
                    <span class="title">MJ Creation</span>
                </a>
            </div>
            <div class="col-lg-9 mt-2">
                <div class=" account d-flex">
                    <div class="mx-3 deliver-text">
                        <span>Deliver to <i class="fa fa-map-marker"></i>
                            <b>Noida, UP</b>
                        </span>
                    </div>
                    <div class="search-container mx-3 search">
                       <div class="search-box">
                            <input type="text" placeholder="Search...">
                            <i class="fa fa-search search-icon"></i>
                        </div>
                    </div>
                    <div class="whishCart mx-3">
                        <a wire:navigate href="{{ route('wishlist.view') }}" >
                           <div class="wishlist-icon">
                             <i class="fa fa-heart mx-2"></i>
                             <span class="wishlist-count">3</span>
                            </div>
                            <span>wishlist</span>
                        </a>
                        <a wire:navigate href="{{ route('product-cart') }}">
                        <div class="cart-icon">
                            <i class="fa fa-shopping-cart mx-2"></i>
                            <span class="cart-count">
                                @if (session('cart'))
                                    {{ count(session('cart')) }}
                                @else
                                    0
                                @endif
                            </span>
                            </div>
                            <span>cart</span>
                        </a>
                    </div>
                    @auth
                            <div class="dropdown nav-dropdown mx-3">

                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">Refund & Exchange</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>



                                </ul>
                            </div>
                        @else
                            <a wire:navigate href="{{ route('users-login') }}" class="btn">Login/Signup </a>
                        @endauth
                </div>
            </div>
        </div>
    </div>
</section>


<section class="menu-bg">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">BUY1 GET 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">POOJA SAMAGRI LIST</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">JADI BOOTI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">GEMS STONE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">PERFUMES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">MASALA & DESSERTS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
