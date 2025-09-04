

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
                                        <?php echo e(translate('Order: ')); ?>

                                        <a href="<?php echo e(route('seller.orders.show', encrypt($notification->data['order_id']))); ?>">
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
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        
        function show_order_details(order_id)
        {
            $('#order-details-modal-body').html(null);

            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }

            $.post('<?php echo e(route('orders.details')); ?>', { _token : AIZ.data.csrf, order_id : order_id}, function(data){
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
            });
        }
        function sort_orders(el){
            $('#sort_orders').submit();
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/7wabwpn.store/resources/views/seller/notification/index.blade.php ENDPATH**/ ?>