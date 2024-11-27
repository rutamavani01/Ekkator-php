
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo e(get_phrase('Smtp Settings')); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('superadmin.smtp.update')); ?>">
                                <?php echo csrf_field(); ?> 
                                <div class="fpb-7">
                                    <label for="smtp_protocol" class="eForm-label"><?php echo e(get_phrase('Protocol')); ?> <small>(smtp or ssmtp or mail)</small> </label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_protocol')); ?>" id="smtp_protocol" name = "smtp_protocol" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="smtp_crypto" class="eForm-label"><?php echo e(get_phrase('Smtp crypto')); ?> <small>(ssl or tls)</small></label>
                                     <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_crypto')); ?>" id="smtp_crypto" name = "smtp_crypto" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="smtp_host" class="eForm-label"><?php echo e(get_phrase('Smtp host')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_host')); ?>" id="smtp_host" name = "smtp_host" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="smtp_port" class="eForm-label"><?php echo e(get_phrase('Smtp port')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_port')); ?>" id="smtp_port" name = "smtp_port" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="smtp_user" class="eForm-label"><?php echo e(get_phrase('Smtp username')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_user')); ?>" id="smtp_user" name = "smtp_user" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="smtp_pass" class="eForm-label"><?php echo e(get_phrase('Smtp password')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('smtp_pass')); ?>" id="smtp_pass" name = "smtp_pass" required>
                                </div>
                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form"><?php echo e(get_phrase('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/settings/smtp_settings.blade.php ENDPATH**/ ?>