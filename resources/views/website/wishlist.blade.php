@extends('website.layout.main')
@section('title', 'Mjcreation')
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <span>Home > Wishlist</span>
            </div>
            <div class="row">
                <div class="whish-bg mt-3">
                    @if ($wishlists->count() > 0)
                        @foreach ($wishlists as $wishlist)
                            <div>
                                <div class="whish-prod mt-5">
                                    <a href="{{ route('product-detail', ['id' => $wishlist->vendorProduct->id]) }}">
                                        <img src="{{ asset('img/' . $wishlist->vendorProduct->product_banner_image) }}"
                                            class="mcard-img" alt="{{ $wishlist->vendorProduct->product_title }}" />
                                    </a>
                                    <p class="whish-title">
                                        {{ $wishlist->vendorProduct->product_title }}<br />
                                        ₹ {{ $wishlist->vendorProduct->product_measurment_quantity_price }}
                                    </p>
                                    <div class="trash-icon">
                                        <form method="POST" action="{{ route('wishlist.remove', $wishlist->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="fa fa-trash-o">Delete</i>
                                            </button>
                                        </form>
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
    </section>

@endsection
