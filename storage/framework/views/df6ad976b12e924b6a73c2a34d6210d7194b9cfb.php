<?php 

use App\Models\Enrollment;
use App\Models\User;

?>

<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.book_issue.update', ['id' => $book_issue_details->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
		<div class="fpb-7">
	        <label for="issue_date" class="eForm-label"><?php echo e(get_phrase('Issue date')); ?></label>
	        <input type="text" class="form-control eForm-control inputDate" id="issue_date" name = "issue_date" value="<?php echo e(date('m/d/Y', $book_issue_details['issue_date'])); ?>" required>
	    </div>

		<div class="fpb-7">
			<label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
			<select name="class_id" id="class_id_on_modal" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseStudentOnCreate(this.value)">
				<option value=""><?php echo e(get_phrase('Select a class')); ?></option>
				<?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($class['id']); ?>" <?php if ($book_issue_details['class_id'] == $class['id']): ?> selected <?php endif; ?>><?php echo e($class['name']); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>

		<div class="fpb-7">
			<label for="student_id" class="eForm-label"> <?php echo e(get_phrase('Student')); ?></label>
			<select name="student_id" id="student_id_on_create" class="form-select eForm-select eChoice-multiple-with-remove" required >
				<option value=""><?php echo e(get_phrase('Select a student')); ?></option>
				<?php $enrollments = Enrollment::get()->where('class_id', $book_issue_details['class_id']);
				foreach ($enrollments as $enrollment): ?>
					<?php $student = User::find($enrollment->user_id); ?>
					<option value="<?php echo e($enrollment['user_id']); ?>" <?php if ($book_issue_details['student_id'] == $enrollment['user_id']): ?>selected<?php endif; ?>><?php echo e($student->name); ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="fpb-7">
			<label for="book_id" class="eForm-label"> <?php echo e(get_phrase('Book')); ?></label>
			<select name="book_id" id="book_id_on_modal" class="form-select eForm-select eChoice-multiple-with-remove" required>
				<option value=""><?php echo e(get_phrase('Select book')); ?></option>
				<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($book['id']); ?>" <?php if ($book_issue_details['book_id'] == $book['id']): ?> selected <?php endif; ?>><?php echo e($book['name']); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>

		<div class="fpb-7 pt-2">
		  <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
		</div>
    </div>
</form>

<script type="text/javascript">

  "use strict";

	
	function classWiseStudentOnCreate(classId) {
		let url = "<?php echo e(route('admin.class_wise_student', ['id' => ":classId"])); ?>";
    	url = url.replace(":classId", classId);
		$.ajax({
			url: url,
			success: function(response){
		  		$('#student_id_on_create').html(response);
			}
		});
	}

	$(function () {
    $('.inputDate').daterangepicker(
      {
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 10),
      },
      function (start, end, label) {
        var years = moment().diff(start, "years");
      }
    );
  });

	
  $(document).ready(function () {
    $(".eChoice-multiple-with-remove").select2();
  });

</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/book_issue/edit.blade.php ENDPATH**/ ?>