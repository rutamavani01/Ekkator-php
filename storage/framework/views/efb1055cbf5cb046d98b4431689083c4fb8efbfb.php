<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Creativeitem Software Installation" />
	<meta name="author" content="Creativeitem" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="shortcut icon" href="<?php echo e(asset('assets/uploads/logo/favicon.png')); ?>">
	<title><?php echo e(phrase('Installation').' | '.phrase('Ekattor')); ?></title>
	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/bootstrap-5.1.3/css/bootstrap.min.css')); ?>">

    <!--Custom css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/main.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/calender/main.css')); ?>">

    <!--Toaster css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/toastr.min.css')); ?>">


    <!--Main Jquery-->
    <script src="<?php echo e(asset('assets/vendors/jquery/jquery-3.6.0.min.js')); ?>"></script>


</head>
<body class="page-body">

<div class="page-container horizontal-menu">


	<header class="navbar navbar-fixed-top ins-one">
		<div class="navbar-inner">
			<!-- logo -->
			<div class="navbar-brand">
				<a href="#">
					<img width="130px" src="<?php echo e(asset('assets')); ?>/uploads/logo/light-logo.png" alt="">
				</a>
				<span class="logo_name ms-4"><?php echo e(phrase('Installation')); ?></span>
			</div>
		</div>
	</header>
	<div class="main_content">
		<?php echo $__env->yieldContent('content'); ?>
	</div>

	<!--Main Jquery-->
	<script src="<?php echo e(asset('assets/vendors/jquery/jquery-3.6.0.min.js')); ?>"></script>
	<!--Bootstrap bundle with popper-->
	<script src="<?php echo e(asset('assets/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/swiper-bundle.min.js')); ?>"></script>

	<!--Custom Script-->
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/calender/main.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/calender/locales-all.js')); ?>"></script>


    <!--old-->

    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/daterangepicker.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/install/index.blade.php ENDPATH**/ ?>