

<?php $__env->startSection('panel_content'); ?>
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <b class="h4"><?php echo e(translate('Wishlist')); ?></b>
            </div>
        </div>
    </div>

    <div class="row gutters-5">
        <?php $__empty_1 = true; $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($wishlist->product != null): ?>
                <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6" id="wishlist_<?php echo e($wishlist->id); ?>">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <a href="<?php echo e(route('product', $wishlist->product->slug)); ?>" class="d-block mb-3">
                                <img src="<?php echo e(uploaded_asset($wishlist->product->thumbnail_img)); ?>" class="img-fit h-140px h-md-200px">
                            </a>

                            <h5 class="fs-14 mb-0 lh-1-5 fw-600 text-truncate-2">
                                <a href="<?php echo e(route('product', $wishlist->product->slug)); ?>" class="text-reset"><?php echo e($wishlist->product->getTranslation('name')); ?></a>
                            </h5>
                            <div class="rating rating-sm mb-1">
                                <?php echo e(renderStarRating($wishlist->product->rating)); ?>

                            </div>
                            <div class=" fs-14">
                                  <?php if(home_base_price($wishlist->product) != home_discounted_base_price($wishlist->product)): ?>
                                      <del class="opacity-60 mr-1"><?php echo e(home_base_price($wishlist->product)); ?></del>
                                  <?php endif; ?>
                                      <span class="fw-600 text-primary"><?php echo e(home_discounted_base_price($wishlist->product)); ?></span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="link link--style-3" data-toggle="tooltip" data-placement="top" title="Remove from wishlist" onclick="removeFromWishlist(<?php echo e($wishlist->id); ?>)">
                                <i class="la la-trash la-2x"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-block btn-primary ml-3" onclick="showAddToCartModal(<?php echo e($wishlist->product->id); ?>)">
                                <i class="la la-shopping-cart mr-2"></i><?php echo e(translate('Add to cart')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col">
                <div class="text-center bg-white p-4 rounded shadow">
                    <img class="mw-100 h-200px" src="<?php echo e(static_asset('assets/img/nothing.svg')); ?>" alt="Image">
                    <h5 class="mb-0 h5 mt-3"><?php echo e(translate("There isn't anything added yet")); ?></h5>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="aiz-pagination">
        <?php echo e($wishlists->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="addToCart-modal-body">

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('<?php echo e(route('wishlists.remove')); ?>',{_token:'<?php echo e(csrf_token()); ?>', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                AIZ.plugins.notify('success', '<?php echo e(translate('Item has been renoved from wishlist')); ?>');
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/frontend/user/view_wishlist.blade.php ENDPATH**/ ?>