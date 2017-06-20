<?php

if ( ! function_exists( 'business_eye_home_callback_section' ) ) :
    /**
     * Callback
     *
     * @since business-eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_home_callback_section() {
        global $business_eye_customizer_all_values;
        if( 1 != $business_eye_customizer_all_values['business-eye-callback-enable'] ){
            return null;
        }
        $business_eye_home_callback_single_words = absint( $business_eye_customizer_all_values['business-eye-home-callback-single-words'] );
        $business_eye_home_callback_posts = absint($business_eye_customizer_all_values['business-eye-callback-page']);
        $business_eye_home_callback_button = esc_html($business_eye_customizer_all_values['business-eye-home-callback-button-text'] );
        $business_eye_home_callback_button_link = esc_url($business_eye_customizer_all_values['business-eye-home-callback-button-link'] );

    ?>
    <?php
    if( !empty( $business_eye_home_callback_posts )){
        $business_eye_feature_callback_args =    array(
            'post_type' => 'page',
            'p' => $business_eye_home_callback_posts,
            'posts_per_page' => 1

        );
        $business_eye_fature_section_post_query = new WP_Query( $business_eye_feature_callback_args );
        if ( $business_eye_fature_section_post_query->have_posts() ) :
        while ( $business_eye_fature_section_post_query->have_posts() ) : $business_eye_fature_section_post_query->the_post();
        if(has_post_thumbnail()){
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        }
        else{
            $thumb[0] = get_template_directory_uri() .'/assets/img/no-image-570-370.png';
        }
        ?>               
 
        <section class="wrapper-callback bannerbg parallax parallax-effect" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";>
            <div class="thumb-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <div class="callback-content cm-pad">
                                <h2><?php the_title(); ?></h2>
                                <div class="text-content">
                                    <?php
                                    if (has_excerpt()) {
                                        $business_eye_home_callback_content = get_the_excerpt();
                                    }
                                    else {
                                        $business_eye_home_callback_content = business_eye_words_count( $business_eye_home_callback_single_words ,get_the_content());
                                    } ?>
                                    <?php echo wp_kses_post($business_eye_home_callback_content); ?>
                                </div>
                                <?php if( 1 == $business_eye_customizer_all_values['business-eye-home-callback-remove-button'] ){ ?>
                                    <div class="btn-holder"><a href="<?php 
                                        if (empty($business_eye_home_callback_button_link)) {
                                            the_permalink();
                                        }
                                        else{
                                            echo esc_url($business_eye_home_callback_button_link);
                                        }
                                        ?>" class="button"> <?php echo '了解更多'/*esc_html($business_eye_home_callback_button);*/?></a>
                                    </div>
                                <?php } ?>
                            </div> <!-- callback-content -->  
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            wp_reset_postdata();
            endwhile;
        endif;
    }
}
endif;
add_action( 'business_eye_homepage', 'business_eye_home_callback_section', 40 );
