

<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Product Queries')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th data-breakpoints="lg">#</th>
                        <th><?php echo e(translate('User Name')); ?></th>
                        <th><?php echo e(translate('Product Name')); ?></th>
                        <th data-breakpoints="lg"><?php echo e(translate('Question')); ?></th>
                        <th data-breakpoints="lg"><?php echo e(translate('Reply')); ?></th>
                        <th><?php echo e(translate('status')); ?></th>
                        <th class="text-right"><?php echo e(translate('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $queries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(translate($key + 1)); ?></td>
                            <td><?php echo e(translate($query->user->name)); ?></td>
                            <td><?php echo e(translate($query->product->name)); ?></td>
                            <td><?php echo e(translate(Str::limit($query->question, 100))); ?></td>
                            <td><?php echo e(translate(Str::limit($query->reply, 100))); ?></td>
                            <td>
                                <span
                                    class="badge badge-inline <?php echo e($query->reply == null ? 'badge-warning' : 'badge-success'); ?>">
                                    <?php echo e($query->reply == null ? translate('Not Replied') : translate('Replied')); ?>

                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                    href="<?php echo e(route('seller.product_query.show', encrypt($query->id))); ?>"
                                    title="<?php echo e(translate('View')); ?>">
                                    <i class="las la-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($queries->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/www.bfmma.shop/resources/views/seller/product_query/index.blade.php ENDPATH**/ ?>