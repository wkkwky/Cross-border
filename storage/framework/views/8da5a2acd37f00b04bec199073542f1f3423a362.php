

<?php $__env->startSection('content'); ?>
    <h4 class="text-center text-muted"><?php echo e(translate('Activate OTP')); ?></h4>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('Nexmo OTP')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'nexmo')" <?php if(\App\Models\OtpConfiguration::where('type', 'nexmo')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('Twilio OTP')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'twillo')" <?php if(\App\Models\OtpConfiguration::where('type', 'twillo')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('SSL Wireless OTP')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'ssl_wireless')" <?php if(\App\Models\OtpConfiguration::where('type', 'ssl_wireless')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('Fast2SMS OTP')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'fast2sms')" <?php if(App\Models\OtpConfiguration::where('type', 'fast2sms')->first() != null && \App\Models\OtpConfiguration::where('type', 'fast2sms')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('MIMO OTP')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'mimo')" <?php if(App\Models\OtpConfiguration::where('type', 'mimo')->first() != null && \App\Models\OtpConfiguration::where('type', 'mimo')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('MIMSMS')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'mimsms')" <?php if(\App\Models\OtpConfiguration::where('type', 'mimsms')->first() != null && \App\Models\OtpConfiguration::where('type', 'mimsms')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('MSEGAT SMS')); ?></h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'msegat')" <?php if(\App\Models\OtpConfiguration::where('type', 'msegat')->first() != null && \App\Models\OtpConfiguration::where('type', 'msegat')->first()->value == 1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('<?php echo e(route('otp_configurations.update.activation')); ?>', {_token:'<?php echo e(csrf_token()); ?>', type:type, value:value}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Settings updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/otp_systems/configurations/activation.blade.php ENDPATH**/ ?>