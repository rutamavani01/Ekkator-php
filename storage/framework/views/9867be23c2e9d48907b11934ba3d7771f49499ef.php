<?php 

use App\Models\Section;
use App\Models\Subject;
use App\Models\Session;

$active_session = Session::where('status', 1)->first();

?>
<form method="POST" class="d-block ajaxForm" action="<?php echo e(route('admin.routine.update', ['id' => $routine->id ])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="class_id_on_routine_creation" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
            <select name="class_id" id="class_id_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required onchange="classWiseSectionForRoutineCreate(this.value)">
                <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                <?php foreach($classes as $class): ?>
                    <option value="<?php echo e($class['id']); ?>" <?php echo e($routine->class_id == $class['id'] ?  'selected':''); ?>><?php echo e($class['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="section_id_on_routine_creation" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
            <select name="section_id" id = "section_id_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value=""><?php echo e(get_phrase('Select a section')); ?></option>
                <?php $sections = Section::where(['class_id' => $routine['class_id']])->get(); ?>
                <?php foreach($sections as $section): ?>
                    <option value="<?php echo e($section['id']); ?>" <?php echo e($routine->section_id == $section['id'] ?  'selected':''); ?>><?php echo e($section['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="subject_id_on_routine_creation" class="eForm-label"><?php echo e(get_phrase('Subject')); ?></label>
            <select name="subject_id" id = "subject_id_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a subject')); ?></option>
                <?php $subjects = Subject::where(['class_id' => $routine['class_id'], 'session_id' => $active_session->id])->get(); ?>
                <?php foreach($subjects as $subject): ?>
                    <option value="<?php echo e($subject['id']); ?>" <?php echo e($routine->subject_id == `$subject['id'] ?  'selected':''); ?>><?php echo e($subject['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- <div class="fpb-7">
    <label for="subject_id_on_routine_creation" class="eForm-label"><?php echo e(get_phrase('Subject')); ?></label>
    <select name="subject_id" id="subject_id_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove" required>
        <option value=""><?php echo e(get_phrase('Select a subject')); ?></option>
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($subject->id); ?>" <?php echo e($routine->subject_id == $subject->id ? 'selected' : ''); ?>>
                <?php echo e($subject->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div> -->

        <div class="fpb-7">
            <label for="teacher" class="eForm-label"><?php echo e(get_phrase('Teacher')); ?></label>
            <select name="teacher_id" id = "teacher_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Assign a teacher')); ?></option>
                <?php foreach($teachers as $teacher): ?>
                    <option value="<?php echo e($teacher['id']); ?>" <?php echo e($routine->teacher_id == $teacher['id'] ?  'selected':''); ?>><?php echo e($teacher->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="class_room_id" class="eForm-label"><?php echo e(get_phrase('Class room')); ?></label>
            <select name="class_room_id" id = "class_room_id_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a class room')); ?></option>
                <?php foreach($class_rooms as $class_room): ?>
                    <option value="<?php echo e($class_room['id']); ?>" <?php echo e($routine->room_id == $class_room['id'] ?  'selected':''); ?>><?php echo e($class_room['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="day" class="eForm-label"><?php echo e(get_phrase('Day')); ?></label>
            <select name="day" id = "day_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a day')); ?></option>
                <option value="saturday" <?php echo e($routine->day == 'saturday' ?  'selected':''); ?>><?php echo e(get_phrase('Saturday')); ?></option>
                <option value="sunday" <?php echo e($routine->day == 'sunday' ?  'selected':''); ?>><?php echo e(get_phrase('Sunday')); ?></option>
                <option value="monday" <?php echo e($routine->day == 'monday' ?  'selected':''); ?>><?php echo e(get_phrase('Monday')); ?></option>
                <option value="tuesday" <?php echo e($routine->day == 'tuesday' ?  'selected':''); ?>><?php echo e(get_phrase('Tuesday')); ?></option>
                <option value="wednesday" <?php echo e($routine->day == 'wednesday' ?  'selected':''); ?>><?php echo e(get_phrase('Wednesday')); ?></option>
                <option value="thursday" <?php echo e($routine->day == 'thursday' ?  'selected':''); ?>><?php echo e(get_phrase('Thursday')); ?></option>
                <option value="friday" <?php echo e($routine->day == 'friday' ?  'selected':''); ?>><?php echo e(get_phrase('Friday')); ?></option>
            </select>
        </div>

        <div class="fpb-7">
            <label for="starting_hour" class="eForm-label"><?php echo e(get_phrase('Starting hour')); ?></label>
            <select name="starting_hour" id = "starting_hour_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Starting hour')); ?></option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->starting_hour == $i ?  'selected':''); ?>>12 AM</option>
                        <?php }else{ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->starting_hour == $i ?  'selected':''); ?>><?php echo e($i); ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->starting_hour == $i ?  'selected':''); ?>>12 PM</option>
                        <?php }else{ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->starting_hour == $i ?  'selected':''); ?>><?php echo e($j); ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="starting_minute" class="eForm-label"><?php echo e(get_phrase('Starting minute')); ?></label>
            <select name="starting_minute" id = "starting_minute_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Starting minute')); ?></option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?php echo e($i); ?>" <?php echo e($routine->starting_minute == $i ?  'selected':''); ?>><?php echo e($i); ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="ending_hour" class="eForm-label"><?php echo e(get_phrase('Ending hour')); ?></label>
            <select name="ending_hour" id = "ending_hour_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Ending hour')); ?></option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->ending_hour == $i ?  'selected':''); ?>>12 AM</option>
                        <?php }else{ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->ending_hour == $i ?  'selected':''); ?>><?php echo e($i); ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->ending_hour == $i ?  'selected':''); ?>>12 PM</option>
                        <?php }else{ ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($routine->ending_hour == $i ?  'selected':''); ?>><?php echo e($j); ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="ending_minute" class="eForm-label"><?php echo e(get_phrase('Ending minute')); ?></label>
            <select name="ending_minute" id = "ending_minute_on_routine_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Ending minute')); ?></option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?php echo e($i); ?>" <?php echo e($routine->ending_minute == $i ?  'selected':''); ?>><?php echo e($i); ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Update routine')); ?></button>
        </div>

    </div>
</form>


<script type="text/javascript">

    "use strict";

    function classWiseSectionForRoutineCreate(classId) {
        let url = "<?php echo e(route('admin.class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id_on_routine_creation').html(response);
                classWiseSubjectForRoutineCreate(classId);
            }
        });
    }

    function classWiseSubjectForRoutineCreate(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id_on_routine_creation').html(response);
            }
        });
    }

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script>
 ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/routine/edit_routine.blade.php ENDPATH**/ ?>