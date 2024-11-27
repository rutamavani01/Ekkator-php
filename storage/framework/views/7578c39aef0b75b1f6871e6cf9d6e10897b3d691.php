
   
<?php $__env->startSection('content'); ?>
<div class="row ins-two">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default ins-three" data-collapsed="0">
    			<!-- panel body -->
    			<div class="panel-body ins-four">
            <h3><?php echo e(phrase('Success')); ?>!!</h3>
            <br>
            <p class="ins-four">
              <strong><?php echo e(phrase('Installation was successfull.').' '.phrase('Please login to continue..')); ?></strong>
            </p>
            <br>
            <table>
              <tbody>
                <tr>
                  <td class="ins-eight"><strong><?php echo e(phrase('Administrator Email')); ?> |</strong></td>
                  <td class="ins-eight"><?php echo e($admin_email); ?></td>
                </tr>
                <tr>
                  <td class="ins-eight"><strong><?php echo e(phrase('Password')); ?> |</strong></td>
                  <td class="ins-eight"><?php echo e(phrase('Your chosen password')); ?></td>
                </tr>
              </tbody>
            </table>
            <br>
            <p>
              <a href="<?php echo e(route('login')); ?>" class="btn btn-info">
                <i class="entypo-login"></i> &nbsp; <?php echo e(phrase('Log In')); ?>

              </a>
            </p>
    			</div>
    		</div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/install/success.blade.php ENDPATH**/ ?>