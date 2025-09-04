

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('Google reCAPTCHA Setting')); ?></h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('google_recaptcha.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo e(translate('Google reCAPTCHA')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="google_recaptcha" type="checkbox" <?php if(get_setting('google_recaptcha') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="CAPTCHA_KEY">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo e(translate('Site KEY')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="CAPTCHA_KEY" value="<?php echo e(env('CAPTCHA_KEY')); ?>" placeholder="<?php echo e(translate('Site KEY')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/backend/setup_configurations/google_configuration/google_recaptcha.blade.php ENDPATH**/ ?>