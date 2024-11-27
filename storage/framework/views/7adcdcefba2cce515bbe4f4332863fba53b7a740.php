
   
<?php $__env->startSection('content'); ?>
<div class="row ins-two">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default ins-three" data-collapsed="0">
    			<!-- panel body -->
    			<div class="panel-body ins-four">
            <p class="ins-four">
              <?php echo e(phrase('Welcome to Ekattor School Management System Installation. You will need to know the following items before proceeding.')); ?>

            </p>
            <ol>
              <li><?php echo e(phrase('Codecanyon purchase code')); ?></li>
              <li><?php echo e(phrase('Database Name')); ?></li>
              <li><?php echo e(phrase('Database Username')); ?></li>
              <li><?php echo e(phrase('Database Password')); ?></li>
              <li><?php echo e(phrase('Database Hostname')); ?></li>
            </ol>
            <p class="ins-four">
              <?php echo e(phrase('We are going to use the above information to write database.php file which will connect the application to your database.').' '.phrase('During the installation process, we will check if the files that are needed to be written')); ?>

              (<strong><?php echo e(phrase('config/database.php')); ?></strong>) <?php echo e(phrase('have')); ?>

              <strong><?php echo e(phrase('write permission')); ?></strong>. <?php echo e(phrase('We will also check if')); ?> <strong><?php echo e(phrase('curl')); ?></strong> <?php echo e(phrase('and')); ?> <strong><?php echo e(phrase('php mail functions')); ?></strong>
              <?php echo e(phrase('are enabled on your server or not.')); ?>

            </p>
            <p class="ins-four">
              <?php echo e(phrase('Gather the information mentioned above before hitting the start installation button. If you are ready....')); ?>'
            </p>
            <br>
            <p>
              <a href="<?php echo e(route('step1')); ?>" class="btn btn-info">
                <?php echo e(phrase('Start Installation Process')); ?>

              </a>
            </p>
    			</div>
    		</div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/install/step0.blade.php ENDPATH**/ ?>