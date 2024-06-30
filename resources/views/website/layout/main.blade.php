<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.green.css')}} "/>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="screen" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.min.css') }}" type="text/css" media="screen" /> --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" href="{{ asset('css/fontgoogleapis.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.w3.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.4.7.0.css') }}" type="text/css" media="screen" /> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maps/style.css.map') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/adminstyle.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/font-awesome.w3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendorcss/ti-icons/css/themify-icons.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/boostrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/boostrap5.css') }}">


    <link href="{{ asset('css/bootstrap.5.0.2.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/toaster.min.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>




    {{-- <script src="{{ asset('js/jquery.js') }}"></script>

    <script src="{{ asset('js/toaster.min.js') }}"></script>
    <script src="{{ asset('graph/Chart.min.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/documentation.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>

    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('js/additional.method.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('tailwindcss/tailwind.js') }}"></script>
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/addproduct.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/datatable.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/datatables/datatables2.0.5.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="{{ asset('js/datatables/boostrap5.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <script src="{{ asset('graph/Chart.min.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/documentation.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>

    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('js/additional.method.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/addproduct.js') }}"></script> --}}
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/datatables/datatables2.0.5.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('js/datatables/boostrap5.js') }}"></script>

    {{-- <script src="{{ asset('js/bootstrap5.0.2.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('js/toaster.min.js') }}"></script>

    {{-- <script type="module" src="{{ url('resources/js/app.js') }} "></script> --}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>







    <title>@yield('title')</title>
</head>

<body class="">





    @include('website.layout.header')

    {{-- @livewire('livewire.managedashboard.layout.sidebar') --}}

    @yield('content')

    @include('website.layout.footer')



    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    @yield('page-script')

    <script src="{{ asset('js/template.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('.btn-whishlist').click(function(e) {
            e.preventDefault();
             //var productId = $(this).data('product-id');
             //var productId = $(this).attr('data-product-id');
            var productId = '28';
            var token = $("meta[name='csrf-token']").attr("content");
            console.log("Product ID:", productId); // For debugging

            $.ajax({
                url: "{{ route('add.to.wishlist') }}",
                method: "POST",
                data: {
                    _token: token,
                    vendor_product_id: productId
                },
             success: function(response) {
                if(response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
             },
                error: function(xhr, status, error) {
                    if (xhr.status == 422) {
                        toastr.error(xhr.responseJSON.msg);
                    } else {
                        toastr.error('An error occurred while adding the product to the wishlist.');
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#sortSelect').on('change', function() {
            var sortBy = $(this).val();
            var categoryId = $(this).data('category-id');
            $.ajax({
                url: '{{ route("products.sort") }}', // Laravel route
                method: 'GET',
                data: { sort_by: sortBy ,category_id: categoryId },
                success: function(response) {
                    $('#productListings').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred:', error);
                }
            });
        });
    });
    </script>
<script>
    $(document).ready(function() {
        $('.btn-increment').click(function() {
            var productId = $(this).data('product-id');
            var quantityInput = $('.quantity-input[data-product-id="' + productId + '"]');
            var newQuantity = parseInt(quantityInput.val()) + 1;

            updateCart(productId, newQuantity);
        });

        $('.btn-decrement').click(function() {
            var productId = $(this).data('product-id');
            var quantityInput = $('.quantity-input[data-product-id="' + productId + '"]');
            var newQuantity = parseInt(quantityInput.val()) - 1;

            if (newQuantity >= 1) {
                updateCart(productId, newQuantity);
            }
        });

        function updateCart(productId, quantity) {
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.update') }}', // Replace with your actual route for updating cart
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if(response.success) {
                    toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    // Update quantity input display
                    $('.quantity-input[data-product-id="' + productId + '"]').val(quantity);

                    // Update price details section
                    $('.price-details').html(`
                        <h5>PRICE DETAILS</h5>
                        <hr>
                        <p>Price (${response.cartCount} items): <span class="float-right">₹${response.totalPrice}</span></p>
                        <p>Discount: <span class="float-right text-success">- ₹${response.totalDiscount}</span></p>
                        <p>Delivery Charges: <span class="float-right text-success">${response.deliveryCharges == 0 ? 'Free' : '₹' + response.deliveryCharges}</span></p>
                        <hr>
                        <p class="total">Total Amount: <span class="float-right">₹${response.totalAmount}</span></p>
                        <p class="text-success">You will save ₹${response.totalDiscount} on this order</p>
                    `);
                },
                error: function(err) {
                    console.error('Error updating cart:', err);
                    // Handle errors if any
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.save-for-later').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: '{{ route('cart.saveForLater') }}', // Replace with your actual route for saving for later
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                if(response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }

                    $(e.target).closest('.product-card1').remove();
                },
                error: function(err) {
                    console.error('Error saving product for later:', err);
                    // Handle errors if any
                }
            });
        });
    });



    $(document).ready(function() {
    $('.btn-prodadd').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "{{ route('add.to.cart') }}",
            method: 'POST',
            data: {
                _token: token,
                id: productId
            },
            success: function(response) {
                if (response.success) {
                    $('#cart-count').text(response.cartCount);
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }


            }
        });
    });
});
</script>

</body>

</html>
