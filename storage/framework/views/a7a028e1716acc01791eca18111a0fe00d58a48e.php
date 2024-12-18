
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('Exam Category')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Exam Category')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.exam_category.open_modal')); ?>', '<?php echo e(get_phrase('Create Exam Category')); ?>')"><?php echo e(get_phrase('Add Exam Category')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start Exam Category area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(count($exam_categories) > 0): ?>
            <!-- Table -->
            <div class="table-responsive tScrollFix pb-2">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(get_phrase('Title')); ?></th>
                            <th scope="col" class="text-end"><?php echo e(get_phrase('Options')); ?></th>
                        </tr>
                	</thead>
                	<tbody>
                		<?php $__currentLoopData = $exam_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td>
                				<?php echo e($key+1); ?>

                			</td>
                			<td>
                                <?php echo e($exam_category['name']); ?>

    						</td>
    						<td class="text-center">
                                <div class="adminTable-action">
                                    <button
                                        type="button"
                                        class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <?php echo e(get_phrase('Actions')); ?>

                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('admin.edit.exam_category', ['id' => $exam_category->id])); ?>', '<?php echo e(get_phrase('Edit Exam Category')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('admin.exam_category.delete', ['id' => $exam_category->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                                        </li>
                                    </ul>
                                </div>					
    						</td>
                		</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="exam_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Exam category area -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/exam_category/exam_category.blade.php ENDPATH**/ ?>