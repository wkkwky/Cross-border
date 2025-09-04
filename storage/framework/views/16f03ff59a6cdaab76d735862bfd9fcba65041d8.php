

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3"><?php echo e(translate('Website Header')); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Header Setting')); ?></h6>
			</div>
			<div class="card-body">
				<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="form-group row">
	                    <label class="col-md-3 col-from-label"><?php echo e(translate('Header Logo')); ?></label>
						<div class="col-md-8">
		                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
		                        </div>
		                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
								<input type="hidden" name="types[]" value="header_logo">
		                        <input type="hidden" name="header_logo" class="selected-files" value="<?php echo e(get_setting('header_logo')); ?>">
		                    </div>
		                    <div class="file-preview"></div>
						</div>
	                </div>
                    <div class="form-group row">
						<label class="col-md-3 col-from-label"><?php echo e(translate('Show Language Switcher?')); ?></label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input type="hidden" name="types[]" value="show_language_switcher">
								<input type="checkbox" name="show_language_switcher" <?php if( get_setting('show_language_switcher') == 'on'): ?> checked <?php endif; ?>>
								<span></span>
							</label>
						</div>
					</div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label"><?php echo e(translate('Show Currency Switcher?')); ?></label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input type="hidden" name="types[]" value="show_currency_switcher">
								<input type="checkbox" name="show_currency_switcher" <?php if( get_setting('show_currency_switcher') == 'on'): ?> checked <?php endif; ?>>
								<span></span>
							</label>
						</div>
					</div>
	                <div class="form-group row">
						<label class="col-md-3 col-from-label"><?php echo e(translate('Enable stikcy header?')); ?></label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input type="hidden" name="types[]" value="header_stikcy">
								<input type="checkbox" name="header_stikcy" <?php if( get_setting('header_stikcy') == 'on'): ?> checked <?php endif; ?>>
								<span></span>
							</label>
						</div>
					</div>
					<div class="border-top pt-3">
						<div class="form-group row">
		                    <label class="col-md-3 col-from-label"><?php echo e(translate('Topbar Banner')); ?></label>
							<div class="col-md-8">
			                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
			                        <div class="input-group-prepend">
			                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
			                        </div>
			                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
									<input type="hidden" name="types[]" value="topbar_banner">
			                        <input type="hidden" name="topbar_banner" class="selected-files" value="<?php echo e(get_setting('topbar_banner')); ?>">
			                    </div>
			                    <div class="file-preview"></div>
							</div>
		                </div>
		                <div class="form-group row">
							<label class="col-md-3 col-from-label"><?php echo e(translate('Topbar Banner Link')); ?></label>
							<div class="col-md-8">
								<div class="form-group">
									<input type="hidden" name="types[]" value="topbar_banner_link">
									<input type="text" class="form-control" placeholder="<?php echo e(translate('Link with')); ?> http:// <?php echo e(translate('or')); ?> https://" name="topbar_banner_link" value="<?php echo e(get_setting('topbar_banner_link')); ?>">
								</div>
							</div>
						</div>
					</div>
                    <div class="border-top pt-3">
                        <div class="form-group row">
							<label class="col-md-3 col-from-label"><?php echo e(translate('Help line number')); ?></label>
							<div class="col-md-8">
								<div class="form-group">
									<input type="hidden" name="types[]" value="helpline_number">
									<input type="text" class="form-control" placeholder="<?php echo e(translate('Help line number')); ?>" name="helpline_number" value="<?php echo e(get_setting('helpline_number')); ?>">
								</div>
							</div>
						</div>
                    </div>
					<div class="border-top pt-3">
						<label class=""><?php echo e(translate('Header Nav Menu')); ?></label>
						<div class="header-nav-menu">
							<input type="hidden" name="types[]" value="header_menu_labels">
							<input type="hidden" name="types[]" value="header_menu_links">
							<?php if(get_setting('header_menu_labels') != null): ?>
								<?php $__currentLoopData = json_decode( get_setting('header_menu_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row gutters-5">
										<div class="col-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="<?php echo e(translate('Label')); ?>" name="header_menu_labels[]" value="<?php echo e($value); ?>">
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="<?php echo e(translate('Link with')); ?> http:// <?php echo e(translate('or')); ?> https://" name="header_menu_links[]" value="<?php echo e(json_decode(App\Models\BusinessSetting::where('type', 'header_menu_links')->first()->value, true)[$key]); ?>">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="<?php echo e(translate('Label')); ?>" name="header_menu_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="<?php echo e(translate('Link with')); ?> http:// <?php echo e(translate('or')); ?> https://" name="header_menu_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".header-nav-menu">
							<?php echo e(translate('Add New')); ?>

						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/7wabwpn.store/resources/views/backend/website_settings/header.blade.php ENDPATH**/ ?>