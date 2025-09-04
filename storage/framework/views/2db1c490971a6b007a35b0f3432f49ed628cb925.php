

<?php $__env->startSection('content'); ?>

    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col">
    			<h1 class="h3"><?php echo e(translate('Website Footer')); ?></h1>
    		</div>
    	</div>
    </div>
    <ul class="nav nav-tabs nav-fill border-light">
        <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link text-reset <?php if($language->code == $lang): ?> active <?php else: ?> bg-soft-dark border-light border-left-0 <?php endif; ?> py-3" href="<?php echo e(route('website.footer', ['lang'=> $language->code] )); ?>">
                    <img src="<?php echo e(static_asset('assets/img/flags/'.$language->code.'.png')); ?>" height="11" class="mr-1">
                    <span><?php echo e($language->name); ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Footer Widget')); ?></h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6">
    				<div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0"><?php echo e(translate('About Widget')); ?></h6>
    					</div>
    					<div class="card-body">
    						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
    							<?php echo csrf_field(); ?>
    							<div class="form-group">
    			                    <label class="form-label" for="signinSrEmail"><?php echo e(translate('Footer Logo')); ?></label>
    			                    <div class="input-group " data-toggle="aizuploader" data-type="image">
    			                        <div class="input-group-prepend">
    			                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
    			                        </div>
    			                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
    									<input type="hidden" name="types[]" value="footer_logo">
    			                        <input type="hidden" name="footer_logo" class="selected-files" value="<?php echo e(get_setting('footer_logo')); ?>">
    			                    </div>
    								<div class="file-preview"></div>
    			                </div>
    			                <div class="form-group">
    								<label><?php echo e(translate('About description')); ?> (<?php echo e(translate('Translatable')); ?>)</label>
    								<input type="hidden" name="types[][<?php echo e($lang); ?>]" value="about_us_description">
    								<textarea class="aiz-text-editor form-control" name="about_us_description" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150">
                                        <?php echo get_setting('about_us_description',null,$lang); ?>

                                    </textarea>
    							</div>
                                <div class="form-group">
                                    <label><?php echo e(translate('Play Store Link')); ?></label>
                                    <input type="hidden" name="types[]" value="play_store_link">
                                    <input type="text" class="form-control" placeholder="http://" name="play_store_link" value="<?php echo e(get_setting('play_store_link')); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(translate('App Store Link')); ?></label>
                                    <input type="hidden" name="types[]" value="app_store_link">
                                    <input type="text" class="form-control" placeholder="http://" name="app_store_link" value="<?php echo e(get_setting('app_store_link')); ?>">
                                </div>
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0"><?php echo e(translate('Contact Info Widget')); ?></h6>
    					</div>
    					<div class="card-body">
                            <form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
    							<?php echo csrf_field(); ?>
                                <div class="form-group">
    								<label><?php echo e(translate('Contact address')); ?> (<?php echo e(translate('Translatable')); ?>)</label>
    								<input type="hidden" name="types[][<?php echo e($lang); ?>]" value="contact_address">
    								<input type="text" class="form-control" placeholder="<?php echo e(translate('Address')); ?>" name="contact_address" value="<?php echo e(get_setting('contact_address',null,$lang)); ?>">
    							</div>
                                <div class="form-group">
    								<label><?php echo e(translate('Contact phone')); ?></label>
    								<input type="hidden" name="types[]" value="contact_phone">
    								<input type="text" class="form-control" placeholder="<?php echo e(translate('Phone')); ?>" name="contact_phone" value="<?php echo e(get_setting('contact_phone')); ?>">
    							</div>
                                <div class="form-group">
    								<label><?php echo e(translate('Contact email')); ?></label>
    								<input type="hidden" name="types[]" value="contact_email">
    								<input type="text" class="form-control" placeholder="<?php echo e(translate('Email')); ?>" name="contact_email" value="<?php echo e(get_setting('contact_email')); ?>">
    							</div>
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
                <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0"><?php echo e(translate('Link Widget One')); ?></h6>
    					</div>
    					<div class="card-body">
                            <form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
    							<div class="form-group">
    								<label><?php echo e(translate('Title')); ?> (<?php echo e(translate('Translatable')); ?>)</label>
    								<input type="hidden" name="types[][<?php echo e($lang); ?>]" value="widget_one">
    								<input type="text" class="form-control" placeholder="Widget title" name="widget_one" value="<?php echo e(get_setting('widget_one',null,$lang)); ?>">
    							</div>
    			                <div class="form-group">
    								<label><?php echo e(translate('Links')); ?> - (<?php echo e(translate('Translatable')); ?> <?php echo e(translate('Label')); ?>)</label>
    								<div class="w3-links-target">
    									<input type="hidden" name="types[][<?php echo e($lang); ?>]" value="widget_one_labels">
    									<input type="hidden" name="types[]" value="widget_one_links">
    									<?php if(get_setting('widget_one_labels',null,$lang) != null): ?>
    										<?php $__currentLoopData = json_decode(get_setting('widget_one_labels',null,$lang), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    											<div class="row gutters-5">
    												<div class="col-4">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="<?php echo e(translate('Label')); ?>" name="widget_one_labels[]" value="<?php echo e($value); ?>">
    													</div>
    												</div>
    												<div class="col">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]" value="<?php echo e(json_decode(get_setting('widget_one_links'), true)[$key]); ?>">
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
    												<input type="text" class="form-control" placeholder="<?php echo e(translate('Label')); ?>" name="widget_one_labels[]">
    											</div>
    										</div>
    										<div class="col">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
    											</div>
    										</div>
    										<div class="col-auto">
    											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    												<i class="las la-times"></i>
    											</button>
    										</div>
    									</div>'
    									data-target=".w3-links-target">
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
    	</div>
    </div>

    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Footer Bottom')); ?></h6>
    	</div>
        <form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
           <div class="card-body">
                <div class="card shadow-none bg-light">
                    <div class="card-header">
  						<h6 class="mb-0"><?php echo e(translate('Copyright Widget ')); ?></h6>
  					</div>
                    <div class="card-body">
                        <div class="form-group">
                  			<label><?php echo e(translate('Copyright Text')); ?> (<?php echo e(translate('Translatable')); ?>)</label>
                  			<input type="hidden" name="types[][<?php echo e($lang); ?>]" value="frontend_copyright_text">
                  			<textarea class="aiz-text-editor form-control" name="frontend_copyright_text" data-buttons='[["font", ["bold", "underline", "italic"]],["insert", ["link"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150">
                                <?php echo get_setting('frontend_copyright_text',null,$lang); ?>

                            </textarea>
                  		</div>
                    </div>
                </div>
                <div class="card shadow-none bg-light">
                  <div class="card-header">
						<h6 class="mb-0"><?php echo e(translate('Social Link Widget ')); ?></h6>
					</div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-md-2 col-from-label"><?php echo e(translate('Show Social Links?')); ?></label>
                      <div class="col-md-9">
                        <label class="aiz-switch aiz-switch-success mb-0">
                          <input type="hidden" name="types[]" value="show_social_links">
                          <input type="checkbox" name="show_social_links" <?php if( get_setting('show_social_links') == 'on'): ?> checked <?php endif; ?>>
                          <span></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(translate('Social Links')); ?></label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-facebook-f"></i></span>
                            </div>
                            <input type="hidden" name="types[]" value="facebook_link">
                            <input type="text" class="form-control" placeholder="http://" name="facebook_link" value="<?php echo e(get_setting('facebook_link')); ?>">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-twitter"></i></span>
                            </div>
                            <input type="hidden" name="types[]" value="twitter_link">
                            <input type="text" class="form-control" placeholder="http://" name="twitter_link" value="<?php echo e(get_setting('twitter_link')); ?>">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-instagram"></i></span>
                            </div>
                            <input type="hidden" name="types[]" value="instagram_link">
                            <input type="text" class="form-control" placeholder="http://" name="instagram_link" value="<?php echo e(get_setting('instagram_link')); ?>">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-youtube"></i></span>
                            </div>
                            <input type="hidden" name="types[]" value="youtube_link">
                            <input type="text" class="form-control" placeholder="http://" name="youtube_link" value="<?php echo e(get_setting('youtube_link')); ?>">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-linkedin-in"></i></span>
                            </div>
                            <input type="hidden" name="types[]" value="linkedin_link">
                            <input type="text" class="form-control" placeholder="http://" name="linkedin_link" value="<?php echo e(get_setting('linkedin_link')); ?>">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow-none bg-light">
                  <div class="card-header">
        						<h6 class="mb-0"><?php echo e(translate('Payment Methods Widget ')); ?></h6>
        					</div>
                  <div class="card-body">
                      <div class="form-group">
                          <label><?php echo e(translate('Payment Methods')); ?></label>
                          <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                              <div class="input-group-prepend">
                                  <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                              </div>
                              <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                              <input type="hidden" name="types[]" value="payment_method_images">
                              <input type="hidden" name="payment_method_images" class="selected-files" value="<?php echo e(get_setting('payment_method_images')); ?>">
                          </div>
                          <div class="file-preview box sm">
                          </div>
                       </div>
                  </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                </div>
            </div>
        </form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/7wabwpn.store/resources/views/backend/website_settings/footer.blade.php ENDPATH**/ ?>