
   
<?php $__env->startSection('content'); ?>
<?php if(isset($db_connection) && $db_connection != "") { ?>
  <div class="row ins-seven">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong><?php echo e($db_connection); ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row ins-two">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default ins-three" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body ins-four">
            <p class="ins-four">
              <?php echo e(phrase('Below you should enter your database connection details.').' '.phrase('If you’re not sure about these, contact your host.')); ?>

            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post"
                  action="<?php echo e(route('step3')); ?>">
                  <?php echo csrf_field(); ?> 
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(phrase('Database Name')); ?></label>
            				<div class="col-sm-5">
            					<input type="text" class="form-control eForm-control" name="dbname" placeholder=""
                        required autofocus>
            				</div>
                    <div class="col-sm-4 ins-six">
                      <?php echo e(phrase('The name of the database you want to use with this application')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(phrase('Username')); ?></label>
            				<div class="col-sm-5">
            					<input type="text" class="form-control eForm-control" name="username" placeholder=""
                        required>
            				</div>
                    <div class="col-sm-4 ins-six">
                      <?php echo e(phrase('Your database Username')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(phrase('Password')); ?></label>
            				<div class="col-sm-5">
            					<input type="password" class="form-control eForm-control" name="password" placeholder="">
            				</div>
                    <div class="col-sm-4 ins-six">
                      <?php echo e(phrase('Your database Password')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(phrase('Database Host')); ?></label>
            				<div class="col-sm-5">
            					<input type="text" class="form-control eForm-control" name="hostname" placeholder=""
                        required>
            				</div>
                    <div class="col-sm-4 ins-six">
                      <?php echo e(phrase("If 'localhost' does not work, you can get the hostname from web host")); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"></label>
            				<div class="col-sm-7">
            					<button type="submit" class="btn btn-info"><?php echo e(phrase('Continue')); ?></button>
            				</div>
            			</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/install/step3.blade.php ENDPATH**/ ?>