<?php
if ( ! function_exists( 'business_eye_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function business_eye_before_footer() {
    ?>
    </div>
    </div><!-- #content -->
        <!-- *****************************************
             Footer section starts
    ****************************************** -->
    <footer id="colophon" class="wrapper site-footer" role="contentinfo">
    <?php
    }
endif;
add_action( 'business_eye_action_before_footer', 'business_eye_before_footer', 10 );

if ( ! function_exists( 'business_eye_footer' ) ) :
    /**
     * Footer content
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_footer() {
        global $business_eye_customizer_all_values;
        ?>
        <section class="footer-section-btm">
            <div class="container">
                <div class="site-info">
                    <?php
                    if(isset($business_eye_customizer_all_values['business-eye-copyright-text'])){
                        echo wp_kses_post( $business_eye_customizer_all_values['business-eye-copyright-text'] );
                    }
                    ?>
                    <span class="sep"> | </span>
         <?php /* printf( esc_html__( 'Theme: %1$s by %2$s', 'business-eye' ), 'woodcarver', '<a href="http://salientthemes.com/" target = "_blank" rel="designer">salientThemes </a>'i );*/ echo '2017 woodcarver' ?>    
                </div>
            </div>
        </section>

    </footer><!-- #colophon -->
    <!-- *****************************************
             Footer section ends
    ****************************************** -->
    <?php
    }
endif;
add_action( 'business_eye_action_footer', 'business_eye_footer', 10 );

if ( ! function_exists( 'business_eye_page_end' ) ) :
    /**
     * Page end
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_page_end() {
    global $business_eye_customizer_all_values;
        ?>
        </div><!-- #page -->
    <?php
     if( isset( $business_eye_customizer_all_values['business-eye-enable-back-to-top'] )  && 1 == $business_eye_customizer_all_values['business-eye-enable-back-to-top']) {
        ?>
            <a id="gotop" class="back-tonav" href="#page"><i class="fa fa-angle-up"></i></a>
        <?php
        }
    }
endif;
add_action( 'business_eye_action_after', 'business_eye_page_end', 10 );
