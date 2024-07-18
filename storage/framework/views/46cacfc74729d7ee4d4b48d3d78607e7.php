
    <li>
        <a href="#menu5" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-sitemap"></i><?php echo e(__('Manage Categories')); ?></a>
        <ul class="collapse list-unstyled
        <?php if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category'): ?>
          show
        <?php elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory'): ?>
          show
        <?php elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory'): ?>
          show
        <?php elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='subchildcategory'): ?>
          show
        <?php endif; ?>" id="menu5" data-parent="#accordion" >
                <li class="<?php if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category'): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('admin-cat-index')); ?>"><span><?php echo e(__('Main Category')); ?></span></a>
                </li>
                <li class="<?php if(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory'): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('admin-subcat-index')); ?>"><span><?php echo e(__('Sub Category')); ?></span></a>
                </li>
                <li class="<?php if(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory'): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('admin-childcat-index')); ?>"><span><?php echo e(__('Child Category')); ?></span></a>
                </li>
                
        </ul>
    </li>
    <li>
        <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-cart"></i><?php echo e(__('Products')); ?>

        </a>
        <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
            <li>
                <a href="<?php echo e(route('admin-prod-physical-create')); ?>"><span><?php echo e(__('Add New Product')); ?></span></a>
            </li>
            <li>
                <a href="<?php echo e(route('admin-prod-index')); ?>"><span><?php echo e(__('All Products')); ?></span></a>
            </li>
            <li>
                <a href="<?php echo e(route('admin-prod-deactive')); ?>"><span><?php echo e(__('Deactivated Product')); ?></span></a>
            </li>
        </ul>
    </li>

    

    

    
    

    

    <li>
        <a href="#menu33" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-upload"></i><?php echo e(__('Bulk Product Upload')); ?>

        </a>
        <ul class="collapse list-unstyled" id="menu33" data-parent="#accordion">
            <li>
                <a href="<?php echo e(route('admin-prod-import')); ?>"><span><?php echo e(__('Product Upload')); ?></span></a>
            </li>
            <li>
                <a href="<?php echo e(route('admin-prod-imgae-import')); ?>"><span><?php echo e(__('Product Image')); ?></span></a>
            </li>
        </ul>
    </li>

    


    


    

    

    
    

    


        
        <li>
            <a href="<?php echo e(route('admin-cache-clear')); ?>" class=" wave-effect"><i class="fas fa-sync"></i><?php echo e(__('Clear Cache')); ?></a>
        </li>
<?php /**PATH D:\xampp\htdocs\Green Coding\newmjcreation\resources\views/includes/admin/roles/super.blade.php ENDPATH**/ ?>