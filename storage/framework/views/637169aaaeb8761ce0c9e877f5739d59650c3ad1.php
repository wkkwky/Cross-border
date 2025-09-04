<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Refferal Users')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Name')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Phone')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Email Address')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Reffered By')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Second level recommender')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Third level recommender')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $refferal_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $refferal_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($refferal_user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($refferal_users->currentPage() - 1)*$refferal_users->perPage()); ?></td>
                            <td>
                                <?php echo e($refferal_user->name); ?>

                                <div>
                                    <a href="<?php echo e(route('withdraw_requests_all_by_user')); ?>?user_id=<?php echo e($refferal_user->id); ?>">
                                        <?php echo e(translate('Withdraw Requests')); ?>

                                    </a>
                                </div>
                                <a href="<?php echo e(route('offline_wallet_recharge_request_by_seller.index')); ?>?user_id=<?php echo e($refferal_user->id); ?>">
                                    <?php echo e(translate('Offline Wallet Recharge Requests')); ?>

                                </a>
                            </td>
                            <td><?php echo e($refferal_user->phone); ?></td>
                            <td><?php echo e($refferal_user->email); ?></td>
                            <td>
                                <span>
                                <?php echo e($refferal_user->referrer->name); ?> (<?php echo e($refferal_user->referrer->email); ?>)
                                </span>
                            </td>
                            <td>
                                <?php if($refferal_user->referrer->referrer != null): ?>
                                    <span>
                                    <?php echo e($refferal_user->referrer->referrer->name); ?> (<?php echo e($refferal_user->referrer->referrer->email); ?>)
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($refferal_user->referrer->referrer->referrer != null): ?>
                                    <span>
                                    <?php echo e($refferal_user->referrer->referrer->referrer->name); ?> (<?php echo e($refferal_user->referrer->referrer->referrer->email); ?>)
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($refferal_users->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/affiliate/refferal_users.blade.php ENDPATH**/ ?>