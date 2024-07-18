<?php $__env->startSection('title', 'Mjcreation'); ?>
<?php $__env->startSection('content'); ?>


    <section>
        <div class="container">
            <div class="row">
                <span>Home > Wishlist</span>
            </div>
            <div class="row">
                <div class="whish-bg mt-3">
                    <?php if($wishlists->count() > 0): ?>
                        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <div class="whish-prod mt-5">
                                    <a href="<?php echo e(route('product-detail', ['id' => $wishlist->product->id])); ?>">
                                        <img src="<?php echo e(asset('assets/images/products/' . $wishlist->product->photo)); ?>"
                                            class="mcard-img" alt="<?php echo e($wishlist->product->name); ?>" />
                                    </a>
                                    <p class="whish-title">
                                        <?php echo e($wishlist->product->name); ?><br />
                                        ₹ <?php echo e($wishlist->product->price); ?>

                                    </p>
                                    <div class="trash-icon">
                                        <form method="POST" action="<?php echo e(route('wishlist.remove', $wishlist->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="fa fa-trash-o">Delete</i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 text-center">
                            <p>No products found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/website/wishlist.blade.php ENDPATH**/ ?>