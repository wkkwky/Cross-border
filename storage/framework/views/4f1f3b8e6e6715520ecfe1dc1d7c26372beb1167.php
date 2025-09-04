
<?php $__env->startSection('panel_content'); ?>

    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3"><?php echo e(translate('Add Your Coupon')); ?></h1>
            </div>
        </div>
    </div>

    <div class="row gutters-5">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Coupon Information Adding')); ?></h5>
                </div>
                
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('seller.coupon.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="mt-3">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label" for="name"><?php echo e(translate('Coupon Type')); ?></label>
                            <div class="col-lg-9">
                                <select name="type" id="coupon_type" class="form-control aiz-selectpicker" onchange="coupon_form()" required>
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                    <option value="product_base" <?php if(old('type') == 'product_base'): ?> selected <?php endif; ?>><?php echo e(translate('For Products')); ?></option>
                                    <option value="cart_base" <?php if(old('type') == 'cart_base'): ?> selected <?php endif; ?>><?php echo e(translate('For Total Orders')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div id="coupon_form">

                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    function coupon_form(){
        var coupon_type = $('#coupon_type').val();
		$.post('<?php echo e(route('seller.coupon.get_coupon_form')); ?>',{_token:'<?php echo e(csrf_token()); ?>', coupon_type:coupon_type}, function(data){
            $('#coupon_form').html(data);
		});
    }

    <?php if($errors->any()): ?>
        coupon_form();
    <?php endif; ?>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/seller/coupons/create.blade.php ENDPATH**/ ?>