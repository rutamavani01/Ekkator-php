<?php
use App\Models\PaymentMethods;
use App\Models\School;

$school_data = School::where('id', auth()->user()->school_id)->first();
$active_payment_methods=PaymentMethods::where('school_id',auth()->user()->school_id)->orWhere('mode','offline')->get();
$number_of_activated_payment_gateway=PaymentMethods::where('status',1)->where('school_id',auth()->user()->school_id)->orWhere('mode','offline')->get();



$off="";

if(count($number_of_activated_payment_gateway)==1)
{
    $off=' show active';
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(get_phrase('Payment | Ekator 8')); ?></title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/bootstrap-5.1.3/css/bootstrap.min.css')); ?>">

    <!--Custom css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/swiper-bundle.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/custom.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>" />
    <!-- Datepicker css -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/daterangepicker.css')); ?>" />
    <!-- Select2 css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css')); ?>">

<body>

    <div class="main_content paymentContent">
        <div class="paymentHeader d-flex justify-content-between align-items-center">
            <h5 class="title">
                <?php echo e(get_phrase('Make Payment')); ?>

            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.href='<?php echo e(redirect()->back()->getTargetUrl()); ?>'"></button>
        </div>

        <div class="paymentWrap d-flex align-items-start flex-wrap">
            <div class="paymentLeft">

                <p class="payment_tab_title pb-30">
                    <?php echo e(get_phrase('Payment Gateway')); ?>

                </p>
                <!-- Tab -->
                <div class="nav flex-md-column flex-row nav-pills payment_modalTab" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <?php $__currentLoopData = $active_payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($value['status']==1 && addon_status('payment_gateways')==1): ?>

                    <div class="tabItem " id="v-pills-<?php echo e($value['name']); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo e($value['name']); ?>" role="tab" aria-controls="v-pills-<?php echo e($value['name']); ?>" aria-selected="true">
                        <div class="payment_gateway_option d-flex align-items-center">
                            <div class="logo">
                                <?php
                                $image_logo="assets/images/".$value['name'].".png";
                                ?>
                                <img src="<?php echo e(asset($image_logo)); ?>" alt="" />
                            </div>
                            <div class="info">
                                <?php echo e(ucfirst ($value['name'])); ?>

                                <?php if($value['name'] != 'offline'): ?>
                                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>


                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(addon_status('payment_gateways')!=1): ?>
                    <?php $off=' show active'; ?>

                    <div class="tabItem " id="v-pills-offline-tab" data-bs-toggle="pill" data-bs-target="#v-pills-offline" role="tab" aria-controls="v-pills-offline" aria-selected="true">
                        <div class="payment_gateway_option d-flex align-items-center">
                            <div class="logo">
                                <?php
                                $image_logo="assets/images/offline.png";
                                ?>
                                <img src="<?php echo e(asset($image_logo)); ?>" alt="" />
                            </div>
                            <div class="info">
                                <p class="card_no"><?php echo e(get_phrase('Offline')); ?></p>

                            </div>
                        </div>
                    </div>



                    <?php endif; ?>

                </div>
            </div>



            <div class="paymentRight">
                <p class="payment_tab_title pb-30">
                    <?php echo e(get_phrase('Invoice Summary')); ?>

                </p>
                <div class="payment_table">
                    <div class="table-responsive">
                        <table class="table eTable eTable-2">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="dAdmin_info_name">
                                            <p><span><?php echo e('01'); ?></span></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-100px">
                                            <p>
                                                <?php echo e($fee_details['title']); ?>

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-150px text-end">
                                            <p>
                                                <?php echo e($fee_details['total_amount']." ".get_active_currency()); ?>

                                            </p>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-150px text-end">
                                            <p><span>
                                                    <?php echo e(get_phrase('Grand Total')); ?> :
                                                    <?php echo e($fee_details['total_amount']." ".get_active_currency()); ?>

                                                </span></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Content -->
                <div class="tab-content payment_modalTab_content" id="v-pills-tabContent">



                    <?php if(addon_status('payment_gateways')==1): ?>
                    <?php echo $__env->make('student.payment.paypal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('student.payment.stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('student.payment.razorpay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('student.payment.paytm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('student.payment.flutterwave', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <div class="tab-pane fade <?=$off?>" id="v-pills-offline" role="tabpanel" aria-labelledby="v-pills-offline-tab" tabindex="0">
                        <div class="off_payment_form">


                            <form action="<?php echo e(route('student.offline_payment', ['id' => $fee_details['id']])); ?>" class="offline-form form" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                <hr class="border mb-4">

                                <input type="hidden" id="amount" class="form-control eForm-control" name="amount" value="<?php echo e($fee_details['total_amount']); ?>" readonly>


                                <div class="payable_document">
                                    <label for="payableDocuemnt" class="eForm-label">
                                        <?php echo e(get_phrase('Document of your payment')); ?> (jpg, pdf, txt, png, docx)
                                    </label>
                                    <input type="file" class="form-control eForm-control-file" id="document_image" name="document_image" required>
                                </div>

                        </div>



                        <button type="submit" class="off_payment_btn">
                            <?php echo e(get_phrase('Submit payment document')); ?>

                        </button>


                        <div class="offline_payment_instruction alert alert-success mt-3">

                            <div class="instruction_img">
                                <p class="payment_tab_title mb-3 text-center">
                                    <?php echo e(get_phrase('Instruction')); ?>

                                </p>
                                <p class="mb-3"><?php echo e(($school_data->off_pay_ins_text)); ?></p>

                                <?php if(!empty($school_data->off_pay_ins_file)): ?>
                                    <?php
                                        $fileExtension = pathinfo($school_data->off_pay_ins_file, PATHINFO_EXTENSION);
                                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                        
                                    ?>
                                        

                                    <?php if(in_array(strtolower($fileExtension), $allowedExtensions)): ?>
                                        
                                        <a href="<?php echo e(asset('assets/uploads/offline_payment/'. $school_data->off_pay_ins_file)); ?>" download><img src="<?php echo e(asset('assets/uploads/offline_payment/'. $school_data->off_pay_ins_file)); ?>" width="539px" ></a>
                                        
                                    <?php else: ?>
                                    <span class="badge bg-success m-1">
                                        <a style="color:#fff; font-size: 14px;" href="<?php echo e(asset('assets/uploads/offline_payment/'.$school_data->off_pay_ins_file)); ?>" download>Download the instruction <i class="bi bi-file-earmark-richtext-fill"></i></a>
                                    </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                            </div>
                            
                            <p class="mt-3">
                                 <?php echo e(get_phrase('Admin will review your payment document and then approve the Payment.')); ?>

                            </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="<?php echo e(asset('assets/vendors/jquery/jquery-3.6.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/swiper-bundle.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/daterangepicker.min.js')); ?>"></script>
        <!-- Select2 js -->
        <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>

        <!--Custom Script-->
        <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/student/payment/payment_gateway.blade.php ENDPATH**/ ?>