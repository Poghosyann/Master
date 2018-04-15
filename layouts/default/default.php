<?php include_once 'layouts/default/inc/header.php';?>
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider">
            <div class="container p-0">
                <div class="row">
                    <!-- The carousel -->
                    <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#transition-timer-carousel" data-slide-to="1"></li>
                            <li data-target="#transition-timer-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive" src="/public/images/bg/1.jpg" />
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="/public/images/bg/2.jpg" />
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="/public/images/bg/3.jpg" />
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                        </a>
                        <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
                            <span class="glyphicon glyphicon-arrow-right"></span>
                        </a>
                        <!-- Timer "progress bar" -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider script -->
        <script>
            $(document).ready(function() {
            //Events that reset and restart the timer animation when the slides change
            $("#transition-timer-carousel").on("slide.bs.carousel", function(event) {
            //The animate class gets removed so that it jumps straight back to 0%
            $(".transition-timer-carousel-progress-bar", this)
            .removeClass("animate").css("width", "0%");
            }).on("slid.bs.carousel", function(event) {
            //The slide transition finished, so re-add the animate class so that
            //the timer bar takes time to fill up
            $(".transition-timer-carousel-progress-bar", this)
            .addClass("animate").css("width", "100%");
            });

            //Kick off the initial slide animation when the document is ready
            $(".transition-timer-carousel-progress-bar", "#transition-timer-carousel")
            .css("width", "100%");
            });
        </script>
        
        <div class="container pl-20 mt-100">
            <div class="row">
                <div class="col-md-7">
                    <p class="font-24 font-weight-400">
                        <?=$cnt->val['about']?>
                    </p>
                    <p class="font-15">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi, beatae culpa cumque dolores ea eaque esse fugiat id ipsa possimus praesentium quibusdam quod quos saepe sed tempora voluptate, voluptatum. Aliquam aperiam consectetur dignissimos eveniet explicabo facilis ipsa magnam, maxime natus nostrum omnis perferendis quisquam repellat rerum sit ullam voluptatibus! A alias aliquid explicabo harum illo nam optio unde, voluptate! Aliquam amet consequatur consequuntur cum cumque delectus deleniti eum ex expedita hic ipsa laudantium maiores nobis odit officiis quasi repudiandae tempora tenetur ullam unde velit veniam, veritatis voluptas. Aliquid architecto doloremque error facilis fugit iure, laudantium maxime nemo nostrum sequi.
                    </p>
                </div>
                <div class="col-md-5">
                    <iframe src="https://www.youtube.com/embed/48VIomsbsl0?fs=1&rel=0&showinfo=0" style="width:100%;height:255px;margin-top:0; border-radius: 5px;" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        <!-- Divider: Clients -->
        <div class="container section-title pl-20 mt-50 mb-20">
            <div>
                <h3><?=$cnt->val['our_partners_and_clients']?></h3>
            </div>
        </div>
        <section class="clients">
            <div class="container pb-20 pt-0">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section: Clients -->
                        <div class="owl-carousel-5col clients-logo transparent text-center">
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/1.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/2.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/3.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/4.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/5.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/public/images/partners/6.jpg" alt="img" style="max-width:unset;width:unset!important;max-height:unset;height:90px;opacity:1;" class="event_image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
<!--                            <style>.clients .owl-item{width:unset!important;}</style>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once 'layouts/default/inc/footer.php';?>
