
<?php $__env->startSection('panel_content'); ?>

    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3"><?php echo e(translate('Purchase Package List')); ?></h1>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6"><?php echo e(translate('All Purchase Package')); ?></h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="30%"><?php echo e(translate('Package')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Package Price')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Payment Type')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $seller_packages_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($seller_packages_payment->currentPage() - 1) * $seller_packages_payment->perPage()); ?></td>
                            <td><?php echo e($payment->seller_package->name); ?></td>
                            <td><?php echo e($payment->seller_package->amount); ?></td>
                            <td>
                                <!-- <?php if($payment->offline_payment == 1): ?>
                                    <?php echo e(translate('Offline Payment')); ?>

                                <?php else: ?>
                                    <?php echo e(translate('Online Payment')); ?>

                                <?php endif; ?> -->
                                <?php echo e(translate($payment->payment_method)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($seller_packages_payment->links()); ?>

          	</div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/seller_packages/frontend/packages_payment_list.blade.php ENDPATH**/ ?>