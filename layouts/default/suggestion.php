<?php include_once 'layouts/default/inc/header.php';?>

    <div class="container mt-60 section-title mb-0 pl-20 pb-10 title">
        <div>
            <h3 class="numbers"><?=$cnt->val['suggestion']?></h3>
        </div>
    </div>

    <div class="container mt-70">
        <div class="row">
            <div id="accordion">
                <h3 class="sectiondropdown numbers font-18 font-weight-400">Suggestion title name<i class="fa fa-caret-down font-25" aria-hidden="true"></i></h3>
                <div style="height: 100% !important;">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi asperiores commodi cupiditate deserunt eius eos impedit in minima minus molestiae, mollitia nihil nobis officia quasi quibusdam recusandae sequi ullam voluptas. Ab commodi consequatur, deleniti ea, expedita laboriosam laborum maxime nihil, quas sint suscipit unde. Asperiores esse fugiat minus pariatur possimus quae, quo repudiandae sed temporibus vel? Ad animi aperiam aut debitis dicta doloribus dolorum ea enim eveniet necessitatibus nesciunt nobis, odio pariatur rem repudiandae, sapiente sint velit voluptatem. Aliquam commodi, delectus distinctio error eveniet fugiat, id mollitia quam rerum sit velit voluptates! Ea id iste vel veniam voluptatibus.
                    </p>
                </div>
                <h3 class="sectiondropdown mt-20 numbers font-18 font-weight-400">Suggestion title name<i class="fa fa-caret-down font-25" aria-hidden="true"></i></h3>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi asperiores commodi cupiditate deserunt eius eos impedit in minima minus molestiae, mollitia nihil nobis officia quasi quibusdam recusandae sequi ullam voluptas. Ab commodi consequatur, deleniti ea, expedita laboriosam laborum maxime nihil, quas sint suscipit unde. Asperiores esse fugiat minus pariatur possimus quae, quo repudiandae sed temporibus vel? Ad animi aperiam aut debitis dicta doloribus dolorum ea enim eveniet necessitatibus nesciunt nobis, odio pariatur rem repudiandae, sapiente sint velit voluptatem. Aliquam commodi, delectus distinctio error eveniet fugiat, id mollitia quam rerum sit velit voluptates! Ea id iste vel veniam voluptatibus.
                    </p>
                </div>
                <h3 class="sectiondropdown mt-20 numbers font-18 font-weight-400">Suggestion title name<i class="fa fa-caret-down font-25" aria-hidden="true"></i></h3>
                <div style="height: 100% !important;">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi asperiores commodi cupiditate deserunt eius eos impedit in minima minus molestiae, mollitia nihil nobis officia quasi quibusdam recusandae sequi ullam voluptas. Ab commodi consequatur, deleniti ea, expedita laboriosam laborum maxime nihil, quas sint suscipit unde. Asperiores esse fugiat minus pariatur possimus quae, quo repudiandae sed temporibus vel? Ad animi aperiam aut debitis dicta doloribus dolorum ea enim eveniet necessitatibus nesciunt nobis, odio pariatur rem repudiandae, sapiente sint velit voluptatem. Aliquam commodi, delectus distinctio error eveniet fugiat, id mollitia quam rerum sit velit voluptates! Ea id iste vel veniam voluptatibus.
                    </p>
                </div>
                <h3 class="sectiondropdown mt-20 numbers font-18 font-weight-400">Suggestion title name<i class="fa fa-caret-down font-25" aria-hidden="true"></i></h3>
                <div style="height: 100% !important;">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi asperiores commodi cupiditate deserunt eius eos impedit in minima minus molestiae, mollitia nihil nobis officia quasi quibusdam recusandae sequi ullam voluptas. Ab commodi consequatur, deleniti ea, expedita laboriosam laborum maxime nihil, quas sint suscipit unde. Asperiores esse fugiat minus pariatur possimus quae, quo repudiandae sed temporibus vel? Ad animi aperiam aut debitis dicta doloribus dolorum ea enim eveniet necessitatibus nesciunt nobis, odio pariatur rem repudiandae, sapiente sint velit voluptatem. Aliquam commodi, delectus distinctio error eveniet fugiat, id mollitia quam rerum sit velit voluptates! Ea id iste vel veniam voluptatibus.
                    </p>
                </div>
                <h3 class="sectiondropdown mt-20 numbers font-18 font-weight-400">Suggestion title name<i class="fa fa-caret-down font-25" aria-hidden="true"></i></h3>
                <div style="height: 100% !important;">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi asperiores commodi cupiditate deserunt eius eos impedit in minima minus molestiae, mollitia nihil nobis officia quasi quibusdam recusandae sequi ullam voluptas. Ab commodi consequatur, deleniti ea, expedita laboriosam laborum maxime nihil, quas sint suscipit unde. Asperiores esse fugiat minus pariatur possimus quae, quo repudiandae sed temporibus vel? Ad animi aperiam aut debitis dicta doloribus dolorum ea enim eveniet necessitatibus nesciunt nobis, odio pariatur rem repudiandae, sapiente sint velit voluptatem. Aliquam commodi, delectus distinctio error eveniet fugiat, id mollitia quam rerum sit velit voluptates! Ea id iste vel veniam voluptatibus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery( function() {
            jQuery( "#accordion" ).accordion({ header: "h3", collapsible: true, active: false, heightStyle: "content", autoHeight: false });
        } );
        jQuery('.sectiondropdown').click(function() {
            jQuery("i", this).toggleClass("fa-caret-up fa-caret-down");
        });
    </script>

<?php include_once 'layouts/default/inc/footer.php';?>