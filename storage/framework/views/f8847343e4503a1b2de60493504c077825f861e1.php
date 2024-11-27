<?php if(count($class_name) > 0): ?>
<table id="basic-datatable" class="table eTable">
    <thead>
        <tr>

            <th><?php echo e(get_phrase('Subject')); ?></th>
            <th><?php echo e(get_phrase('Class')); ?></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                <?php $count = count($subjects); ?>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key < $count-1): ?>
                        <?php echo e($subject['name']." ,"); ?>

                    <?php else: ?>
                        <?php echo e($subject['name']); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>

            <?php $__currentLoopData = $class_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td><?php echo e($class['name']); ?></td>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tr>
    </tbody>
</table>
<?php else: ?>
<div class="empty_box center">
    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
    <br>
    <span class=""><?php echo e(get_phrase('No data found')); ?></span>
</div>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/parent/subject/table.blade.php ENDPATH**/ ?>