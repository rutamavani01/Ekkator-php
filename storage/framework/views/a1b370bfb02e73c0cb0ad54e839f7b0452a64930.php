<?php 

use App\Models\ExamCategory;

$category_details = ExamCategory::where('name', $exam->name)->first();

?>

<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.offline_exam.update', ['id' => $exam->id])); ?>">
        <?php echo csrf_field(); ?> 
        <div class="form-row">

            <div class="fpb-7">
                <label for="exam_name" class="eForm-label"><?php echo e(get_phrase('Exam Name')); ?></label>
                <select name="exam_name" id="exam_name" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select exam category name')); ?></option>
                    <?php $__currentLoopData = $exam_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($exam_category->name); ?>" <?php echo e($exam_category->name == $exam->name ?  'selected':''); ?>><?php echo e($exam_category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7">
                <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSubjectOnExamEdit(this.value)">
                    <option value="">Select a class</option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>" <?php echo e($exam->class_id == $class->id ?  'selected':''); ?>><?php echo e($class->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7">
                <label for="subject_id" class="eForm-label"><?php echo e(get_phrase('Subject')); ?></label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required >
                    <option value="">Select a subject</option>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subject->id); ?>" <?php echo e($exam->subject_id == $subject->id ?  'selected':''); ?>><?php echo e($subject->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7">
                <label for="starting_date" class="eForm-label"><?php echo e(get_phrase('Starting date')); ?><span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="starting_date" value="<?php echo e(date('Y-m-d', $exam->starting_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="starting_time" class="eForm-label"><?php echo e(get_phrase('Starting time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" value="<?php echo e(date('H:i', $exam->starting_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="ending_date" class="eForm-label"><?php echo e(get_phrase('Ending date')); ?><span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="ending_date" value="<?php echo e(date('Y-m-d', $exam->ending_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="ending_time" class="eForm-label"><?php echo e(get_phrase('Ending time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" value="<?php echo e(date('H:i', $exam->ending_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="total_marks" class="eForm-label"><?php echo e(get_phrase('Total marks')); ?><span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks" value="<?php echo e($exam->total_marks); ?>" >
                </div>
            </div>
            
            <div class="fpb-7">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

  "use strict";


    function classWiseSubjectOnExamEdit(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
            }
        });
    }

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/examination/edit_offline_exam.blade.php ENDPATH**/ ?>