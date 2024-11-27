<div class="notice-edit-portion">
	<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.noticeboard.update', ['id' => $notice->id])); ?>">
	    <?php echo csrf_field(); ?> 
	    <div class="form-row">

	    	<div class="fpb-7">
	            <label for="notice_title" class="eForm-label"><?php echo e(get_phrase('Notice title')); ?></label>
	            <input type="text" class="form-control eForm-control" id="notice_title" name = "notice_title" value="<?php echo e($notice['notice_title']); ?>" required>
	        </div>

            <div class="fpb-7">
	            <label for="start_date" class="eForm-label"><?php echo e(get_phrase('Start date')); ?></label>
	            <input type="text" class="form-control eForm-control inputDate" id="start_date" name = "start_date" value="<?php echo e(date('m/d/Y', strtotime($notice['start_date']))); ?>" required>
	        </div>


			<div class="fpb-7">
		        <input type="checkbox" name="time_details" id="time_details" value="1" onclick="toggleTimeFields(this.id)">
		        <label for="time_details"><?php echo e(get_phrase('Setup additional date & time')); ?>?</label>
		    </div>

		    <div class="time-details-stuffs">

		    	<div class="fpb-7">
		            <label for="start_time" class="eForm-label"><?php echo e(get_phrase('Start time')); ?><span class="required"></span></label>
		            <input type="time" class="form-control eForm-control" id="start_time" name="start_time" value="<?php echo e($notice['start_time']); ?>">
		        </div>

		        <div class="fpb-7">
		            <label for="end_date" class="eForm-label"><?php echo e(get_phrase('End date')); ?><span class="required"></span></label>
		            <input type="text" class="form-control eForm-control inputDate" id="end_date" name="end_date" value="<?php echo e(date('m/d/Y', strtotime($notice['end_date']))); ?>" />
		        </div>

		        <div class="fpb-7">
		            <label for="end_time" class="eForm-label"><?php echo e(get_phrase('End time')); ?><span class="required"></span></label>
		            <input type="time" class="form-control eForm-control" id="end_time" name="end_time" value="<?php echo e($notice['end_time']); ?>">
		        </div>
			</div>

			<div class="fpb-7">
				<label for="notice" class="eForm-label"><?php echo e(get_phrase('Notice')); ?></label>
				<textarea name="notice" class="form-control eForm-control" rows="8" cols="80" placeholder="Provide notice details" required><?php echo e($notice['notice']); ?></textarea>
			</div>

			<div class="fpb-7">
				<label for="show_on_website" class="eForm-label"><?php echo e(get_phrase('Show on website')); ?></label>
				<select name="show_on_website" id="show_on_website" class="form-select eForm-select eChoice-multiple-with-remove">
					<option value="1" <?php echo e($notice['show_on_website'] == 1 ?  'selected':''); ?>><?php echo e(get_phrase('Show')); ?></option>
					<option value="0" <?php echo e($notice['show_on_website'] == 0 ?  'selected':''); ?>><?php echo e(get_phrase('Do not need to show')); ?></option>
				</select>
			</div>

			<div class="fpb-7">
                <label for="image" class="eForm-label"><?php echo e(get_phrase('Upload notice photo')); ?></label>
                <input class="form-control eForm-control-file" type="file" id="image" name="image" accept="image/*">
            </div>

			<div class="fpb-7 pt-2">
				<button class="eBtn eBtn btn-primary float-right" type="submit"><?php echo e(get_phrase('Update')); ?></button>

				<a href="javascript:void(0)" class="float-end" onclick="showNoticeDeleteModal()">
					<button class="eBtn eBtn btn-danger" type="button"><?php echo e(get_phrase('Delete')); ?></button>
				</a>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">

  "use strict";


	function showNoticeDeleteModal() {
	  $('#right-modal').modal('hide');
	  confirmModal('<?php echo e(route('admin.noticeboard.delete', ['id' => $notice->id])); ?>', 'undefined');
	}

	function toggleTimeFields(elem) {
		if($("#"+elem).is(':checked')){
	  		$('.time-details-stuffs').slideUp();
		} else {
			$('.time-details-stuffs').slideDown();
		}
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

</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/noticeboard/edit.blade.php ENDPATH**/ ?>