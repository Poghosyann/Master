<?php include_once 'layouts/default/inc/header.php';?>

    <!-- Start main-content -->


        <div class="container mt-60 section-title mb-0 pl-20 pb-10 title">
            <div>
                <h3 class="numbers"><?=$cnt->val['contact']?></h3>
            </div>
        </div>

        <!-- Section: Contact -->
        <section class="container pl-20 mt-100 mb-100">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-6">
                        <form id="contact_form" name="contact_form" class="contact-form-transparent" action="#" method="post">
                            <div class="form-group">
                                <label><?=$cnt->val['name']?><small>*</small></label>
                                <input name="name" class="form-control" type="text" placeholder="<?=$cnt->val['name_phd']?>" required="">
                            </div>
                            <div class="form-group">
                                <label><?=$cnt->val['email']?><small>*</small></label>
                                <input name="email" class="form-control required email" type="email" placeholder="<?=$cnt->val['email_phd']?>">
                            </div>
                            <div class="form-group">
                                <label><?=$cnt->val['subject']?><small>*</small></label>
                                <input name="subject" class="form-control required" type="text" placeholder="<?=$cnt->val['subject_phd']?>">
                            </div>
                            <div class="form-group">
                                <label><?=$cnt->val['phone']?></label>
                                <input name="phone" class="form-control" type="text" placeholder="<?=$cnt->val['phone_phd']?>">
                            </div>
                            <div class="form-group">
                                <label><?=$cnt->val['message']?></label>
                                <textarea name="message" class="form-control required" rows="5" placeholder="<?=$cnt->val['message_phd']?>"></textarea>
                            </div>
                            <div class="form-group">
                                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit" class="contactbtn btn  btn-flat btn-block" data-loading-text="Please wait..."><?=$cnt->val['send']?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <section class="divider">
                                <div class="section-content">
                                    <div class="col-md-4">
                                        <div class="contact-info text-center">
                                            <h4><i class="fa fa-phone font-16 numbers"></i> <?=$cnt->val['phone']?></h4>
                                            <h6 class="text-gray">+374 98 123 456</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="contact-info text-center">
                                            <h4><i class="fa fa-map-marker font-16 numbers"></i> <?=$cnt->val['address']?></h4>
                                            <h6 class="text-gray">Nardos 109, Erevan, Armenia</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="contact-info text-center">
                                            <h4><i class="fa fa-envelope font-16 numbers"></i> <?=$cnt->val['email']?></h4>
                                            <h6 class="text-gray">info@show-master.am</h6>
                                        </div>
                                    </div>
                                </div>
                        </section>
                        <div class="our-expertist mt-20" id="map"></div>
                        <script src="https://maps.google.com/maps/api/js?key=AIzaSyBAWLif2-bXLYJvY7HuNtVJs9UAWj11I1c"></script>
                        <script src="/public/js/map.js?v=1"></script>
                        <style>#map{height: 390px; width: 100%; position: relative;}</style>
                    </div>
                </div>

                <!-- Contact Form Validation-->
                <script type="text/javascript">
                    $("#contact_form").validate({
                        submitHandler: function(form) {
                            var form_btn = $(form).find('button[type="submit"]');
                            var form_result_div = '#form-result';
                            $(form_result_div).remove();
                            form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                            var form_btn_old_msg = form_btn.html();
                            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                            $(form).ajaxSubmit({
                                dataType:  'json',
                                success: function(data) {
                                    if( data.status == 'true' ) {
                                        $(form).find('.form-control').val('');
                                    }
                                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                                    $(form_result_div).html(data.message).fadeIn('slow');
                                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                }
                            });
                        }
                    });
                </script>
            </div>
        </section>

<?php include_once 'layouts/default/inc/footer.php';?>