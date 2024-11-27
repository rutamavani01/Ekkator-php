<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.event.update', ['id' => $event->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">

		<div class="fpb-7">
			<label for="title" class="eForm-label"><?php echo e(get_phrase('Event title')); ?></label>
			<input type="text" class="form-control eForm-control" id="title" name = "title" value="<?php echo e($event['title']); ?>" required>
		</div>

		<div class="fpb-7">
            <label for="timestamp" class="eForm-label"><?php echo e(get_phrase('Date')); ?></label>
            <input type="text" class="form-control eForm-control inputDate" id="timestamp" name = "timestamp" value="<?php echo e(date('m/d/Y', $event['timestamp'])); ?>" required>
        </div>

		<div class="fpb-7">
			<label for="status" class="eForm-label"><?php echo e(get_phrase('Status')); ?></label>
			<select name="status" id="status" class="form-select eForm-control">
				<option value="1" <?php if ($event['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('Active')); ?></option>
				<option value="0" <?php if ($event['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('Inactive')); ?></option>
			</select>
		</div>

		<div class="fpb-7 pt-2">
			<button class="btn-form" type="submit"><?php echo e(get_phrase('Save event')); ?></button>
		</div>
	</div>
</form>

<script type="text/javascript">

    "use strict";

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

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

</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/events/edit_event.blade.php ENDPATH**/ ?>