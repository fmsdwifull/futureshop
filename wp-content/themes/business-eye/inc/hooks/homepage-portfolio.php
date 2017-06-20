<?php

if ( ! function_exists( 'business_eye_portfolio' ) ) :
    /**
     * Portfolio Section
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_portfolio() {

        global $business_eye_customizer_all_values;

        $business_eye_home_portfolio_title = $business_eye_customizer_all_values['business-eye-home-portfolio-title'];
        $business_eye_home_portfolio_category = $business_eye_customizer_all_values['business-eye-home-portfolio-category'];
        $business_eye_home_portfolio_sub_title = $business_eye_customizer_all_values['business-eye-home-portfolio-sub-title'];
        $business_eye_home_portfolio_number = absint($business_eye_customizer_all_values['business-eye-home-portfolio-number']);        
        $business_eye_home_portfolio_button_text = $business_eye_customizer_all_values['business-eye-home-portfolio-button-text'];
        $business_eye_home_portfolio_button_link = $business_eye_customizer_all_values['business-eye-home-portfolio-button-link'];
        if( 1 != $business_eye_customizer_all_values['business-eye-home-portfolio-enable'] ){
            return null;
        }
        ?>
        <section class="wrapper wrap-portfolio cm-pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3><?php echo esc_html( $business_eye_home_portfolio_title );?></h2>
                            <span class="title-divider"></span>
                            <span><?php echo esc_html( $business_eye_home_portfolio_sub_title );?></span>
                        </div>

                        <div id='port-gallery' class="grid">
                            <?php
                            $business_eye_home_portfolio_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => $business_eye_home_portfolio_number,
                                'cat'           => $business_eye_home_portfolio_category,
                            );
                            $business_eye_home_portfolio_query = new WP_Query($business_eye_home_portfolio_args);
                            if ($business_eye_home_portfolio_query->have_posts()) :
                                while ($business_eye_home_portfolio_query->have_posts()) : $business_eye_home_portfolio_query->the_post();
                                    if(has_post_thumbnail()){
                                        $thumbs = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                        $urls = $thumbs['0'];
                                    }
                                    else{
                                        $urls = get_template_directory_uri().'/assets/img/no-image.jpg';
                                    } ?>
                                        <div class="element-item salient-animate fadeInUp" data-wow-delay="0.5s">
                                            <div class="portf-thumb-holder">
                                                <figure>  
                                                    <img src="<?php echo esc_url( $urls ); ?>">
                                                </figure>
                                                <div class="portf-thumb-hover">
                                                    <div class="portf-inner-content">
                                                        <h3 class="portf-thumb-title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h3>
                                                        <a class="popup-open" href="<?php echo esc_url( $urls ); ?>">
                                                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                        </a>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                     wp_reset_postdata(); ?>
                                <?php endwhile; 
                                endif;
                                ?>
                        </div>
                    </div>
                </div>
            </div>
           
                <?php
                    if( !empty ( $business_eye_home_portfolio_button_text ) ){
                        ?>
                        <div class="clear"></div>
                        <div class="btn-container">
                            <a class="button-outline" href="<?php echo esc_url( $business_eye_home_portfolio_button_link );?>">
                                <?php echo esc_html( $business_eye_home_portfolio_button_text );?>
                            </a>
                        </div>
                        <?php
                    }
                ?>
        </section>
        <?php
    }
endif;
add_action( 'business_eye_homepage', 'business_eye_portfolio', 20 );