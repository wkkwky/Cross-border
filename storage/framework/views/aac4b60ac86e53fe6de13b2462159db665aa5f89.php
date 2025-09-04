

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Language Information')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('languages.store')); ?>" method="POST" enctype="multipart/form-data">
                	<?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Name')); ?></label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(translate('Name')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Code')); ?></label>
                        </div>
                        <div class="col-lg-9">
                            <?php
                                $languagesArray = \App\Models\Language::pluck('code')->toarray();
                            ?>
                            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="code" data-live-search="true" >
                                <?php $__currentLoopData = \File::files(base_path('public/assets/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!in_array(pathinfo($path)['filename'],$languagesArray)): ?>

                                        <option value="<?php echo e(pathinfo($path)['filename']); ?>" data-content="<div class=''><img src='<?php echo e(static_asset('assets/img/flags/'.pathinfo($path)['filename'].'.png')); ?>' class='mr-2'><span><?php echo e(strtoupper(pathinfo($path)['filename'])); ?></span></div>"></option>

                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(translate('Flutter App Lang Code')); ?></label>
                            <code><a target="_blank" href="https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes"><?php echo e(translate("Links for ISO 639-1 codes")); ?></a></code>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="app_lang_code" placeholder="<?php echo e(translate('Put ISO 639-1 code for your language')); ?>" required>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/kjshop.abczsm.vip/resources/views/backend/setup_configurations/languages/create.blade.php ENDPATH**/ ?>