<?php

use App\Models\Subject;
use App\Models\Session;
use App\Models\Gradebook;

$active_session = get_school_settings(auth()->user()->school_id)->value('running_session');

$index = 0;

?>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="view_mark" id="mark_report">
                <table class="table eTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(get_phrase('Subject name')); ?></td>
                            <?php $__currentLoopData = $exam_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <th><?php echo e($exam_category->name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index = $index+1); ?></td>
                            <td><?php echo e($subject->name); ?></td>
                            <?php $__currentLoopData = $exam_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <td>
                                <?php
                                $exam_marks = Gradebook::where('exam_category_id', $exam_category['id'])
                                    ->where('class_id', $student_details['class_id'])
                                    ->where('section_id', $student_details['section_id'])
                                    ->where('student_id', $student_details['user_id'])
                                    ->where('school_id', auth()->user()->school_id)
                                    ->where('session_id', $active_session)
                                    ->first();

                                    if(isset($exam_marks->marks) && $exam_marks->marks){
                                        $subject_list = json_decode($exam_marks->marks, true);
                                    }else{
                                        $subject_list = array();
                                    }
                                ?>
                                <?php if(is_array($subject_list)): ?>
                                    <?php if(array_key_exists($subject->id, $subject_list)): ?>
                                        <?php echo e($subject_list[$subject->id]); ?>

                                    <?php else: ?>
                                        <?php echo e("-"); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/parent/marks/table.blade.php ENDPATH**/ ?>