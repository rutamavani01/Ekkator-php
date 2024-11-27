<?php 
use App\Models\User;
use App\Models\Section;
use App\Models\Classes;
?>

<div class="table-responsive">
    <table class="table eTable">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(get_phrase('Image')); ?></th>
                <th><?php echo e(get_phrase('Student name')); ?></th>
                <th><?php echo e(get_phrase('Section')); ?></th>
                <th><?php echo e(get_phrase('Status')); ?></th>
                <th><?php echo e(get_phrase('Action')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $promotion_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
            $student_details = User::find($enrollment->user_id);
            $info = json_decode($student_details->user_information);
            $user_image = $info->photo;
            if(!empty($info->photo)){
                $user_image = 'uploads/user-images/'.$info->photo;
            }else{
                $user_image = 'uploads/user-images/thumbnail.png';
            } 
            $section_details = Section::find($enrollment->section_id);
            $class_to_details = Classes::find($class_id_to);
            $class_from_details = Classes::find($class_id_from);
            ?>
            <tr>
                <td><?php echo e($loop->index + 1); ?></td>
                <td>
                    <img class="img-fluid" src="<?php echo e(asset('assets')); ?>/<?php echo e($user_image); ?>" width="50" height="50">
                </td>
                <td>
                    <div class="dAdmin_profile_name">
                      <span><?php echo e($student_details->name); ?></span>
                    </div>
                </td>
                <td><?php echo e($section_details->name); ?></td>
                <td>
                    <span class="eBadge ebg-success display-none-view" id = "success_<?php echo e($enrollment->id); ?> " >Prmoted</span>
                    <span class="eBadge ebg-primary"  id = "danger_<?php echo e($enrollment->id); ?>">Not promoted yet</span>
                </td>
                <td>
                  <button type="button" class="btn btn-icon btn-success btn-sm" onclick="enrollStudent('<?php echo e($enrollment->id.'-'.$class_id_to.'-'.$section_id_to.'-'.$session_id_to); ?>', '<?php echo e($enrollment->id); ?>')"><?php echo e(get_phrase('Enroll to')); ?><strong> <?php echo e($class_to_details->name); ?> </strong> </button> <br><br>
                  <button type="button" class="btn btn-icon btn-secondary btn-sm" onclick="enrollStudent('<?php echo e($enrollment->id.'-'.$class_id_from.'-'.$section_id_from.'-'.$session_id_to); ?>', '<?php echo e($enrollment->id); ?>')"><?php echo e(get_phrase('Enroll to')); ?><strong> <?php echo e($class_from_details->name); ?> </strong> </button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">

  "use strict";

    function enrollStudent(promotion_data, enroll_id) {
        let url = "<?php echo e(route('admin.promotion.promote', ['promotion_data' => ":promotion_data"])); ?>";
        url = url.replace(":promotion_data", promotion_data);
      $.ajax({
        type : 'get',
        url: url,
        success : function(response) {
            console.log(response);
          if (response) {
            $("#success_"+enroll_id).show();
            $("#danger_"+enroll_id).hide();
            toastr.success("<?php echo e('Student promoted successfully'); ?>");
          }else{
            toastr.error("<?php echo e('An error occured'); ?>");
          }
        }
      });
    }
</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/promotion/promotion_list.blade.php ENDPATH**/ ?>