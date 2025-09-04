

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Conversations')); ?></h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th data-breakpoints="lg"><?php echo e(translate('Date')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Title')); ?></th>
                    <th><?php echo e(translate('Sender')); ?></th>
                    <th><?php echo e(translate('Receiver')); ?></th>
                    <th width="10%"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($conversation->created_at); ?></td>
                        <td><?php echo e($conversation->title); ?></td>
                        <td>
                            <?php if($conversation->sender != null): ?>
                                <?php echo e($conversation->sender->name); ?>

                                <?php if($conversation->receiver_viewed == 0): ?>
                                    <span class="badge badge-inline badge-info"><?php echo e(translate('New')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($conversation->receiver != null): ?>
                                <?php echo e($conversation->receiver->name); ?>

                                <?php if($conversation->sender_viewed == 0): ?>
                                    <span class="badge badge-inline badge-info"><?php echo e(translate('New')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('conversations.admin_show', encrypt($conversation->id))); ?>" title="<?php echo e(translate('View')); ?>">
                                <i class="las la-eye"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('conversations.destroy', encrypt($conversation->id))); ?>" title="<?php echo e(translate('Delete')); ?>">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/backend/support/conversations/index.blade.php ENDPATH**/ ?>