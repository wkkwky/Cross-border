
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Convert Point To Wallet')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('point_convert_rate_store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="club_point_convert_rate">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('Set Point For ')); ?> <?php echo e(single_price(1)); ?></label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" value="<?php echo e(get_setting('club_point_convert_rate')); ?>" placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('Points')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3 text-right">
								<button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
						</div>
                    </form>
                    <i class="fs-12"><b><?php echo e(translate('Note: You need to activate wallet option first before using club point addon.')); ?></b></i>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/club_points/config.blade.php ENDPATH**/ ?>