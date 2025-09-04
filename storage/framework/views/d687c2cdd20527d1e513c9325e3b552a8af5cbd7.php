

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Affiliate Logs')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="lg"><?php echo e(translate('Referred By')); ?></th>
                    <th><?php echo e(translate('Referral User')); ?></th>
                    <th><?php echo e(translate('Amount')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Order Id')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Referral Type')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Product')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Date')); ?></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $affiliate_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $affiliate_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($affiliate_log->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($affiliate_logs->currentPage() - 1)*$affiliate_logs->perPage()); ?></td>
                            <td>
                                <?php echo e(optional(\App\Models\User::where('id', $affiliate_log->referred_by_user)->first())->name); ?>

                            </td>
                            <td>
                                <?php if($affiliate_log->user_id !== null): ?>
                                    <?php echo e(optional($affiliate_log->user)->name); ?>

                                <?php else: ?>
                                    <?php echo e(translate('Guest').' ('. $affiliate_log->guest_id.')'); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e(single_price($affiliate_log->amount)); ?></td>
                            <td>
                                <?php if($affiliate_log->order_id != null): ?>
                                    <?php echo e(optional($affiliate_log->order)->code); ?>

                                <?php else: ?>
                                    <?php echo e(optional($affiliate_log->order_detail->order)->code); ?>

                                <?php endif; ?>
                            </td>
                            <td> <?php echo e(ucwords(str_replace('_',' ', $affiliate_log->affiliate_type))); ?></td>
                            <td>
                                <?php if($affiliate_log->order_detail_id != null && $affiliate_log->order_detail): ?>
                                    <?php echo e(optional($affiliate_log->order_detail->product)->name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($affiliate_log->created_at->format('d, F Y')); ?> </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($affiliate_logs->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/affiliate/affiliate_logs.blade.php ENDPATH**/ ?>