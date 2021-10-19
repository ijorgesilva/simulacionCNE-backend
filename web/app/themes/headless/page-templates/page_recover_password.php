<?php /* Template Name: Recover Password Page  */ ?>

<?php if (!defined('ABSPATH')) {  exit; // Exit if accessed directly  
    } ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <?php require(get_stylesheet_directory().'/page-templates/partials/header.php') ?>
  </head>
  
  <body class="recover-password-page">

        <!-- HEADER -->
        <div id="login-main-bar" class="et_section_regular">

            <div class="  et_pb_row_fullwidth">
                <div class="et_pb_css_mix_blend_mode_passthrough et-last-child">
                    <div class=" et_pb_image et_pb_image_0 et_always_center_on_mobile">
                        <a href="/">
                            <span class="et_pb_image_wrap ">
                                <img src="https://victoryassets.s3.us-east-2.amazonaws.com/public_resources/brand/logo/logo_black.svg" alt="" data-lazy-loaded="true" style="display: inline;">
                                <noscript><img src="https://victoryassets.s3.us-east-2.amazonaws.com/public_resources/brand/logo/logo_black.svg" alt="" /></noscript>
                            </span>
                        </a>
                    </div>
                </div> <!-- .et_pb_column -->
            </div> <!-- .et_pb_row -->

        </div>
        <!-- END HEADER -->

        <script>
            jQuery(document).ready(function($) {
                tab = $('.tabs h3 a');

                tab.on('click', function(event) {
                    event.preventDefault();
                    tab.removeClass('active');
                    $(this).addClass('active');

                    tab_content = $(this).attr('href');
                    $('div[id$="tab-content"]').removeClass('active');
                    $(tab_content).addClass('active');
                });
                
            });
        </script>

        <!-- SECTION TABS -->
        <div class="c-signup">
                                    
            <!-- New Form -->
            <div class="c-signup__form form-wrap">
            
                <?php $page = getArrValue($_GET,'page',""); ?>

                <div class="tabs">
                    <h3 class="recover-password"><a id="recover-password" class="active" href="#recover-password"></a></h3>
                </div>

                <!--.tabs-->
                <div class="tabs-content">

                    <!--.signup-tab-content-->
                    <div id="recover-password"  class='active'>
                        <h2>Recover your password</h2>
                        
                        <?php echo do_shortcode('[wppb-recover-password]'); ?>
                        <a href="/getstarted/?page=login">« Go back to login page</a>
                    </div>
                    <!--.login-tab-content-->
                </div>
                <!--.tabs-content-->
            </div>
            <!--.form-wrap-->
            <!-- End New Form -->
            
        </div>


        <!-- SECTION COPYRIGHTS -->
        <div id="login_footer" class="et_pb_section et_pb_section_2 et_section_regular">

            <div class="et_pb_row et_pb_row_2 et_pb_row_fullwidth">
                <div class="et_pb_column et_pb_column_4_4 et_pb_column_4 et_pb_css_mix_blend_mode_passthrough et-last-child">

                    <div class="et_pb_module et_pb_text et_pb_text_0 et_pb_bg_layout_light  et_pb_text_align_center">

                        <div class="et_pb_text_inner">
                            <p>Victory Church™. All rights reserved.</p>
                        </div>
                    </div>
                    <!-- .et_pb_text -->
                </div>
                <!-- .et_pb_column -->

            </div>
            <!-- .et_pb_row -->

        </div>
        <!-- END SECTION COPYRIGHTS -->

        <?php require(get_stylesheet_directory().'/page-templates/partials/footer.php'); ?>

    </body>

</html>