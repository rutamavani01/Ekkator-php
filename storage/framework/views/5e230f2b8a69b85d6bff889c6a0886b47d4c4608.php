<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.expense_category.update', ['id' => $expense_category->id])); ?>">
  <?php echo csrf_field(); ?> 
  <div class="form-row">
    <div class="fpb-7">
      <label for="name" class="eForm-label"><?php echo e(get_phrase('Expense category name')); ?></label>
      <input type="text" class="form-control eForm-control" id="name" name = "name" value="<?php echo e($expense_category->name); ?>" required>
    </div>

    <div class="fpb-7 pt-2">
      <button class="btn-form" type="submit"><?php echo e(get_phrase('Update category')); ?></button>
    </div>
  </div>
</form>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/expense_category/edit.blade.php ENDPATH**/ ?>