<?php $__env->startSection('title', 'Mjcreation'); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">
            <div class="row">
                <span>Home > Dhoop Collection > Hari Darshan Deluxe Doop 20 Sticks</span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-image">
                        <img src="<?php echo e(asset('assets/images/products/' . $product->photo)); ?>" title="<?php echo e($product->name); ?>"
                            class="" id="main-image" />
                    </div>
                    <div class="row mt-3">
                        <div class="prod-gallery">
                            <div class="thum-box">
                                <img src="<?php echo e(asset('img/image-36.png')); ?>" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="<?php echo e(asset('img/image-37.png')); ?>" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="<?php echo e(asset('img/image-38.png')); ?>" class="thumbnail" />
                            </div>
                            <div class="thum-box">
                                <img src="<?php echo e(asset('img/image-40.png')); ?>" class="thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="product-title"><?php echo e($product->name); ?></h1>
                    <div>
                        <span>MRP :</span><span> ₹ <?php echo e($product->price); ?></span><span>
                            ₹23.00</span><span>2%off</span>
                    </div>
                    <span>Availability: <?php echo e($product->stock); ?> in stock</span>
                    <div class="add-btn my-3">
                        <form method="POST" action="<?php echo e(route('add.to.cart')); ?>" class="add-to-cart-form">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-prodadd addtocart" data-id="<?php echo e($product->id); ?>">Add to Cart</button>
                        </form>
                        <button class="buy-now">
                            <i class="fa fa-shopping-bag"></i> Buy Now
                        </button>
                    </div>

                    <div class="paym">
                        <div class="paym1">
                            <span class="c-card"><i class="fa fa-credit-card"></i></span>
                            <div>
                                <b>Payment.</b>Payment upon receipt of goods, Payment by card
                                in the department, Google Pay, Online card, -5% discount in
                                case of payment
                            </div>
                        </div>
                        <hr />
                        <div class="paym1">
                            <span class="c-card"><i class="fa fa-credit-card"></i></span>
                            <div>
                                <b>Warranty.</b> The Consumer Protection Act does not provide
                                for the return of this product of proper quality.
                            </div>
                        </div>
                    </div>
                    <div class="whish mt-3">
                        <div class="me-3">
                            <span><i class="fa fa-heart-o"></i></span>Add to wishlist
                        </div>
                        <div class="me-3">
                            <span><i class="fa fa-share"></i></span>Share this Product
                        </div>
                        <div class="me-3">
                            <span><i class="fa fa-retweet"></i></span>Compare
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
                            Reviews (2)
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
                        <?php echo $product->meta_description; ?>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        Hari Darshan Deluxe Dhoop Sticks have a sweet and serene fragrance
                        that adds to the purity of your pooja ceremony. These dhoop sticks
                        also can be used as an aromatic room freshener. So go ahead and
                        buy this product online today! Hari Darshan Deluxe Dhoop Sticks
                        have a sweet and serene fragrance that adds to the purity of your
                        pooja ceremony. These dhoop sticks also can be used as an aromatic
                        room freshener. So go ahead and buy this product online today!
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
                <?php if($relatedproducts->count() > 0): ?>
                    <?php $__currentLoopData = $relatedproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3">
                            <div class="prod-box">
                                <a href="<?php echo e(route('product-detail', ['id' => $relatedproduct->id])); ?>">
                                    <img src="<?php echo e(asset('assets/images/products/' . $relatedproduct->photo)); ?>"
                                        class="prod-img mb-2" />
                                </a>
                                <span class="prod-title"><?php echo e($relatedproduct->name); ?></span><br />
                                <span class="prod-title">₹<?php echo e($relatedproduct->price); ?></span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/website/product-detail.blade.php ENDPATH**/ ?>