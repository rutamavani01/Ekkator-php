
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Manage Faq')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Settings')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Manage Faq')); ?></a></li>
                    </ul>
                </div>
                <div class="export-btn-area">
                    <a href="javascript:;" class="export_btn" onclick="largeModal('<?php echo e(route('superadmin.faq_add')); ?>', 'Create question and answer')"><?php echo e(get_phrase('Add question and answer')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="eSection-wrap">
        <div class="title">
          <h4><?php echo e(get_phrase('Faq List')); ?></h4>
          <p><?php echo e(get_settings('faq_subtitle')); ?></p>
        </div>
        <div class="eMain">
            <div class="row">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                  <div class="eCard">
                    <div class="eCard-body">
                        <h5 class="eCard-title"><?php echo e($faq->title); ?></h5>
                        <p class="eCard-text"><?php echo e($faq->description); ?></p>

                        <button type="button" class="eBtn eBtn-blue dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(get_phrase('Action')); ?></button>
                            <ul class="dropdown-menu">
                                <li>
                                  <a class="dropdown-item" href="javascript:;" onclick="largeModal('<?php echo e(route('superadmin.faq_edit', ['id' => $faq->id])); ?>', '<?php echo e(get_phrase('Update question and answer')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                </li>
                                <li>
                                  <hr class="dropdown-divider" />
                                </li>
                                <li>
                                  <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('superadmin.faq.delete', ['id' => $faq->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                                </li>
                            </ul>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/settings/faq_views.blade.php ENDPATH**/ ?>