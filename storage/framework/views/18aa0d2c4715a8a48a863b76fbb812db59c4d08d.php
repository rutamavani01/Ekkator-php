<div class="eForm-layouts">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('superadmin.faq_update', ['id' => $faq->id])); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="fpb-7">
                <label for="title" class="eForm-label"><?php echo e(get_phrase('Question Title')); ?></label>
                <input type="text" class="form-control eForm-control" id="title" name = "title" value="<?php echo e($faq->title); ?>" required>
            </div>
            <div class="fpb-7">
                <label for="description" class="eForm-label"><?php echo e(get_phrase('Question Description')); ?></label>
                <textarea class="form-control eForm-control" id="description" name = "description" rows="6" required><?php echo e($faq->description); ?></textarea>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/settings/edit_faq.blade.php ENDPATH**/ ?>