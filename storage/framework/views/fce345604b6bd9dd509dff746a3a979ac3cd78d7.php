<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <?php if(discount_in_percentage($product) > 0): ?>
        <span class="badge-custom"><?php echo e(translate('OFF')); ?><span class="box ml-1 mr-0">&nbsp;<?php echo e(discount_in_percentage($product)); ?>%</span></span>
    <?php endif; ?>
    <div class="position-relative">
        <?php
            $product_url = route('product', $product->slug);
            if($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
        ?>
        <a href="<?php echo e($product_url); ?>" class="d-block">
            <img
                class="img-fit lazyload mx-auto h-140px h-md-210px"
                src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                alt="<?php echo e($product->getTranslation('name')); ?>"
                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
            >
        </a>
        <?php if($product->wholesale_product): ?>
            <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
                <?php echo e(translate('Wholesale')); ?>

            </span>
        <?php endif; ?>
        <div class="absolute-top-right aiz-p-hov-icon">
            <a href="javascript:void(0)" onclick="addToWishList(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to wishlist')); ?>" data-placement="left">
                <i class="la la-heart-o"></i>
            </a>
            <a href="javascript:void(0)" onclick="addToCompare(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to compare')); ?>" data-placement="left">
                <i class="las la-sync"></i>
            </a>
            <a href="javascript:void(0)" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to cart')); ?>" data-placement="left">
                <i class="las la-shopping-cart"></i>
            </a>
        </div>
    </div>
    <div class="p-md-3 p-2 text-left">
        <div class="fs-15">
            <?php if(home_base_price($product) != home_discounted_base_price($product)): ?>
                <del class="fw-600 opacity-50 mr-1"><?php echo e(home_base_price($product)); ?></del>
            <?php endif; ?>
            <span class="fw-700 text-primary"><?php echo e(home_discounted_base_price($product)); ?></span>
        </div>
        <div class="rating rating-sm mt-1">
            <?php echo e(renderStarRating($product->rating)); ?>

        </div>
        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
            <a href="<?php echo e($product_url); ?>" class="d-block text-reset"><?php echo e($product->getTranslation('name')); ?></a>
        </h3>
        <?php if(addon_is_activated('club_point')): ?>
            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                <?php echo e(translate('Club Point')); ?>:
                <span class="fw-700 float-right"><?php echo e($product->earn_point); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/frontend/partials/product_box_1.blade.php ENDPATH**/ ?>