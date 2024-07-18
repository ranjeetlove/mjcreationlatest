<?php $__env->startSection('title', 'Mjcreation'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Banner Section -->
    <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <?php if($banner->count() > 0): ?>
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>" aria-current="true" aria-label="Slide <?php echo e($index); ?>"></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </div>
        <div class="carousel-inner">
        <?php if($banner->count() > 0): ?>
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                        <img src="<?php echo e(asset('assets/images/sliders/' . $item->photo)); ?>" class="d-block w-100" alt="banner image" />
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <!-- <div class="container-fluid">
            <div class="owl-carousel owl-theme" id="home-owl-carousel">
                <?php if($banner->count() > 0): ?>
                    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <img src="<?php echo e(asset('assets/images/sliders/' . $item->photo)); ?>" alt="banner image" />
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <p>No products found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div> -->
    </section>
    <section class="product-listing">
        <!-- <div class="container">
            <div class="row">
                <div class="col-4"></div>
            </div>
        </div> -->
        <div class="container">
            <?php $__currentLoopData = $datalist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="prod-collection mt-5 mb-2">
                        <h5><?php echo e($category->name); ?></h5>
                        <a class="btn view-more-btn" href="<?php echo e(route('product-list', ['id' => $category->id])); ?>" id="product-list-link">
                            View more
                        </a>
                    </div>
                </div>
                <div class="row gx-5">
                    <?php if($category->products->count() > 0): ?>
                        <?php $__currentLoopData = $category->products->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3">
                                <div class="prod-box">
                                    <a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>">
                                        <div class="prodcut-img-outer-box">
                                        <img src="<?php echo e(asset('assets/images/products/' . $product->photo)); ?>"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>"><?php echo e($product->name); ?></a></h3>
                                    <?php if(!empty($product->price)): ?>
                                    <span class="prod-title prodcut-price">₹<?php echo e($product->price); ?> </span>
                                    <?php else: ?>
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="<?php echo e(route('add.to.cart')); ?>" class="add-to-cart-form">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="<?php echo e($product->id); ?>">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="<?php echo e($product->id); ?>">Wishlist</button>
                                    </div>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <img src="<?php echo e(asset('uploads/banner/category-banner-1.jpg')); ?>" class="img-fluid" />
            </div>
        </div>
    </section>

    <!--------------Start  Other---------->
    <?php $__currentLoopData = $datalistafter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="my-5">
            <div class="container">
                <div class="poojam-sec">
                    <h5><?php echo e($category->name); ?></h5>
                </div>
                <div class="carousel-wrap">
                    <div class="owl-carousel" id="poojamCarousel">
                        <?php if($category->products->count() > 0): ?>
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="prod-box">
                                    <a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>">
                                        <div class="prodcut-img-outer-box">
                                        <img src="<?php echo e(asset('assets/images/products/' . $product->photo)); ?>"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>"><?php echo e($product->name); ?></a></h3>
                                    <?php if(!empty($product->price)): ?>
                                    <span class="prod-title prodcut-price">₹<?php echo e($product->price); ?> </span>
                                    <?php else: ?>
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="<?php echo e(route('add.to.cart')); ?>" class="add-to-cart-form">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="<?php echo e($product->id); ?>">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="<?php echo e($product->id); ?>">Wishlist</button>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!---------- end other ---------->
    <section class="my-5">
        <div class="container">
            <div class="poojam-sec">
                <h5>Most Viewed Products</h5>
            </div>
            <div class="carousel-wrap">
                <div class="owl-carousel" id="viewspCarousel">
                    <?php if($mostViewedProducts->count() > 0): ?>
                        <?php $__currentLoopData = $mostViewedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="prod-box">
                                    <a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>">
                                        <div class="prodcut-img-outer-box">
                                        <img src="<?php echo e(asset('assets/images/products/' . $product->photo)); ?>"
                                        class="prod-img mb-2" />
                                         </div>
                                    </a>
                                    <div class="product-content">
                                    <h3 class="prod-title"><a href="<?php echo e(route('product-detail', ['id' => $product->id])); ?>"><?php echo e($product->name); ?></a></h3>
                                    <?php if(!empty($product->product)): ?>
                                    <span class="prod-title prodcut-price">₹<?php echo e($product->price); ?> </span>
                                    <?php else: ?>
                                    <span class="prod-title prodcut-price">₹ --</span><br />
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between py-2">
                                        <form method="POST" action="<?php echo e(route('add.to.cart')); ?>" class="add-to-cart-form">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-prodadd addtocart w-100" data-id="<?php echo e($product->id); ?>">Add to Cart</button>
                                        </form>
                                        <button class="btn btn-whishlist"
                                            data-product-id="<?php echo e($product->id); ?>">Wishlist</button>
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
<!-- ===================================================================== -->
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="sidebar-sec">
                    <h5>ON SALE</h5>
                    <div class="product-item">
                        <img src="<?php echo e(asset('img/image25(1).png')); ?>" alt="Product 1" />
                        <div class="product-info">
                            <div class="product-title">
                                Ganapathi Homam / Ganesh Homam / Gana homa / Ganesh Puja
                            </div>
                            <div class="product-product_measurment_quantity_price">₹ 499</div>
                            <div class="product-icons mt-5">
                                <img src="<?php echo e(asset('img/shopping-cart (1).png')); ?>" alt=""
                                    class="productb-image" />
                                <img src="<?php echo e(asset('img/eye (1).png')); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="<?php echo e(asset('img/image26.png')); ?>" alt="Product 2" />
                        <div class="product-info">
                            <div class="product-title">
                                Citrine Mala / Sunehla Stone Mala 108 Beads (8 mm)
                            </div>
                            <div class="product-product_measurment_quantity_price">₹ 2,200</div>
                            <div class="product-icons mt-5">
                                <img src="<?php echo e(asset('img/shopping-cart (1).png')); ?>" alt=""
                                    class="productb-image" />
                                <img src="<?php echo e(asset('img/eye (1).png')); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="product-item" style="border-bottom: none">
                        <img src="<?php echo e(asset('img/image27.png')); ?>" alt="Product 3" />
                        <div class="product-info">
                            <div class="product-title mt-2">
                                Sphatika Mala / Spadikam Mala / Crystal Quartz Beads
                            </div>
                            <div class="product-product_measurment_quantity_price">₹ 2,200</div>
                            <div class="product-icons mt-5">
                                <img src="<?php echo e(asset('img/shopping-cart (1).png')); ?>" alt=""
                                    class="productb-image" />
                                <img src="<?php echo e(asset('img/eye (1).png')); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-section">
                    <img src="<?php echo e(asset('img/image 34.png')); ?>" alt="" class="mb-5" />
                    <p>CUSTOMER SERVICE</p>
                    <p>Call us: +91 0987654321</p>
                    <p>9.00 AM to 7.30 PM</p>
                </div>
                <div class="info-section">
                    <img src="<?php echo e(asset('img/image33.png')); ?>" alt="" class="mb-5" />
                    <p>SHIPPING WORLDWIDE</p>
                    <p>On order over Rs.5000 - 7 days a week</p>
                </div>
                <div class="info-section">
                    <img src="<?php echo e(asset('img/image35.png')); ?>" alt="" class="mb-5" />
                    <p>MONEY BACK GUARANTEE!</p>
                    <p>Send within 30 days</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/website/home.blade.php ENDPATH**/ ?>