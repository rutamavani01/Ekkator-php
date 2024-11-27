
   
<?php $__env->startSection('content'); ?>
<?php $index = 0; ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Manage Addons')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Addons')); ?></a></li>
                    </ul>
                </div>
                <div class="export-btn-area">
                    <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('superadmin.addon.install')); ?>', '<?php echo e(get_phrase('Install addon')); ?>')"><i class="bi bi-plus"></i><?php echo e(get_phrase('Add new addon')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
        	<?php if(count($addons) > 0): ?>
        		<table class="table eTable">
					<thead>
	                    <th>#</th>
	                    <th><?php echo e(get_phrase('Bundle name')); ?></th>
	                    <th><?php echo e(get_phrase('Feature')); ?></th>
	                    <th><?php echo e(get_phrase('Status')); ?></th>
	                    <th><?php echo e(get_phrase('Version')); ?></th>
	                    <th class="text-center"><?php echo e(get_phrase('Action')); ?></th>
	                </thead>
	                <tbody>
	                	<?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                		<?php if($addon->parent_id == ""): ?>
	                		<?php $index++; ?>
	                		<tr>
	                			<td><?php echo e($index); ?></td>
	                			<td>
	                				<strong><?php echo e($addon->title); ?></strong>
	                			</td>
	                			<td>
	                				<?php $features = explode('-', $addon['features']);?>
	                				<?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                					<?php echo e($feature); ?>

	                					<br>
	                				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
	                			</td>
	                			<td>
	                				<?php if ($addon->status != '1'): ?>
			                            <span class="eBadge ebg-danger"><?php echo e(get_phrase('Deactive')); ?></span>
			                        <?php else: ?>
			                            <span class="eBadge ebg-success"><?php echo e(get_phrase('Active')); ?></span>
			                        <?php endif; ?>
	                			</td>
	                			<td><?php echo e($addon->version); ?></td>
	                			<td class="text-start">
	                				<div class="adminTable-action">
	                                    <button
	                                      type="button"
	                                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
	                                      data-bs-toggle="dropdown"
	                                      aria-expanded="false"
	                                    >
	                                      <?php echo e(get_phrase('Actions')); ?>

	                                    </button>
	                                    <ul
	                                      class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
	                                    >
	                                    <?php if ($addon->status != '1'): ?>
											<li>
												<a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('superadmin.addon.status', ['id' => $addon->id])); ?>', 'undefined');"><?php echo e(get_phrase('Active')); ?></a>
											</li>
	                                    <?php else: ?>
	                                    	<li>
												<a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('superadmin.addon.status', ['id' => $addon->id])); ?>', 'undefined');"><?php echo e(get_phrase('Deactive')); ?></a>
											</li>
	                                    <?php endif; ?>
	                                      <li>
	                                        <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('superadmin.addon.delete', ['id' => $addon->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
	                                      </li>
	                                    </ul>
	                                </div>
			                    </td>
	                		</tr>
	                		<?php endif; ?>
	                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </tbody>
				</table>
			<?php else: ?>
				<div class="empty_box center pb-4">
                    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                    <br>
                    <?php echo e(get_phrase('No data found')); ?>

                </div>
			<?php endif; ?>
        </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/addons/list.blade.php ENDPATH**/ ?>