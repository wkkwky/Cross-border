<div class="modal fade" id="aizUploaderModal" data-backdrop="static" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-adaptive" role="document">
		<div class="modal-content h-100">
			<div class="modal-header pb-0 bg-light">
				<div class="uppy-modal-nav">
					<ul class="nav nav-tabs border-0">
						<li class="nav-item">
							<a class="nav-link active font-weight-medium text-dark" data-toggle="tab" href="#aiz-select-file"><?php echo e(translate('Select File')); ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link font-weight-medium text-dark" data-toggle="tab" href="#aiz-upload-new"><?php echo e(translate('Upload New')); ?></a>
						</li>
					</ul>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab-content h-100">
					<div class="tab-pane active h-100" id="aiz-select-file">
						<div class="aiz-uploader-filter pt-1 pb-3 border-bottom mb-4">
							<div class="row align-items-center gutters-5 gutters-md-10 position-relative">
								<div class="col-xl-2 col-md-3 col-5">
									<div class="">
										<!-- Input -->
										<select class="form-control form-control-xs aiz-selectpicker" name="aiz-uploader-sort">
											<option value="newest" selected><?php echo e(translate('Sort by newest')); ?></option>
											<option value="oldest"><?php echo e(translate('Sort by oldest')); ?></option>
											<option value="smallest"><?php echo e(translate('Sort by smallest')); ?></option>
											<option value="largest"><?php echo e(translate('Sort by largest')); ?></option>
										</select>
										<!-- End Input -->
									</div>
								</div>
								<div class="col-md-3 col-5">
									<div class="custom-control custom-radio">
										<input type="checkbox" class="custom-control-input" name="aiz-show-selected" id="aiz-show-selected" name="stylishRadio">
										<label class="custom-control-label" for="aiz-show-selected">
										<?php echo e(translate('Selected Only')); ?>

										</label>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 ml-auto mr-0 col-2 position-static">
									<div class="aiz-uploader-search text-right">
										<input type="text" class="form-control form-control-xs" name="aiz-uploader-search" placeholder="<?php echo e(translate('Search your files')); ?>">
										<i class="search-icon d-md-none"><span></span></i>
									</div>
								</div>
							</div>
						</div>
						<div class="aiz-uploader-all clearfix c-scrollbar-light">
							<div class="align-items-center d-flex h-100 justify-content-center w-100">
								<div class="text-center">
									<h3><?php echo e(translate('No files found')); ?></h3>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane h-100" id="aiz-upload-new">
						<div id="aiz-upload-files" class="h-100">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between bg-light">
				<div class="flex-grow-1 overflow-hidden d-flex">
					<div class="">
						<div class="aiz-uploader-selected"><?php echo e(translate('0 File selected')); ?></div>
						<button type="button" class="btn-link btn btn-sm p-0 aiz-uploader-selected-clear"><?php echo e(translate('Clear')); ?></button>
					</div>
					<div class="mb-0 ml-3">
						<button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn"><?php echo e(translate('Prev')); ?></button>
						<button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn"><?php echo e(translate('Next')); ?></button>
					</div>
				</div>
				<button type="button" class="btn btn-sm btn-primary" data-toggle="aizUploaderAddSelected"><?php echo e(translate('Add Files')); ?></button>
			</div>
		</div>
	</div>
</div>
<style>
    #uploader_prev_btn,#uploader_next_btn{ padding-left:5px !important; padding-right:5px !important;}
</style><?php /**PATH /www/wwwroot/7wabwpn.store/resources/views/uploader/aiz-uploader.blade.php ENDPATH**/ ?>