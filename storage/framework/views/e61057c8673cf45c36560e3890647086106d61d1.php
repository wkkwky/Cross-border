<?php $__env->startSection('content'); ?>

    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Create New Seller Package')); ?></h5>
            </div>

            <form class="form-horizontal" action="<?php echo e(route('seller_packages.store')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Package Name')); ?></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-from-label" for="amount"><?php echo e(translate('Amount')); ?></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" step="0.01" placeholder="<?php echo e(translate('Amount')); ?>" id="amount" name="amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-from-label" for="product_upload_limit"><?php echo e(translate('Product Upload Limit')); ?></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" step="1" placeholder="<?php echo e(translate('Product Upload Limit')); ?>" id="product_upload_limit" name="product_upload_limit" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-from-label" for="duration"><?php echo e(translate('Duration')); ?></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" step="1" placeholder="<?php echo e(translate('Validity in number of days')); ?>" id="duration" name="duration" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="signinSrEmail"><?php echo e(translate('Package Logo')); ?></label>
                        <div class="col-md-10">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                </div>
                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                <input type="hidden" name="logo" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-from-label" for="duration"><?php echo e(translate('Max profit')); ?></label>
                        <div class="input-group col-sm-10">
                            <input type="number" min="0" step="1" placeholder="<?php echo e(translate('Max profit')); ?>" value="" id="max_profit" name="max_profit" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/seller_packages/create.blade.php ENDPATH**/ ?>