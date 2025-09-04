

<?php $__env->startSection('panel_content'); ?>

<div class="card">
    <form class="" id="sort_customers" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-0 h6"><?php echo e(translate('Notifications')); ?></h5>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($notification->type == 'App\Notifications\OrderNotification'): ?>
                        <li class="list-group-item d-flex justify-content-between align-items- py-3">
                            <div class="media text-inherit">
                                <div class="media-body">
                                    <p class="mb-1 text-truncate-2">
                                        <?php echo e(translate('Your Order: ')); ?>

                                        <a href="<?php echo e(route('purchase_history.details', encrypt($notification->data['order_id']))); ?>">
                                            <?php echo e($notification->data['order_code']); ?>

                                        </a>
                                        <?php echo e(translate(' has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))); ?>

                                    </p>
                                    <small class="text-muted">
                                        <?php echo e(date("F j Y, g:i a", strtotime($notification->created_at))); ?>

                                    </small>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="list-group-item">
                        <div class="py-4 text-center fs-16"><?php echo e(translate('No notification found')); ?></div>
                    </li>
                <?php endif; ?>
            </ul>

            <?php echo e($notifications->links()); ?>

        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div id="payment_modal_body">

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/frontend/user/customer/notification/index.blade.php ENDPATH**/ ?>