

<?php $__env->startSection('content'); ?>

<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Payment settings')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Settings')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Payment settings')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3><?php echo e(get_phrase('Global Currency')); ?></h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->

                                <div class="fpb-7">
                                    <label for="global_currency" class="eForm-label"><?php echo e(get_phrase('Global Currency')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" id = "global_currency" name="global_currency" required>
                                        <option value=""><?php echo e(get_phrase('Select system currency')); ?></option>
                                        <?php
                                        foreach ($currencies as $currency):?>
                                        <option value="<?php echo e($currency['code']); ?>"
                                          <?php echo e($global_currency == $currency['code'] ? 'selected':''); ?>> <?php echo e($currency['code']); ?>

                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="currency_position" class="eForm-label"><?php echo e(get_phrase('Currency Position')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove"  id = "currency_position" name="currency_position" required>
                                        <option value="left" <?php echo e($global_currency_position == 'left' ? 'selected':''); ?> ><?php echo e(get_phrase('Left')); ?></option>
                                        <option value="right" <?php echo e($global_currency_position == 'right' ? 'selected':''); ?> ><?php echo e(get_phrase('Right')); ?></option>
                                        <option value="left-space" <?php echo e($global_currency_position == 'left-space' ? 'selected':''); ?> ><?php echo e(get_phrase('Left with a space')); ?></option>
                                        <option value="right-space" <?php echo e($global_currency_position == 'right-space' ? 'selected':''); ?> ><?php echo e(get_phrase('Right with a space')); ?></option>
                                      </select>
                                </div>

                                <input type="hidden" id="method" name="method" value="currency">


                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update Currency')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3><?php echo e(get_phrase('Offline Payment Instruction')); ?></h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('superadmin.system.update')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="fpb-7">
                                    <label for="system_title" class="eForm-label"><?php echo e(get_phrase('Offline Payment Instruction')); ?></label>
                                    <textarea class="form-control eForm-control" id="off_pay_ins_text" name = "off_pay_ins_text"><?php echo e(get_settings('off_pay_ins_text')); ?></textarea>
                                </div> 
                                <div class="fpb-7">
                                    <label class="eForm-label" for="example-fileinput"><?php echo e(get_phrase('Offline Payment Instruction Image/PDF')); ?></label>
                                    <input class="form-control eForm-control-file" id="formFileSm" type="file" name="off_pay_ins_file">
                                </div>
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


<?php if(addon_status('payment_gateways')==1): ?>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3>
                    <?php echo e(get_phrase('Paypal settings')); ?>

                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                </h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status">
                                        <option value="1" <?php echo e($paypal['status'] == 1 ? 'selected':''); ?>><?php echo e(get_phrase('Yes') ); ?></option>
                                        <option value="0" <?php echo e($paypal['status'] == 0 ? 'selected':''); ?>><?php echo e(get_phrase('No') ); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode">
                                        <option value="live" <?php echo e($paypal['mode'] == 'live' ? 'selected':''); ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php echo e($paypal['mode'] == 'test' ? 'selected':''); ?>><?php echo e(get_phrase('Sandbox')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_client_id" class="eForm-label"><?php echo e(get_phrase('Client ID (Sandbox)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_client_id" name = "test_client_id" placeholder="Sandbox Client Id" value="<?php echo e($paypal['test_client_id']); ?>" aria-label="Sandbox Client Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Client Secrect (Sandbox)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Sandbox Secrect Id" value="<?php echo e($paypal['test_secret_key']); ?>" aria-label="Sandbox Secrect Id" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_client_id" class="eForm-label"><?php echo e(get_phrase('Client ID (Live)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_client_id" name = "live_client_id" placeholder="Live Client Id" value="<?php echo e($paypal['live_client_id']); ?>" aria-label="Live Client Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_secret_key" class="eForm-label"><?php echo e(get_phrase('Client Secrect (Live)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_secret_key" name = "live_secret_key" placeholder="Live Secrect Id" value="<?php echo e($paypal['live_secret_key']); ?>" aria-label="Live Secrect Id" required>
                                </div>



                                <input type="hidden" id="method" name="method" value="paypal">


                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update Paypal')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3>
                    <?php echo e(get_phrase('Stripe settings')); ?>

                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                </h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status">
                                        <option value="1" <?php echo e($stripe['status'] == 1 ? 'selected':''); ?>><?php echo e(get_phrase('Yes') ); ?></option>
                                        <option value="0" <?php echo e($stripe['status'] == 0 ? 'selected':''); ?>><?php echo e(get_phrase('No') ); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode">
                                        <option value="live" <?php echo e($stripe['mode'] == 'live' ? 'selected':''); ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php echo e($stripe['mode'] == 'test' ? 'selected':''); ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_key" class="eForm-label"><?php echo e(get_phrase('Test Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($stripe['test_key']); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Sectect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Sectect Key" value="<?php echo e($stripe['test_secret_key']); ?>" aria-label="Test Sectect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="public_live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="public_live_key" name = "public_live_key" placeholder="Live Public Key" value="<?php echo e($stripe['public_live_key']); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="secret_live_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="secret_live_key" name = "secret_live_key" placeholder="Live Secrect Key" value="<?php echo e($stripe['secret_live_key']); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="stripe">




                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update Stripe ')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3>
                    <?php echo e(get_phrase('Razorpay settings')); ?>

                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                </h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status">
                                        <option value="1" <?php echo e($razorpay['status'] == 1 ? 'selected':''); ?>><?php echo e(get_phrase('Yes') ); ?></option>
                                        <option value="0" <?php echo e($razorpay['status'] == 0 ? 'selected':''); ?>><?php echo e(get_phrase('No') ); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode">
                                        <option value="live" <?php echo e($razorpay['mode'] == 'live' ? 'selected':''); ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php echo e($razorpay['mode'] == 'test' ? 'selected':''); ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_key" class="eForm-label"><?php echo e(get_phrase('Test Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($razorpay['test_key']); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Sectect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Sectect Key" value="<?php echo e($razorpay['test_secret_key']); ?>" aria-label="Test Sectect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_key" name = "live_key" placeholder="Live Public Key" value="<?php echo e($razorpay['live_key']); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_secret_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_secret_key" name = "live_secret_key" placeholder="Live Secrect Key" value="<?php echo e($razorpay['live_secret_key']); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="theme_color" class="eForm-label"><?php echo e(get_phrase('Theme Color')); ?></label>
                                    <input type="color" class="form-control eForm-control" id="theme_color" name = "theme_color" placeholder="Live Secrect Key" value="<?php echo e($razorpay['theme_color']); ?>" aria-label="Live Secrect Key" required>
                                </div>


                                <input type="hidden" id="method" name="method" value="razorpay">


                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update razorpay ')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3>
                    <?php echo e(get_phrase('Paytm settings')); ?>

                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                </h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status">
                                        <option value="1" <?php echo e($paytm['status'] == 1 ? 'selected':''); ?>><?php echo e(get_phrase('Yes') ); ?></option>
                                        <option value="0" <?php echo e($paytm['status'] == 0 ? 'selected':''); ?>><?php echo e(get_phrase('No') ); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode">
                                        <option value="live" <?php echo e($paytm['mode'] == 'live' ? 'selected':''); ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php echo e($paytm['mode'] == 'test' ? 'selected':''); ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_merchant_id" class="eForm-label"><?php echo e(get_phrase('Test Merchant Id')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_merchant_id" name = "test_merchant_id" placeholder="Test Merchant Id" value="<?php echo e($paytm['test_merchant_id']); ?>" aria-label="Test Merchant Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_merchant_key" class="eForm-label"><?php echo e(get_phrase('Test Merchant Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_merchant_key" name = "test_merchant_key" placeholder="Test Merchant Key" value="<?php echo e($paytm['test_merchant_key']); ?>" aria-label="Test Merchant Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_merchant_id" class="eForm-label"><?php echo e(get_phrase('Live Merchant Id')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_merchant_id" name = "live_merchant_id" placeholder="Live Merchant Id" value="<?php echo e($paytm['live_merchant_id']); ?>" aria-label="Live Merchant Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_merchant_key" class="eForm-label"><?php echo e(get_phrase('Live Merchant Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_merchant_key" name = "live_merchant_key" placeholder="Live Merchant Key" value="<?php echo e($paytm['live_merchant_key']); ?>" aria-label="Live Merchant Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="environment" class="eForm-label"><?php echo e(get_phrase('Environment')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="environment" name = "environment" placeholder="Environment" value="<?php echo e($paytm['environment']); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="merchant_website" class="eForm-label"><?php echo e(get_phrase('Merchant_Website')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="merchant_website" name = "merchant_website" placeholder="merchant_website" value="<?php echo e($paytm['merchant_website']); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="industry_type" class="eForm-label"><?php echo e(get_phrase('Channel')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="channel" name = "channel" placeholder="channel" value="<?php echo e($paytm['channel']); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="industry_type" class="eForm-label"><?php echo e(get_phrase('industry_type')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="industry_type" name = "industry_type" placeholder="industry_type" value="<?php echo e($paytm['industry_type']); ?>" aria-label="Environment" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="paytm">




                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update Paytm ')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3>
                    <?php echo e(get_phrase('Flutterwave settings')); ?>

                    <!-- <span class="badge bg-success m-1" style=""><?php echo e(get_phrase('Addon')); ?></span> -->
                </h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 flutterwave-settings-form" action="<?php echo e(route('superadmin.update_payment_settings')); ?>" id="flutterwave-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status" id="status">
                                        <option value="1" <?php if ($flutterwave['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('yes')); ?></option>
                                        <option value="0" <?php if ($flutterwave['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('no')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode" id="mode">
                                        <option value="live" <?php if ($flutterwave['mode'] == 'live'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php if ($flutterwave['mode'] == 'test'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_key" class="eForm-label"><?php echo e(get_phrase('Test Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($flutterwave['test_key']); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Secrect Key" value="<?php echo e($flutterwave['test_secret_key']); ?>" aria-label="Test Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_encryption_key" class="eForm-label"><?php echo e(get_phrase('Test Encryption Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_encryption_key" name = "test_encryption_key" placeholder="Test Encryption Key" value="<?php echo e($flutterwave['test_encryption_key']); ?>" aria-label="Test Encryption Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="public_live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="public_live_key" name = "public_live_key" placeholder="Live Public Key" value="<?php echo e($flutterwave['public_live_key']); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="secret_live_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="secret_live_key" name = "secret_live_key" placeholder="Live Secrect Key" value="<?php echo e($flutterwave['secret_live_key']); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="encryption_live_key" class="eForm-label"><?php echo e(get_phrase('Live Encryption Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="encryption_live_key" name = "encryption_live_key" placeholder="Live Encryption Key" value="<?php echo e($flutterwave['encryption_live_key']); ?>" aria-label="Live Encryption Key" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="flutterwave">


                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form" onclick=""><?php echo e(get_phrase('Update')); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/superadmin/payment_credentials/payment_settings.blade.php ENDPATH**/ ?>