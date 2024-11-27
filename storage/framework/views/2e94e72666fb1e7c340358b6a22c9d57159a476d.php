

<?php $__env->startSection('content'); ?>
<?php
use App\Models\FrontendFeature;

$frontendFeatures = FrontendFeature::get();

?>


<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Website Settings')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Settings')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Website Settings')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="eSection-wrap">
        <div class="eMain">
            <div class="row">
                <div class="col-md-11 pb-3">
                    <div class="eForm-layouts">
                        <p class="column-title"><?php echo e(get_phrase('GENERAL SETTINGS')); ?></p>
                        <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
                            action="<?php echo e(route('superadmin.system.update')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="fpb-7">
                                <label for="system_title" class="eForm-label"><?php echo e(get_phrase('System Title')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('system_title')); ?>" id="system_title" name="system_title"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="banner_title" class="eForm-label"><?php echo e(get_phrase('Banner Title')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('banner_title')); ?>" id="banner_title" name="banner_title"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="banner_subtitle"
                                    class="eForm-label"><?php echo e(get_phrase('Banner Subtitle')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('banner_subtitle')); ?>" id="banner_subtitle"
                                    name="banner_subtitle" required>
                            </div>
                            <div class="fpb-7">
                                <label for="features_title"
                                    class="eForm-label"><?php echo e(get_phrase('Features Title')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('features_title')); ?>" id="features_title"
                                    name="features_title" required>
                            </div>
                            <div class="fpb-7">
                                <label for="features_subtitle"
                                    class="eForm-label"><?php echo e(get_phrase('Features Subtitle')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('features_subtitle')); ?>" id="features_subtitle"
                                    name="features_subtitle" required>
                            </div>

                            <div class="fpb-7">
                                <label for="price_subtitle"
                                    class="eForm-label"><?php echo e(get_phrase('Price Subtitle')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('price_subtitle')); ?>" id="price_subtitle"
                                    name="price_subtitle" required>
                            </div>
                            <div class="fpb-7">
                                <label for="faq_subtitle" class="eForm-label"><?php echo e(get_phrase('Faq Subtitle')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('faq_subtitle')); ?>" id="faq_subtitle" name="faq_subtitle"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="facebook_link" class="eForm-label"><?php echo e(get_phrase('Facebook Link')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('facebook_link')); ?>" id="facebook_link" name="facebook_link"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="twitter_link" class="eForm-label"><?php echo e(get_phrase('Twitter Link')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('twitter_link')); ?>" id="twitter_link" name="twitter_link"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="linkedin_link" class="eForm-label"><?php echo e(get_phrase('Linkedin Link')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('linkedin_link')); ?>" id="linkedin_link" name="linkedin_link"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="instagram_link"
                                    class="eForm-label"><?php echo e(get_phrase('Instagram Link')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('instagram_link')); ?>" id="instagram_link"
                                    name="instagram_link" required>
                            </div>
                            <div class="fpb-7">
                                <label for="contact_email" class="eForm-label"><?php echo e(get_phrase('Contact Mail')); ?></label>
                                <input type="email" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('contact_email')); ?>" id="contact_email" name="contact_email"
                                    required>
                            </div>
                            <div class="fpb-7">
                                <label for="frontend_footer_text"
                                    class="eForm-label"><?php echo e(get_phrase('Frontend Footer Text')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('frontend_footer_text')); ?>" id="frontend_footer_text"
                                    name="frontend_footer_text" required>
                            </div>
                            <div class="fpb-7">
                                <label for="copyright_text"
                                    class="eForm-label"><?php echo e(get_phrase('Copyright Text')); ?></label>
                                <input type="text" class="form-control eForm-control"
                                    value="<?php echo e(get_settings('copyright_text')); ?>" id="copyright_text"
                                    name="copyright_text" required>
                            </div>

                            <div class="fpb-7 pt-2">
                                <button type="submit" class="btn-form"><?php echo e(get_phrase('Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="eSection-wrap">
        <div class="eMain">
            <div class="row">
                <div class="col-md-12 pb-3">
                    <p class="column-title"><?php echo e(get_phrase('Frontend Features')); ?></p>
                    <div class="eForm-file">
                        <div class="export-btn-area">
                            <div class="export-btn-area d-flex justify-content-md-end">
                                <a href="javascript:;" class="export_btn"
                                    onclick="rightModal('<?php echo e(route('superadmin.settings.frontendFeaturesCreate')); ?>', 'Create Frontend Features')"><i
                                        class="bi bi-plus"></i><?php echo e(get_phrase('Add Frontend Features')); ?></a>
                            </div>
                        </div>
                        <div class="row">

                            <?php $__currentLoopData = $frontendFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $frontendFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3">
                                
                                <div class="eCard" style="padding: 12px;">
                                    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
                                        action="<?php echo e(route('superadmin.system.frontFeaUpdate',['id' => $frontendFeature->id])); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-row">
                                            <div class="fpb-7">
                                                <label for="features_list_title"
                                                    class="eForm-label"><?php echo e(get_phrase('Features List Title')); ?></label>
                                                <input type="text" class="form-control eForm-control"
                                                    id="features_list_title" name="title"
                                                    value="<?php echo e($frontendFeature->title); ?>">
                                            </div>
                                            <div class="fpb-7">
                                                <label for="features_list_description"
                                                    class="eForm-label"><?php echo e(get_phrase('Short Description')); ?></label>
                                                <textarea class="form-control eForm-control"
                                                    id="features_list_description" name="description"
                                                    placeholder=""><?php echo e($frontendFeature->description); ?></textarea>
                                            </div>
                                            <div class="fpb-7">
                                                <label for="features_subtitle"
                                                    class="eForm-label"><?php echo e(get_phrase('Features List Image')); ?></label>
                                                <input type="text" name="icon"
                                                    class="eForm-control form-control icon-picker"
                                                    placeholder="<?php echo e(get_phrase('Features List Icon')); ?>"
                                                    value="<?php echo e($frontendFeature->icon); ?>">
                                            </div>
                                        </div>
                                        <div class="featuresBtn d-flex justify-content-between">
                                            <button type="submit" class="btn-form"
                                                style="margin-right: 10px;"><?php echo e(get_phrase('Update')); ?></button>
                                            <div class="btn-form" style="background-color:brown; ">
                                                <a style="color: #fff; display: flex;
                                                justify-content: center; padding-top: 6px; margin-left: 10px;"
                                                    href="javascript:;"
                                                    onclick="confirmModal('<?php echo e(route('superadmin.system.frontendFeaturesDlt', $frontendFeature['id'])); ?>', 'undefined');">Delete</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="eSection-wrap">
        <div class="eMain">
            <div class="row">
                <div class="col-md-12 pb-3">
                    <p class="column-title"><?php echo e(get_phrase('Website Logo')); ?></p>
                    <div class="eForm-file">
                        <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
                            action="<?php echo e(route('superadmin.system.update')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <label class="col-form-label"
                                        for="example-fileinput"><?php echo e(get_phrase('Frontend logo')); ?></label>
                                    <div class="eCard d-block text-center bg-light">
                                        <img src="<?php echo e(asset('assets/uploads/logo/'.get_settings('front_logo'))); ?>"
                                            class="mx-4 my-5" width="200px" alt="...">
                                        <div class="eCard-body">
                                            <input class="form-control eForm-control-file" id="formFileSm" type="file"
                                                name="front_logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-form"><?php echo e(get_phrase('Update Logo')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/settings/website_settings.blade.php ENDPATH**/ ?>