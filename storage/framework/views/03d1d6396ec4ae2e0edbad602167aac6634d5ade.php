<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.class_room.update', ['id' => $class_room->id])); ?>">
         <?php echo csrf_field(); ?> 
         <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($class_room->name); ?>" id="name" name = "name" required>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Create')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/class_room/edit_class_room.blade.php ENDPATH**/ ?>