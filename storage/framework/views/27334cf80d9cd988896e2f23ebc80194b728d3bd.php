

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3"><?php echo e(translate('Product Reviews')); ?></h1>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row flex-grow-1">
            <div class="col">
                <h5 class="mb-0 h6"><?php echo e(translate('Product Reviews')); ?></h5>
                
            </div>
            <div class="col-md-6 col-xl-4 ml-auto mr-0">
                <form class="" id="sort_by_rating" action="<?php echo e(route('reviews.index')); ?>" method="GET">
                    <div class="" style="min-width: 200px;">
                        <select class="form-control aiz-selectpicker" name="rating" id="rating" onchange="filter_by_rating()">
                            <option value=""><?php echo e(translate('Filter by Rating')); ?></option>
                            <option value="rating,desc"><?php echo e(translate('Rating (High > Low)')); ?></option>
                            <option value="rating,asc"><?php echo e(translate('Rating (Low > High)')); ?></option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th><?php echo e(translate('Product')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Product Owner')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Customer')); ?></th>
                    <th><?php echo e(translate('Rating')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Comment')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Published')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($review->product != null && $review->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($reviews->currentPage() - 1)*$reviews->perPage()); ?></td>
                            <td>
                                <a href="<?php echo e(route('product', $review->product->slug)); ?>" target="_blank" class="text-reset text-truncate-2"><?php echo e($review->product->getTranslation('name')); ?></a>
                            </td>
                            <td><?php echo e($review->product->added_by); ?></td>
                            <td><?php echo e($review->user->name); ?> (<?php echo e($review->user->email); ?>)</td>
                            <td><?php echo e($review->rating); ?></td>
                            <td><?php echo e($review->comment); ?></td>
                            <td><label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="<?php echo e($review->id); ?>" type="checkbox" <?php if($review->status == 1) echo "checked";?> >
                                <span class="slider round"></span></label>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($reviews->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('reviews.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Published reviews updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }
        function filter_by_rating(el){
            var rating = $('#rating').val();
            if (rating != '') {
                $('#sort_by_rating').submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/backend/product/reviews/index.blade.php ENDPATH**/ ?>