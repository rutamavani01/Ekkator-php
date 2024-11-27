
<?php $__env->startSection('content'); ?>

<style>
    .service-icon i {
  font-size: 24px;
  font-weight: bold;
  margin-left: 10px;
  margin-top: 10px;
  color: var(--secondary-color);
}
</style>
<!--  Header Area Start -->
<header class="header-area">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-5">
                <!-- Logo  -->
                <div class="logo">
                    <a href="#"><img src="<?php echo e(asset('assets/uploads/logo/'.get_settings('front_logo'))); ?>" width="200px"
                        alt="..."></a> 
                </div>
            </div>
            <div class="col-lg-7 col-md-6 menu-items">
                <!-- Menu -->
                <nav class="header-menu">
                    <ul class="primary-menu d-flex justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#feature"><?php echo e(get_phrase('Feature')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#price"><?php echo e(get_phrase('Price')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq"><?php echo e(get_phrase('Faq')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact"><?php echo e(get_phrase('Contact')); ?></a></li>
                    </ul>
                </nav>
                <a class="small-device-show" href="#"><img src="<?php echo e(asset('frontend/assets/image/logo.png')); ?>" alt="logo"></a>
                <span class="crose-icon"><i class="fa-solid fa-xmark"></i></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-7">
                <!-- Button Area -->
                <div class="header-btn">
                    <?php
                    if(isset(auth()->user()->id) && auth()->user()->id != "") {
                        if (auth()->user()->role_id =='1') {
                            $panel = 'Superadmin';
                            $dashboard = route('superadmin.dashboard');
                            $user_profile = route('superadmin.profile');
                        } elseif(auth()->user()->role_id =='2'){
                            $panel = 'Administrator';
                            $dashboard = route('admin.dashboard');
                            $user_profile = route('admin.profile');
                        } elseif(auth()->user()->role_id =='3'){
                            $panel = 'Teacher';
                            $dashboard = route('teacher.dashboard');
                            $user_profile = route('teacher.profile');
                        } elseif(auth()->user()->role_id =='4'){
                            $panel = 'Accountant';
                            $dashboard = route('accountant.dashboard');
                            $user_profile = route('accountant.profile');
                        } elseif(auth()->user()->role_id =='5'){
                            $panel = 'Librarian';
                            $dashboard = route('librarian.dashboard');
                            $user_profile = route('librarian.profile');
                        } elseif(auth()->user()->role_id =='6'){
                            $panel = 'Parent';
                            $dashboard = route('parent.dashboard');
                            $user_profile = route('parent.profile');
                        } elseif(auth()->user()->role_id =='7'){
                            $panel = 'Student';
                            $dashboard = route('student.dashboard');
                            $user_profile = route('student.profile');
                        } elseif (auth()->user()->role_id == '8') {
                            $panel = 'Driver';
                            $dashboard = route('driver.dashboard');
                            $user_profile = route('driver.profile');
                        } elseif(auth()->user()->role_id =='9'){
                            $panel = 'Alumni';
                            $dashboard = route('alumni.dashboard');
                            $user_profile = route('alumni.profile');
                        }
                    }
                    ?>
                    <?php if(isset(auth()->user()->id) && auth()->user()->id != ""): ?>
                        <a class="login-btn" href="<?php echo e($dashboard); ?>"><?php echo e(get_phrase($panel)); ?></a>
                        <!-- User Profile Start -->
                        <div class="user-profile">
                            <button class="us-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <img src="<?php echo e(get_user_image(auth()->user()->id)); ?>" alt="user-img">
                           </button>
                           <ul class="dropdown-menu dropmenu-end">
                               <li><a class="dropdown-item" href="<?php echo e($user_profile); ?>"><i class="fa-solid fa-user"></i> <?php echo e(get_phrase('Profile')); ?></a></li>
                               <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>  <?php echo e(get_phrase('Log out')); ?></a>
                                   <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                           </ul>
                         </div>
                        <!-- User Profile End -->
                    <?php else: ?>
                        <a class="login-btn" href="<?php echo e(route('login')); ?>"><?php echo e(get_phrase('Login')); ?></a>
                        <a class="signUp-btn" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><?php echo e(get_phrase('Register')); ?></a>
                    <?php endif; ?>
                    <span class="hambargar-bar"><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>
    </div>
</header> 
<!--  Header Area End   -->
 <!-- Register Form Modal Start -->
    <div class="register-form-modal">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel"><?php echo e(get_phrase('School Register Form')); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('school.create')); ?>">
                    	<?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="reg-modal-form">
                                    <h4><?php echo e(get_phrase('SCHOOL INFO')); ?></h4>
                                    <div class="reg-form-group">
                                        <div class="single-form">
                                            <label for="school_name"><?php echo e(get_phrase('School Name')); ?></label>
                                            <input id="school_name" name="school_name" type="text" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="school_address"><?php echo e(get_phrase('School Address')); ?></label>
                                            <input id="school_address" name="school_address" type="text" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="school_email"><?php echo e(get_phrase('School Email')); ?></label>
                                            <input id="school_email" name="school_email" type="email" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="school_phone"><?php echo e(get_phrase('School Phone')); ?></label>
                                            <input id="school_phone" name="school_phone" type="tel" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="school_info"><?php echo e(get_phrase('School info')); ?></label>
                                           <textarea name="school_info" id="school_info" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="reg-modal-form">
                                    <h4><?php echo e(get_phrase('ADMIN INFO')); ?></h4>
                                    <div class="reg-form-group">
                                        <div class="single-form">
                                            <label for="admin_name"><?php echo e(get_phrase('Admin Name')); ?></label>
                                            <input id="admin_name" name="admin_name" type="text" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="gender"><?php echo e(get_phrase('Gender')); ?></label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value=""><?php echo e(get_phrase('Select a gender')); ?></option>
                                                <option value="Male"><?php echo e(get_phrase('Male')); ?></option>
                                                <option value="Female"><?php echo e(get_phrase('Female')); ?></option>
                                              </select>
                                        </div>
                                        <div class="single-form">
                                            <label for="blood_group"><?php echo e(get_phrase('Blood group')); ?></label>
                                            <select class="form-select"  id="blood_group" name="blood_group" required>
                                                <option value=""><?php echo e(get_phrase('Select a blood group')); ?></option>
                                                <option value="a+"><?php echo e(get_phrase('A+')); ?></option>
							                    <option value="a-"><?php echo e(get_phrase('A-')); ?></option>
							                    <option value="b+"><?php echo e(get_phrase('B+')); ?></option>
							                    <option value="b-"><?php echo e(get_phrase('B-')); ?></option>
							                    <option value="ab+"><?php echo e(get_phrase('AB+')); ?></option>
							                    <option value="ab-"><?php echo e(get_phrase('AB-')); ?></option>
							                    <option value="o+"><?php echo e(get_phrase('O+')); ?></option>
							                    <option value="o-"><?php echo e(get_phrase('O-')); ?></option>
                                              </select>
                                        </div>
                                        <div class="single-form">
                                            <label for="admin_address"><?php echo e(get_phrase('Admin Address')); ?></label>
                                            <input id="admin_address" name="admin_address" type="text" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="admin_phone"><?php echo e(get_phrase('Admin Phone Number')); ?></label>
                                            <input id="admin_phone" name="admin_phone" type="tel" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="photo"><?php echo e(get_phrase('Photo')); ?></label>
                                            <input class="form-control" type="file" accept="image/*" id="photo" name="photo" >
                                        </div>
                                        <div class="single-form">
                                            <label for="admin_email"><?php echo e(get_phrase('Admin Email')); ?></label>
                                            <input id="admin_email" name="admin_email" type="email" class="form-control" required>
                                        </div>
                                        <div class="single-form">
                                            <label for="admin_password"><?php echo e(get_phrase('Admin Password')); ?></label>
                                            <input id="admin_password" name="admin_password" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div> 
                                <button class="m-submit-btn" type="submit"><?php echo e(get_phrase('Submit')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
            </div>
        </div>
     </div>
 <!-- Register Form Modal End -->
<!--  Bannar Area Start  -->
<section class="bannar-area">
    <!-- Safe -->
    <span class="safe-top"><img src="<?php echo e(asset('frontend/assets/image/safe-2.png')); ?>" alt="img"></span>
    <span class="safe-left"><img src="<?php echo e(asset('frontend/assets/image/safe-1.png')); ?>" alt="img"></span>
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6">
                <!-- Bannar Content -->
                <div class="bannar-content">
                    <h4><?php echo e(get_settings('system_title')); ?></h4>
                    <h2><?php echo e(get_settings('banner_title')); ?></h2>
                    <p><?php echo e(get_settings('banner_subtitle')); ?></p>
                    <div class="ekatoor-user">
                        <div class="single-user">
                            <h3><?php echo e(count($schools)); ?></h3>
                            <span><?php echo e(get_phrase('Schools')); ?></span>
                        </div>
                        <div class="single-user">
                            <h3><?php echo e(count($users)); ?></h3>
                            <span><?php echo e(get_phrase('User Account')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bananr-right-img">
                    <img src="<?php echo e(asset('frontend/assets/image/bannar-image.png')); ?>" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Bannar Area End   -->
<!--  Service Area Start  -->
<section class="service-area section-padding" id="feature">
    <div class="container">
        <!-- Title  -->
        <div class="title-area">
            <h1><?php echo e(get_phrase('Our Features')); ?></h1>
            <h3><?php echo e(get_settings('features_title')); ?></h3>
            <p><?php echo e(get_settings('features_subtitle')); ?></p>
        </div>
      
        <div class="row mt-5 pt-3">
            <?php $__currentLoopData = $frontendFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frontendFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12  mb-60">
                <div class="service-items">
                    <div class="service-icon">
                        <i class="<?php echo e($frontendFeature->icon); ?>"></i>
                    </div>
                    <div class="service-text">
                        <h3><?php echo e($frontendFeature->title); ?></h3>
                        <p><?php echo e($frontendFeature->description); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
        </div>

        <?php if(count($frontendFeatures) > 7): ?>
        <div class="see-all-btn">
            <a class="see-btn" id="see-btn"><?php echo e(get_phrase('See all')); ?> <i class="fa-solid fa-right-long"></i></a>
        </div>
        <?php else: ?>
            
        <?php endif; ?>
        
    </div>
</section>
<!--  Feature Area End   -->
<!--  Pricing Area Start   -->
<section class="pricing-area section-padding" id="price">
    <div class="container-xl">
        <!-- Title  -->
        <div class="title-area">
            <h1><?php echo e(get_phrase('Price')); ?></h1>
            <h3><?php echo e(get_phrase('Price')); ?></h3>
            <p><?php echo e(get_settings('price_subtitle')); ?></p>
        </div>
        <div class="row">
        	<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        	<?php if($package->interval == 'Monthly'): ?>
	        		<?php $interval = 'mon'; ?>
	        	<?php elseif($package->interval == 'Yearly'): ?>
	        		<?php $interval = 'year'; ?>
	        	<?php else: ?>
	        		<?php $interval = 'day'; ?>
	        	<?php endif; ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="pricing-table">
                    <span class="trail-price"><?php echo e($package->name); ?></span>
                    <h4><?php echo e(currency($package->price)); ?><span class="small-text">/<?php if($package['interval'] == 'life_time'): ?>
                        <?php echo e(get_phrase('life time')); ?>

                        <?php else: ?>
                          <?php if($package['interval'] == 'Days'): ?>
                            <?php echo e($package['days'].' '.$package['interval']); ?>

                        <?php else: ?>
                            <?php echo e($package['interval']); ?>

                        <?php endif; ?>
                        <?php endif; ?></span></h4>
                        <p class="color-ff">Total Students: <?php echo e($package->studentLimit); ?></p>
                        <?php
						$packages_features = json_decode($package->features);
					 ?> 

                    <ul class="pricing-item" style="border-top:0px;">
                        <?php $__currentLoopData = $packages_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packages_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="color-ff"><?php echo e($packages_feature); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="color-ff">Description: <?php echo e($package->description); ?></li>
                    </ul>
                    <?php if(Auth::check() && auth()->user()->role_id == 1): ?>
                        <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning('<?php echo e(auth()->user()->role_id); ?>')"><?php echo e(get_phrase('Subscribe')); ?></a>
                    <?php elseif(Auth::check() && auth()->user()->role_id == 2): ?>
                        <?php $status = subscription_check(auth()->user()->school_id) ?>
                        <?php if($status != 1): ?>
                            <a href="<?php echo e(route('admin.subscription.payment', ['package_id'=> $package->id])); ?>" class="subscribe-btn"><?php echo e(get_phrase('Subscribe')); ?></a>
                        <?php else: ?>
                            <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning('<?php echo e(auth()->user()->role_id); ?>')"><?php echo e(get_phrase('Subscribe')); ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning()"><?php echo e(get_phrase('Subscribe')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!--  Pricing Area End   -->
<!--  Faq  Area Start   -->
<section class="faq-area" id="faq">
    <div class="container-xl">
         <!-- Title  -->
         <div class="title-area">
            <h1><?php echo e(get_phrase('Have Any Question')); ?></h1>
            <h3><?php echo e(get_phrase('Faq')); ?></h3>
            <p><?php echo e(get_settings('faq_subtitle')); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion-area">
                    <div class="accordion" id="accordionExample">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading<?php echo e($loop->index + 1); ?>">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($loop->index + 1); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($loop->index + 1); ?>"><?php echo e($faq->title); ?></button>
                          </h2>
                          <div id="collapse<?php echo e($loop->index + 1); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo e($loop->index + 1); ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><?php echo e($faq->description); ?></p>
                            </div>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>
<!--  faq Area End   -->
<!--  Cntact  Area Start  -->
<section class="contact-us-area" id="contact">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12">
                <div class="lan-contact">
                    <div class="contact-left text-center">
                        <h3><?php echo e(get_phrase('Contact us with any questions')); ?></h3>
                        <a class="contact-us-btn" href="mailto:<?php echo e(get_settings('contact_email')); ?>"><i class="fa-solid fa-envelope"></i> <?php echo e(get_phrase('Contact Us')); ?></a>
                    </div>
                    <div class="contact-right">
                        <div class="envolepe-messeage">
                            <img src="<?php echo e(asset('frontend/assets/image/envelope.png')); ?>" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Contact Area End   -->
<!-- Footer Area Start -->
<footer class="footer-area">
   <!-- footer Top Area -->
    <div class="footer-top">
         <div class="container-xl">
             <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <div class="footer-items">
                        <div class="footer-logo">
                            <a href="#"><img src="<?php echo e(asset('assets/uploads/logo/'.get_settings('light_logo'))); ?>" alt="image"></a>
                        </div>
                        <p><?php echo e(get_settings('frontend_footer_text')); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <div class="contacts footer-items">
                        <h4>Contact</h4>
                        <ul class="ad-contacts">
                            <li><a href="tel:<?php echo e(get_settings('phone')); ?>"><i class="fa-solid fa-phone"></i><?php echo e(get_settings('phone')); ?></a></li>
                            <li><a href="mailto:<?php echo e(get_settings('contact_email')); ?>"><i class="fa-solid fa-envelope"></i><?php echo e(get_settings('contact_email')); ?></a></li>
                            <li><span><i class="fa-solid fa-location-dot"></i></span><p><?php echo e(get_settings('address')); ?></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <div class="addons footer-items">
                        <h4><?php echo e(get_phrase('Social Link')); ?></h4>
                        <ul class="footer-social">
                            <li><a href="<?php echo e(get_settings('facebook_link')); ?>" title="Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo e(get_settings('twitter_link')); ?>" title="Twitter" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="<?php echo e(get_settings('linkedin_link')); ?>" title="Linkedin" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="<?php echo e(get_settings('instagram_link')); ?>" title="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
          </div>
     </div>
    <div class="footer-bottom">
         <div class="copyright-text">
           <p>© <?php echo e(get_settings('copyright_text')); ?></p>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<style>
    #toast-container > .toast-warning {
        font-size: 15px;
    }
</style>

<script type="text/javascript">

    "use strict";

    function subscription_warning(roleId) {
        if(roleId == 1){
            toastr.warning("You can't subscribe as superadmin");
        } else if(roleId == 2){
            toastr.warning("Your school is already subscribed to a package.");
        } else {
            toastr.warning("You are not authorized! Please login as school admin.");
        }
    }

        document.getElementById('see-btn').addEventListener('click', function() {
        var currentUrl = new URL(window.location.href);
        var seeAll = currentUrl.searchParams.get('see_all');

        if (seeAll) {
            // If 'see_all' is present, remove it from the URL
            currentUrl.searchParams.delete('see_all');
        } else {
            // If 'see_all' is not present, add it to the URL
            currentUrl.searchParams.set('see_all', true);
        }

        // Redirect to the modified URL
        window.location.href = currentUrl.toString();
    });


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/frontend/landing_page.blade.php ENDPATH**/ ?>