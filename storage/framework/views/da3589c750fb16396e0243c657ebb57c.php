<?php $__env->startSection('title', 'Mjcreation'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card1 d-flex align-items-center mb-3">
                <img src="<?php echo e(asset('assets/images/products/' . $item['image'])); ?>" class="img-fluid" alt="Product Image">
                <div class="ml-3">
                    <h5><?php echo e($item['name']); ?></h5>
                    <p>Seller: NiraFragrances</p>
                    <p>MRP: <s>₹<?php echo e($item['price'] + $item['price'] * 0.02); ?></s> <span class="discount-text">₹<?php echo e($item['price']); ?></span> <span class="offer-badge">2% off</span> <span class="text-success">2 offers applied</span></p>
                    <p class="delivery-info">Delivery by Thu Jun 27 | <s>₹40.00</s> <span class="text-success">Free</span></p>
                    <div class="d-flex align-items-center">
                        <div class="quantity-buttons">
                            <button type="button" class="btn-decrement" data-product-id="<?php echo e($item['id']); ?>">-</button>
                            <input type="number" value="<?php echo e($item['quantity']); ?>" class="form-control quantity-input" data-product-id="<?php echo e($item['id']); ?>">
                            <button type="button" class="btn-increment" data-product-id="<?php echo e($item['id']); ?>">+</button>
                        </div>
                        <div class="action-buttons">
                            <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($item['id']); ?>">
                                <button type="submit" class="btn btn-outline-secondary ml-2">Remove</button>
                            </form>
                            <button class="btn btn-outline-secondary ml-2 save-for-later" data-product-id="<?php echo e($item['id']); ?>">Save for later</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-lg-4">
            <div class="price-details">
                <h5>PRICE DETAILS</h5>
                <hr>
                <p>Price (<?php echo e(count($cart)); ?> items): <span class="float-right">₹<?php echo e($totalPrice); ?></span></p>
                <p>Discount: <span class="float-right text-success">- ₹<?php echo e($totalDiscount); ?></span></p>
                <p>Delivery Charges: <span class="float-right text-success"><?php echo e($deliveryCharges == 0 ? 'Free' : '₹' . $deliveryCharges); ?></span></p>
                <hr>
                <p class="total">Total Amount: <span class="float-right">₹<?php echo e($totalAmount); ?></span></p>
                <p class="text-success">You will save ₹<?php echo e($totalDiscount); ?> on this order</p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/website/cart.blade.php ENDPATH**/ ?>