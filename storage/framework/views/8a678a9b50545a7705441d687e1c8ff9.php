<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.green.css')); ?> "/>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website-assets/css/style.css')); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toaster.min.css')); ?>">
</head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body class="">

    <?php echo $__env->make('website.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('website.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->yieldContent('page-script'); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/toaster.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

<script>
    $(document).ready(function() {
        $('.btn-whishlist').click(function(e) {
            e.preventDefault();
             //var productId = $(this).data('product-id');
             //var productId = $(this).attr('data-product-id');
            var productId = '20';
            var token = $("meta[name='csrf-token']").attr("content");
            console.log("Product ID:", productId); // For debugging

            $.ajax({
                url: "<?php echo e(route('add.to.wishlist')); ?>",
                method: "POST",
                data: {
                    _token: token,
                    product_id: productId
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
                url: '<?php echo e(route("products.sort")); ?>',
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
                url: '<?php echo e(route('cart.update')); ?>',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if(response.success) {
                    toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('.quantity-input[data-product-id="' + productId + '"]').val(quantity);
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
                url: '<?php echo e(route('cart.saveForLater')); ?>',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
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
                }
            });
        });
    });



    $(document).ready(function() {
    $('.btn-prodadd').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        console.log('addToCart',productId);
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "<?php echo e(route('add.to.cart')); ?>",
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
<?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/website/layout/main.blade.php ENDPATH**/ ?>