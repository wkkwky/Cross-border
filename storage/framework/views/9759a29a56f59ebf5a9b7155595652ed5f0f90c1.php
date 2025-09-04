

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body px-3">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(translate('Name')); ?></th>
                            <th data-breakpoints="lg"><?php echo e(translate('Owner')); ?></th>
                            <th data-breakpoints="lg"><?php echo e(translate('Price')); ?></th>
                            <th data-breakpoints="lg"><?php echo e(translate('Point')); ?></th>
                            <th><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($products->currentPage() - 1)*$products->perPage()); ?></td>
                                <td>
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank">
                      								<div class="form-group row">
                      									<div class="col-auto">
                      										<img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>" alt="Image" class="size-50px">
                      									</div>
                      									<div class="col">
                      										<span class="text-muted text-truncate-2"><?php echo e($product->getTranslation('name')); ?></span>
                      									</div>
                      								</div>
                    							  </a>
                                </td>
                                <td>
                                  <?php if($product->user != null): ?>
                                      <?php echo e($product->user->name); ?>

                                  <?php endif; ?>
                                </td>
                                <td><?php echo e(number_format($product->unit_price,2)); ?></td>
                                <td><?php echo e($product->earn_point); ?></td>
                                <td class="text-right">
                  								<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('product_club_point.edit', encrypt($product->id))); ?>" title="<?php echo e(translate('Edit')); ?>">
                  									<i class="las la-edit"></i>
                  								</a>
			                           </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    <?php echo e($products->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
          <div class="card">
              <div class="card-header">
                  <h5 class="mb-0 h6"><?php echo e(translate('Set Point for Product Within a Range')); ?></h5>
              </div>
              <div class="card-body">
                  <div class="mb-3 text-muted">
                      <small><?php echo e(translate('Set any specific point for those products what are between Min-price and Max-price. Min-price should be less than Max-price')); ?></small>
                  </div>
                  <form class="form-horizontal" action="<?php echo e(route('set_products_point.store')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                          <div class="col-lg-6">
                              <label class="col-from-label"><?php echo e(translate('Set Point for multiple products')); ?></label>
                          </div>
                          <div class="col-lg-6">
                              <input type="number" min="0" step="0.01" class="form-control" name="point" placeholder="100" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-lg-6">
                              <label class="col-from-label"><?php echo e(translate('Min Price')); ?></label>
                          </div>
                          <div class="col-lg-6">
                              <input type="number" min="0" step="0.01" class="form-control" name="min_price" value="<?php echo e(\App\Models\Product::min('unit_price')); ?>" placeholder="50" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-lg-6">
                              <label class="col-from-label"><?php echo e(translate('Max Price')); ?></label>
                          </div>
                          <div class="col-lg-6">
                              <input type="number" min="0" step="0.01" class="form-control" name="max_price" value="<?php echo e(\App\Models\Product::max('unit_price')); ?>" placeholder="110" required>
                          </div>
                      </div>
                      <div class="form-group mb-0 text-right">
                          <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                      </div>
                  </form>
              </div>
          </div>
          <div class="card">
              <div class="card-header">
                  <h5 class="mb-0 h6"><?php echo e(translate('Set Point for all Products')); ?></h5>
              </div>
              <div class="card-body">
                  <form class="form-horizontal" action="<?php echo e(route('set_all_products_point.store')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                          <div class="col-lg-4">
                              <label class="col-from-label"><?php echo e(translate('Set Point For ')); ?> <?php echo e(single_price(1)); ?></label>
                          </div>
                          <div class="col-lg-6">
                              <input type="number" step="0.001" class="form-control" name="point" placeholder="1" required>
                          </div>
                          <div class="col-lg-2">
                              <label class="col-from-label"><?php echo e(translate('Points')); ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-0 text-right">
                          <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                      </div>
                  </form>
              </div>
          </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/club_points/set_point.blade.php ENDPATH**/ ?>