<?php

if ( ! function_exists( 'business_eye_home_about' ) ) :
    /**
     * About Section
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_home_about() {
        global $business_eye_home_about_bg;
        global $business_eye_customizer_all_values;
        $business_eye_home_about_button_text = $business_eye_customizer_all_values['business-eye-home-about-button-text'];
        $repeated_page = array('business-eye-about-pages-ids');
        $business_eye_home_about_single_words = absint( $business_eye_customizer_all_values['business-eye-home-about-single-words'] );
        $business_eye_home_about_posts = salient_customizer_get_repeated_all_value(1 , $repeated_page);
        $business_eye_home_about_posts_ids = array();
        foreach ($business_eye_home_about_posts as $business_eye_home_about_post) {
            if (0 != $business_eye_home_about_post['business-eye-about-pages-ids']) {
                $business_eye_home_about_posts_ids[] = $business_eye_home_about_post['business-eye-about-pages-ids'];
            }
            else {
                $business_eye_home_about_posts_ids[] = 2;
            }
        }
        if( !empty( $business_eye_home_about_posts_ids )){
            $business_eye_home_about_args = array(
                'post_type' => 'page',
                'post__in' => $business_eye_home_about_posts_ids,
                'orderby' => 'post__in'
            );
        }
        if( (1 != $business_eye_customizer_all_values['business-eye-home-about-enable'])){
            return;
        } ?>
        <section class="wrapper wrapper-info cm-pad">
            <div class="about-section">
                <div class="container">
                    <?php
                    if( !empty( $business_eye_home_about_args )){
                        $home_about_query = new WP_Query($business_eye_home_about_args);
                        while ($home_about_query->have_posts()): $home_about_query->the_post();
                            if(has_post_thumbnail()){
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                $url = $thumb['0'];
                            }
                            else{
                                $url = get_template_directory_uri().'/assets/img/no-image-570-370.png';
                            } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-inner salient-animate slideInLeft" data-wow-delay="0.5s">
                                        <h4><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h4>
                                        <p class="content-text">
                                            <?php
                                            if (has_excerpt()) {
                                                $business_eye_home_about_content_word_count = get_the_excerpt();
                                            }
                                            else {
                                                $business_eye_home_about_content_word_count = business_eye_words_count( $business_eye_home_about_single_words ,get_the_content());
                                            } ?>
                                            <?php echo wp_kses_post( $business_eye_home_about_content_word_count );?>
                                        </p>
                                        <?php
                                        $business_eye_home_about_button_text = $business_eye_customizer_all_values['business-eye-home-about-button-text'];
                                            if( !empty( $business_eye_home_about_button_text ) ){
                                                ?>
                                                <div class="btn-holder">
                                                    <a class="button" href="<?php the_permalink();?>">
                                                        <?php echo esc_html( $business_eye_home_about_button_text );?>
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                                <?php
                                            } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-img-wrap salient-animate slideInRight" data-wow-delay="0.8s">
                                        <img src="<?php echo esc_url( $url ); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php 
                        wp_reset_postdata();
                        endwhile;
                    }
                    ?>
                </div>
            </div>
        </section>
        <section><div class="sep-section"></div></section><!-- sep-section -->
        <?php
    }
endif;
add_action( 'business_eye_homepage', 'business_eye_home_about', 12 );

