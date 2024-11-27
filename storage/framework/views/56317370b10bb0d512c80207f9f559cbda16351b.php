
   
<?php $__env->startSection('content'); ?>
<?php
  $db_file_write_perm = is_writable('config/database.php');
  $routes_file_write_perm = is_writable('routes/web.php');
  $curl_enabled = function_exists('curl_version');
  if ($db_file_write_perm == false || $routes_file_write_perm == false || $curl_enabled == false) {
    $valid = false;
  } else {
    $valid = true;
  }
?>
<div class="row ins-two">
  	<div class="col-md-8 col-md-offset-2">
    	<div class="card">
      		<div class="card-body">
        		<div class="panel panel-default ins-three" data-collapsed="0">
    				<!-- panel body -->
    				<div class="panel-body ins-four">
			            <p class="ins-four">
			              <?php echo e(phrase('We ran diagnosis on your server.').' '.phrase('Review the items that have a red mark on it.').' '.phrase('If everything is green, you
			              are good to go to the next step.')); ?>

			            </p>
		            	<br>
			            <p class="ins-four">
			              <?php if ($db_file_write_perm == true) { ?>
			                <i class="bi bi-check-lg ins-nine"></i>
			              <?php } else { ?>
			                <i class="bi bi-x-lg ins-ten"></i>
			              <?php } ?>
			              <strong><?php echo e(phrase('config/database.php')); ?> </strong>: <?php echo e(phrase('file has write permission')); ?>

			            </p>
			            <p class="ins-four">
			              <?php if ($routes_file_write_perm == true) { ?>
			                <i class="bi bi-check-lg ins-nine"></i>
			              <?php } else { ?>
			                <i class="bi bi-x-lg ins-ten"></i>
			              <?php } ?>
			              <strong><?php echo e(phrase('routes/web.php')); ?> </strong>: <?php echo e(phrase('file has write permission')); ?>

			            </p>
			            <p class="ins-four">
			              <?php if ($curl_enabled == true) { ?>
			                <i class="bi bi-check-lg ins-nine"></i>
			              <?php } else { ?>
			                <i class="bi bi-x-lg ins-ten"></i>
			              <?php } ?>
			              <strong><?php echo e(phrase('Curl Enabled')); ?></strong>
			            </p>
			            <p class="ins-four">
			              <strong><?php echo e(phrase('To continue the installation process, all the above requirements are needed to be checked')); ?></strong>
			            </p>
		            	<br>
			            <?php if ($valid == true) { ?>
			              <p>
			                <?php if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') { ?>
			                  <a href="<?php echo e(route('step3')); ?>" class="btn btn-info">
			                    <?php echo e(phrase('Continue')); ?>

			                  </a>
			                <?php } else { ?>
			                  <a href="<?php echo e(route('step2')); ?>" class="btn btn-info">
			                    <?php echo e(phrase('Continue')); ?>

			                  </a>
			                <?php } ?>
			              </p>
			            <?php } ?>

			            <?php if ($valid != true) { ?>
			              <p>
			                <?php if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') { ?>
			                  <a href="<?php echo e(route('step3')); ?>" class="btn btn-info" disabled>
			                    <?php echo e(phrase('Continue')); ?>

			                  </a>
			                <?php } else { ?>
			                  <a href="<?php echo e(route('step2')); ?>" class="btn btn-info" disabled>
			                    <?php echo e(phrase('Continue')); ?>

			                  </a>
			                <?php } ?>
			                <a href="<?php echo e(route('step1')); ?>" class="btn btn-info" >
			                  <i class="mdi mdi-refresh"></i><?php echo e(phrase('Reload')); ?>

			                </a>
			              </p>
			            <?php } ?>
    				</div>
    			</div>
      		</div>
    	</div>
  	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/install/step1.blade.php ENDPATH**/ ?>