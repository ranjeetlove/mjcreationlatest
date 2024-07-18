<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('assets/admin/css/product.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading"><?php echo e(__("Product Bulk Upload")); ?></h4>
                <ul class="links">
                    <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__("Dashboard")); ?> </a>
                    </li>
                    <li>
                        <a href="javascript:;"><?php echo e(__("Products")); ?> </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin-prod-index')); ?>"><?php echo e(__("All Products")); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin-prod-imgae-import')); ?>"><?php echo e(__("Bulk Image Upload")); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="add-product-content">
        <div class="row">
            <div class="col-lg-12 p-5">
                <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center;"></div>
                <form id="bulkImageUploadForm" action="<?php echo e(route('admin-prod-image-importsubmit')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-lg-12 d-flex justify-content-center text-center">
                        <div class="left-area mr-4">
                            <h4 class="heading"><?php echo e(__("Upload Image")); ?> *</h4>
                        </div>
                        <span class="file-btn">
                            <input type="file" name="images[]" multiple>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-4 text-center">
                            <button class="mybtn1 mr-5" type="submit"><?php echo e(__("Start Upload")); ?></button>
                        </div>
                    </div>
                </form>
                <div id="successMessage" class="alert alert-success mt-4" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/product.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#bulkImageUploadForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage').html(response.message).fadeIn();
                     setTimeout(function() {
                        $('#successMessage').fadeOut();
                    }, 5000);
                    $('#bulkImageUploadForm')[0].reset();
                },
                error: function(response) {
                    $('#successMessage').html('An error occurred while uploading the images.').fadeIn();
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/admin/product/productimgaecsv.blade.php ENDPATH**/ ?>