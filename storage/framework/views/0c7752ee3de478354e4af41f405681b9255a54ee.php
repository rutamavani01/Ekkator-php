<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.subject.update', ['id' => $subject->id])); ?>">
        <?php echo csrf_field(); ?> 
        <div class="form-row">

            <div class="fpb-7">
                <label for="class_id_on_create" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($class->id); ?>" <?php echo e($class->id == $subject->class_id ? 'selected':''); ?>><?php echo e($class->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($subject->name); ?>" id="name" name = "name" required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update subject')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/subject/edit_subject.blade.php ENDPATH**/ ?>