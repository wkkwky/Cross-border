

<?php $__env->startSection('content'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Manual Payment Information')); ?></h5>
        </div>

        <form action="<?php echo e(route('manual_payment_methods.store')); ?>" method="POST">
        	<?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="type"><?php echo e(translate('Type')); ?></label>
                    <div class="col-sm-10">
                        <select class="form-control aiz-selectpicker" name="type" id="type" required>
                            <option value="custom_payment"><?php echo e(translate('Custom Payment')); ?></option>
                            <option value="bank_payment"><?php echo e(translate('Bank Payment')); ?></option>
                            <option value="check_payment"><?php echo e(translate('Check Payment')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Name')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="heading" value="" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="signinSrEmail"><?php echo e(translate('Checkout Thumbnail')); ?> (438x235)px</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                            </div>
                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                            <input type="hidden" name="photo" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label"><?php echo e(translate('Payment Instruction')); ?></label>
                    <div class="col-sm-10">
                        <textarea class="aiz-text-editor" name="description"></textarea>
                    </div>
                </div>
                <div id="bank_payment_data">
                    <div id="bank_payment_informations">
                        <div class="form-group row">
                            <div class="row">
                                <label class="col-sm-2 col-from-label"><?php echo e(translate('Bank Information')); ?></label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-3"><input type="text" id="bank_name" name="bank_name[]" class="form-control" placeholder="<?php echo e(translate('Bank Name')); ?>"></div>
                                        <div class="col-sm-3"><input type="text" id="account_name" name="account_name[]" class="form-control" placeholder="<?php echo e(translate('Account Name')); ?>"></div>
                                        <div class="col-sm-3"><input type="text" id="account_number" name="account_number[]" class="form-control" placeholder="<?php echo e(translate('Account Number')); ?>"></div>
                                        <div class="col-sm-3"><input type="text" id="routing_number" name="routing_number[]" class="form-control" placeholder="<?php echo e(translate('Routing Number')); ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onclick="addBankInfoRow()"><?php echo e(translate('Add More')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </div>
        </form>

        <div class="d-none" id="bank_info_row">
            <div class="form-group row">
                <div class="row">
                    <label class="col-sm-2 col-from-label"><?php echo e(translate('Bank Information')); ?></label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-3"><input type="text" name="bank_name[]" class="form-control" placeholder="<?php echo e(translate('Bank Name')); ?>"></div>
                            <div class="col-sm-3"><input type="text" name="account_name[]" class="form-control" placeholder="<?php echo e(translate('Account Name')); ?>"></div>
                            <div class="col-sm-3"><input type="text" name="account_number[]" class="form-control" placeholder="<?php echo e(translate('Account Number')); ?>"></div>
                            <div class="col-sm-3"><input type="text" name="routing_number[]" class="form-control" placeholder="<?php echo e(translate('Routing Number')); ?>"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger" onclick="removeBankInfoRow(this)"><?php echo e(translate('Remove')); ?></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#bank_payment_data').hide();

            $('#type').on('change', function(){
                if($('#type').val() == 'bank_payment'){
                    $('#bank_payment_data').show();
                }
                else {
                    $('#bank_payment_data').hide();
                }
            });
        });

        function addBankInfoRow(){
            $('#bank_payment_informations').append($('#bank_info_row').html());
        }

        function removeBankInfoRow(el){
            $(el).closest('.form-group').remove();
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/manual_payment_methods/create.blade.php ENDPATH**/ ?>