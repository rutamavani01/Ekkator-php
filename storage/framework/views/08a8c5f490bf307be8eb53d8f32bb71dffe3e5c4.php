

<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
	    <div class="col-12">
	        <div
	          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
	        >
				<div class="d-flex flex-column">
					<h4><?php echo e(get_phrase('Offline payment Request')); ?></h4>
					<ul class="d-flex align-items-center eBreadcrumb-2">
						<li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
						<li><a href="#"><?php echo e(get_phrase('Accounting')); ?></a></li>
						<li><a href="#"><?php echo e(get_phrase('Offline payment Request')); ?></a></li>
					</ul>
				</div>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    	<div class="eSection-wrap">
            <form method="GET" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('accountant.offline_payment_pending')); ?>">
            	<div class="row">
                    <div class="row justify-content-md-center">
                    	<?php if($date_from != "" && $date_to !=""): ?>
                    		<div class="col-xl-3 mb-3">
                                <input type="text" class="form-control eForm-control" name="eDateRange"
                                    value="<?php echo e(date('m/d/Y', $date_from).' - '.date('m/d/Y', $date_to)); ?>" />
                            </div>
                        <?php else: ?>
	            			<div class="col-xl-3 mb-3">
                                <input type="text" class="form-control eForm-control" name="eDateRange"
                                    value="<?php echo e(date('m/d/Y', strtotime(' -30 day')).' - '.date('m/d/Y')); ?>" />
                            </div>
		                <?php endif; ?>
						<div class="col-xl-2 mb-3">
							<?php if(isset($selected_class) && $selected_class != ""): ?>
					            <div class="form-group">
									<select name="class" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove">
										<option value="all"><?php echo e(get_phrase('All class')); ?></option>
										<?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($class['id']); ?>" <?php echo e($class['id'] == $selected_class ?  'selected':''); ?>><?php echo e($class['name']); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
					            </div>
					        <?php else: ?>
					        	<div class="form-group">
									<select name="class" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove">
										<option value="all"><?php echo e(get_phrase('All class')); ?></option>
										<?php foreach($classes as $class){
										  ?>
										  <option value="<?php echo e($class['id']); ?>"><?php echo e($class['name']); ?></option>
										<?php } ?>
									</select>
					            </div>
					        <?php endif; ?>
				        </div>

				        <div class="col-xl-2 mb-3">
				            <button type="submit" class="eBtn eBtn btn-secondary form-control"><?php echo e(get_phrase('Filter')); ?></button>
				        </div>
				        <?php
		            	if($selected_class == ""){
						    $sel_class = 'all';
						} else {
						    $sel_class = $selected_class;
						}

						if($date_from == "") {
						    $date_from = strtotime(date('d-M-Y', strtotime(' -30 day')));
						} else {
						    $date_from = strtotime(date('d-M-Y', $date_from));
						}

						if($date_to == "") {
						    $date_to = strtotime(date('d-M-Y'));
						} else {
						    $date_to = strtotime(date('d-M-Y', $date_to));
						}

						if($selected_status == ""){
						    $sel_status = 'all';
						} else {
						    $sel_status = $selected_status;
						}
		            	?>
				        <?php if(count($invoices) > 0): ?>
				        <div class="col-xl-2 ">
		                    <div class="position-relative">
		                      <button class="eBtn-3 dropdown-toggle float-end" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
		                        <span class="pr-10">
		                          <svg xmlns="http://www.w3.org/2000/svg" width="12.31" height="10.77" viewBox="0 0 10.771 12.31">
		                            <path id="arrow-right-from-bracket-solid" d="M3.847,1.539H2.308a.769.769,0,0,0-.769.769V8.463a.769.769,0,0,0,.769.769H3.847a.769.769,0,0,1,0,1.539H2.308A2.308,2.308,0,0,1,0,8.463V2.308A2.308,2.308,0,0,1,2.308,0H3.847a.769.769,0,1,1,0,1.539Zm8.237,4.39L9.007,9.007A.769.769,0,0,1,7.919,7.919L9.685,6.155H4.616a.769.769,0,0,1,0-1.539H9.685L7.92,2.852A.769.769,0,0,1,9.008,1.764l3.078,3.078A.77.77,0,0,1,12.084,5.929Z" transform="translate(0 12.31) rotate(-90)" fill="#00a3ff"></path>
		                          </svg>
		                        </span>
		                        <?php echo e(get_phrase('Export')); ?>

		                      </button>
		                      <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2">
		                        <li>
		                            <a class="dropdown-item" id="pdf" href="javascript:;" onclick="generatePDF()"><?php echo e(get_phrase('PDF')); ?></a>
		                        </li>
		                        <li>
		                            <a class="dropdown-item" id="download-button" href="<?php echo e(route('admin.fee_manager.export', ['date_from' => $date_from, 'date_to' => $date_to, 'selected_class' => $sel_class, 'selected_status' => $sel_status])); ?>"><?php echo e(get_phrase('CSV')); ?></a>
		                        </li>
		                        <li>
		                            <a class="dropdown-item" id="print" href="javascript:;" onclick="printableDiv('student_fee_report')"><?php echo e(get_phrase('Print')); ?></a>
		                        </li>
		                      </ul>
		                    </div>
		                </div>
	                    <?php endif; ?>
            		</div>
            	</div>
            </form>
            <div class="invoice_content" id="student_fee_manager">
	            <?php echo $__env->make('accountant.student_fee_manager.list_pending', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	        </div>
		</div>
	</div>
</div>

<script type="text/javascript">

  "use strict";

	function generatePDF() {

    	// Choose the element that our invoice is rendered in.
	    const element = document.getElementById("student_fee_report");

	    // clone the element
	    var clonedElement = element.cloneNode(true);

	    // change display of cloned element
	    $(clonedElement).css("display", "block");

	    // Choose the clonedElement and save the PDF for our user.

		var opt = {
		  margin:       1,
		  filename:     'student_fee-<?php echo e(date('d-M-Y', $date_from).'-'.date('d-M-Y', $date_to).'-'.$sel_class.'-'.$sel_status); ?>.pdf',
		  image:        { type: 'jpeg', quality: 0.98 },
		  html2canvas:  { scale: 2 }
		};

		// New Promise-based usage:
		html2pdf().set(opt).from(clonedElement).save();

	    // remove cloned element
	    clonedElement.remove();
	}

	function printableDiv(printableAreaDivId) {
		setTimeout(function(){
			var printContents = document.getElementById(printableAreaDivId).innerHTML;
	        var originalContents = document.body.innerHTML;

	        document.body.innerHTML = printContents;

	        window.print();

	        document.body.innerHTML = originalContents;
		});
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('accountant.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/accountant/student_fee_manager/student_fee_manager_pending.blade.php ENDPATH**/ ?>