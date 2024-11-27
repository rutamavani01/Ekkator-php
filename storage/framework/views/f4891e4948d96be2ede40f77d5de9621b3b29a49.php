<?php
    use App\Models\Subject;
    use App\Models\Classes;
?>

<?php if(count($class_name) > 0): ?>
<table id="basic-datatable" class="table eTable">
    <thead>
        <tr>

            <th><?php echo e(get_phrase('Title')); ?></th>
            <th><?php echo e(get_phrase('Syllabus')); ?></th>
            <th><?php echo e(get_phrase('Subject')); ?></th>
            <th><?php echo e(get_phrase('Class')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $syllabus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>  <?php echo e($subject_details['title']); ?>  </td>
            <td><a href="<?php echo e(asset('assets/uploads/syllabus/'.$subject_details['file'])); ?>" class="btn btn-primary btn-sm bi bi-download" download><?php echo e(get_phrase('Download')); ?></a></td>
                 <?php $suject_name=Subject::where('id',$subject_details['subject_id'])->first()->toArray(); ?>
            <td><?php echo e($suject_name['name']); ?> </td>
            <?php $class_name=Classes::where('id',$subject_details['class_id'])->first()->toArray(); ?>
            <td><?php echo e($class_name['name']); ?> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php else: ?>
<div class="empty_box center">
    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
    <br>
    <?php echo e(get_phrase('No data found')); ?>

</div>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/parent/syllabus/table.blade.php ENDPATH**/ ?>