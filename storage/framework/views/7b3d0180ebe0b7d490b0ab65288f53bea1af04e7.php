

<?php $__env->startSection('content'); ?>

<?php

  $school_details = App\Models\School::where('id', auth()->user()->school_id)->first(); 

?>

<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo e(get_phrase('Payment settings')); ?></h4>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="title">
                <h3><?php echo e(get_phrase('School Currency')); ?></h3>
            </div>
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="school_currency" class="eForm-label"><?php echo e(get_phrase('School Currency')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" id = "school_currency" name="school_currency" required>
                                        <option value=""><?php echo e(get_phrase('select system currency')); ?></option>
                                        <?php
                                        foreach ($currencies as $currency):?>
                                        <option value="<?php echo e($currency['code']); ?>"
                                          <?php echo e($school_currency['school_currency'] == $currency['code'] ? 'selected':''); ?>> <?php echo e($currency['code']); ?>

                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="currency_position" class="eForm-label"><?php echo e(get_phrase('Currency Position')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove"  id = "currency_position" name="currency_position" required>
                                        <option value="left" <?php echo e($school_currency['currency_position'] == 'left' ? 'selected':''); ?> ><?php echo e(get_phrase('left')); ?></option>
                                        <option value="right" <?php echo e($school_currency['currency_position'] == 'right' ? 'selected':''); ?> ><?php echo e(get_phrase('right')); ?></option>
                                        <option value="left-space" <?php echo e($school_currency['currency_position'] == 'left-space' ? 'selected':''); ?> ><?php echo e(get_phrase('left with a space')); ?></option>
                                        <option value="right-space" <?php echo e($school_currency['currency_position'] == 'right-space' ? 'selected':''); ?> ><?php echo e(get_phrase('right with a space')); ?></option>
                                      </select>
                                </div>

                                <input type="hidden" id="method" name="method" value="currency">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($school_currency['id']); ?>">

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
                            <form method="POST" enctype="multipart/form-data" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="system_title" class="eForm-label"><?php echo e(get_phrase('Offline Payment Instruction')); ?></label>
                                    <textarea class="form-control eForm-control" id="off_pay_ins_text" name = "off_pay_ins_text"><?php echo e($school_details->off_pay_ins_text); ?></textarea>
                                </div>

                                <div class="fpb-7">
                                    <label class="eForm-label" for="example-fileinput"><?php echo e(get_phrase('Offline Payment Instruction Image/PDF')); ?></label>
                                    <input class="form-control eForm-control-file" id="formFileSm" type="file" name="off_pay_ins_file">
                                </div>

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
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status" id="status">
                                        <option value="1" <?php if ($paypal['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('yes')); ?></option>
                                        <option value="0" <?php if ($paypal['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('no')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode" id="mode">
                                        <option value="live" <?php if ($paypal['mode'] == 'live'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php if ($paypal['mode'] == 'test'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Sandbox')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_client_id" class="eForm-label"><?php echo e(get_phrase('Client ID (Sandbox)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_client_id" name = "test_client_id" placeholder="Sandbox Client Id" value="<?php echo e($paypal_keys->test_client_id); ?>" aria-label="Sandbox Client Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Client Secrect (Sandbox)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Sandbox Secrect Id" value="<?php echo e($paypal_keys->test_secret_key); ?>" aria-label="Sandbox Secrect Id" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_client_id" class="eForm-label"><?php echo e(get_phrase('Client ID (Live)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_client_id" name = "live_client_id" placeholder="Live Client Id" value="<?php echo e($paypal_keys->live_client_id); ?>" aria-label="Live Client Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_secret_key" class="eForm-label"><?php echo e(get_phrase('Client Secrect (Live)')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_secret_key" name = "live_secret_key" placeholder="Live Secrect Id" value="<?php echo e($paypal_keys->live_secret_key); ?>" aria-label="Live Secrect Id" required>
                                </div>



                                <input type="hidden" id="method" name="method" value="paypal">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($paypal['id']); ?>">

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
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status" id="status">
                                        <option value="1" <?php if ($stripe['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('yes')); ?></option>
                                        <option value="0" <?php if ($stripe['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('no')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode" id="mode">
                                        <option value="live" <?php if ($stripe['mode'] == 'live'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php if ($stripe['mode'] == 'test'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_key" class="eForm-label"><?php echo e(get_phrase('Test Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($stripe_keys->test_key); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Secrect Key" value="<?php echo e($stripe_keys->test_secret_key); ?>" aria-label="Test Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="public_live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="public_live_key" name = "public_live_key" placeholder="Live Public Key" value="<?php echo e($stripe_keys->public_live_key); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="secret_live_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="secret_live_key" name = "secret_live_key" placeholder="Live Secrect Key" value="<?php echo e($stripe_keys->secret_live_key); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="stripe">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($stripe['id']); ?>">



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
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status" id="status">
                                        <option value="1" <?php if ($razorpay['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('yes')); ?></option>
                                        <option value="0" <?php if ($razorpay['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('no')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode" id="mode">
                                        <option value="live" <?php if ($razorpay['mode'] == 'live'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php if ($razorpay['mode'] == 'test'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_key" class="eForm-label"><?php echo e(get_phrase('Test Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($razorpay_keys->test_key); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Secrect Key" value="<?php echo e($razorpay_keys->test_secret_key); ?>" aria-label="Test Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_key" name = "live_key" placeholder="Live Public Key" value="<?php echo e($razorpay_keys->live_key); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_secret_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_secret_key" name = "live_secret_key" placeholder="Live Secrect Key" value="<?php echo e($razorpay_keys->live_secret_key); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="theme_color" class="eForm-label"><?php echo e(get_phrase('Theme Color')); ?></label>
                                    <input type="color" class="form-control eForm-control" id="theme_color" name = "theme_color" placeholder="Live Secrect Key" value="<?php echo e($razorpay_keys->theme_color); ?>" aria-label="Live Secrect Key" required>
                                </div>


                                <input type="hidden" id="method" name="method" value="razorpay">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($razorpay['id']); ?>">

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
                            <form method="POST" class="col-12 live-class-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="live-class-settings-form">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="status" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="status" id="status">
                                        <option value="1" <?php if ($paytm['status'] == 1): ?> selected <?php endif; ?>><?php echo e(get_phrase('yes')); ?></option>
                                        <option value="0" <?php if ($paytm['status'] == 0): ?> selected <?php endif; ?>><?php echo e(get_phrase('no')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="mode" class="eForm-label"><?php echo e(get_phrase('Active')); ?></label>
                                    <select class="form-select eForm-select eChoice-multiple-with-remove" name="mode" id="mode">
                                        <option value="live" <?php if ($paytm['mode'] == 'live'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Live')); ?></option>
                                        <option value="test" <?php if ($paytm['mode'] == 'test'): ?> selected <?php endif; ?>><?php echo e(get_phrase('Test')); ?></option>
                                      </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_merchant_id" class="eForm-label"><?php echo e(get_phrase('Test Merchant Id')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_merchant_id" name = "test_merchant_id" placeholder="Test Merchant Id" value="<?php echo e($paytm_keys->test_merchant_id); ?>" aria-label="Test Merchant Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_merchant_key" class="eForm-label"><?php echo e(get_phrase('Test Merchant Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_merchant_key" name = "test_merchant_key" placeholder="Test Merchant Key" value="<?php echo e($paytm_keys->test_merchant_key); ?>" aria-label="Test Merchant Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="live_merchant_id" class="eForm-label"><?php echo e(get_phrase('Live Merchant Id')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_merchant_id" name = "live_merchant_id" placeholder="Live Merchant Id" value="<?php echo e($paytm_keys->live_merchant_id); ?>" aria-label="Live Merchant Id" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="live_merchant_key" class="eForm-label"><?php echo e(get_phrase('Live Merchant Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="live_merchant_key" name = "live_merchant_key" placeholder="Live Merchant Key" value="<?php echo e($paytm_keys->live_merchant_key); ?>" aria-label="Live Merchant Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="environment" class="eForm-label"><?php echo e(get_phrase('Environment')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="environment" name = "environment" placeholder="Environment" value="<?php echo e($paytm_keys->environment); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="merchant_website" class="eForm-label"><?php echo e(get_phrase('Merchant_Website')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="merchant_website" name = "merchant_website" placeholder="merchant_website" value="<?php echo e($paytm_keys->merchant_website); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="industry_type" class="eForm-label"><?php echo e(get_phrase('Channel')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="channel" name = "channel" placeholder="channel" value="<?php echo e($paytm_keys->channel); ?>" aria-label="Environment" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="industry_type" class="eForm-label"><?php echo e(get_phrase('industry_type')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="industry_type" name = "industry_type" placeholder="industry_type" value="<?php echo e($paytm_keys->industry_type); ?>" aria-label="Environment" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="paytm">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($paytm['id']); ?>">



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
                            <form method="POST" class="col-12 flutterwave-settings-form" action="<?php echo e(route('admin.settings.payment_post')); ?>" id="flutterwave-settings-form">
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
                                    <input type="text" class="form-control eForm-control" id="test_key" name = "test_key" placeholder="Test Public Key" value="<?php echo e($flutterwave_keys->test_key); ?>" aria-label="Test Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="test_secret_key" class="eForm-label"><?php echo e(get_phrase('Test Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_secret_key" name = "test_secret_key" placeholder="Test Secrect Key" value="<?php echo e($flutterwave_keys->test_secret_key); ?>" aria-label="Test Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="test_encryption_key" class="eForm-label"><?php echo e(get_phrase('Test Encryption Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="test_encryption_key" name = "test_encryption_key" placeholder="Test Encryption Key" value="<?php echo e($flutterwave_keys->test_encryption_key); ?>" aria-label="Test Encryption Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="public_live_key" class="eForm-label"><?php echo e(get_phrase('Live Public Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="public_live_key" name = "public_live_key" placeholder="Live Public Key" value="<?php echo e($flutterwave_keys->public_live_key); ?>" aria-label="Live Public Key" required>
                                </div>


                                <div class="fpb-7">
                                    <label for="secret_live_key" class="eForm-label"><?php echo e(get_phrase('Live Secrect Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="secret_live_key" name = "secret_live_key" placeholder="Live Secrect Key" value="<?php echo e($flutterwave_keys->secret_live_key); ?>" aria-label="Live Secrect Key" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="encryption_live_key" class="eForm-label"><?php echo e(get_phrase('Live Encryption Key')); ?></label>
                                    <input type="text" class="form-control eForm-control" id="encryption_live_key" name = "encryption_live_key" placeholder="Live Encryption Key" value="<?php echo e($flutterwave_keys->encryption_live_key); ?>" aria-label="Live Encryption Key" required>
                                </div>

                                <input type="hidden" id="method" name="method" value="flutterwave">
                                <input type="hidden" id="update_id" name="update_id" value="<?php echo e($flutterwave['id']); ?>">



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

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/payment_settings/key_settings.blade.php ENDPATH**/ ?>