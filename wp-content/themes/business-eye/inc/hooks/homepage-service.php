<?php
if ( ! function_exists( 'business_eye_home_service_array' ) ) :
    /**
     * Service Section array creation
     *
     * @since business-eye 1.0.0
     *
     * @param string $from_service
     * @return array
     */
    function business_eye_home_service_array( $from_service ){
        global $business_eye_customizer_all_values;
        $business_eye_home_service_number = absint($business_eye_customizer_all_values['business-eye-home-service-number']);
        $business_eye_home_service_single_words = absint($business_eye_customizer_all_values['business-eye-home-service-single-words']);

        $business_eye_home_service_contents_array = array();
        $business_eye_icons_array = array('business-eye-home-service-page-icon');
        $business_eye_home_service_page = array('business-eye-home-service-pages-ids');

        $business_eye_icons_arrays = salient_customizer_get_repeated_all_value(3 , $business_eye_icons_array);

        if ( 'from-category' ==  $from_service ){
            $business_eye_home_service_category = $business_eye_customizer_all_values['business-eye-home-service-category'];
            if( 0 != $business_eye_home_service_category ){
                $business_eye_home_service_args =    array(
                    'post_type' => 'post',
                    'cat' => $business_eye_home_service_category,
                    'posts_per_page' => $business_eye_home_service_number
                );
            }
        }else {
                $business_eye_home_service_posts = salient_customizer_get_repeated_all_value(3 , $business_eye_home_service_page);
                $business_eye_home_service_posts_ids = array();
                if( null != $business_eye_home_service_posts ) {
                    foreach( $business_eye_home_service_posts as $business_eye_home_service_post ) {
                        if( 0 != $business_eye_home_service_post['business-eye-home-service-pages-ids'] ){
                            $business_eye_home_service_posts_ids[] = $business_eye_home_service_post['business-eye-home-service-pages-ids'];
                        }
                    }
                    if( !empty( $business_eye_home_service_posts_ids )){
                        $business_eye_home_service_args =    array(
                            'post_type' => 'page',
                            'post__in' => $business_eye_home_service_posts_ids,
                            'posts_per_page' => $business_eye_home_service_number,
                            'orderby' => 'post__in'
                        );
                    }
                }
            }
        // the query
        if( !empty( $business_eye_home_service_args )){

            $business_eye_home_service_contents_array = array(); /*again empty array*/
            $business_eye_home_service_post_query = new WP_Query( $business_eye_home_service_args );
            if ( $business_eye_home_service_post_query->have_posts() ) :
                $i = 1;
                while ( $business_eye_home_service_post_query->have_posts() ) : $business_eye_home_service_post_query->the_post();
                    $business_eye_home_service_contents_array[$i]['business-eye-home-service-title'] = get_the_title();
                    if (has_excerpt()) {
                        $business_eye_home_service_contents_array[$i]['business-eye-home-service-content'] = get_the_excerpt();
                    }
                    else {
                        $business_eye_home_service_contents_array[$i]['business-eye-home-service-content'] = business_eye_words_count( $business_eye_home_service_single_words ,get_the_content());
                    }
                    $business_eye_home_service_contents_array[$i]['business-eye-home-service-link'] = get_permalink();
                    if(isset( $business_eye_icons_arrays[$i] )){
                        $business_eye_home_service_contents_array[$i]['business-eye-home-service-page-icon'] = $business_eye_icons_arrays[$i]['business-eye-home-service-page-icon'];
                    }
                    else{
                        $business_eye_home_service_contents_array[$i]['business-eye-home-service-page-icon'] = 'fa-desktop';
                    }
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $business_eye_home_service_contents_array;
    }
endif;

if ( ! function_exists( 'business_eye_home_service' ) ) :
    /**
     * Service Section
     *
     * @since business-eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_home_service() {
        global $business_eye_customizer_all_values;
        if( 1 != $business_eye_customizer_all_values['business-eye-home-service-enable'] ){
            return null;
        }
        $business_eye_home_service_selection_options = $business_eye_customizer_all_values['business-eye-home-service-selection'];
        $business_eye_service_arrays = business_eye_home_service_array( $business_eye_home_service_selection_options );
        if( is_array( $business_eye_service_arrays )){
            $business_eye_home_service_number = absint($business_eye_customizer_all_values['business-eye-home-service-number']);
            $business_eye_home_service_title = $business_eye_customizer_all_values['business-eye-home-service-title'];
            $business_eye_home_service_sub_title = $business_eye_customizer_all_values['business-eye-home-service-sub-title'];
            $business_eye_home_service_button_text = $business_eye_customizer_all_values['business-eye-home-service-button-text'];
            $business_eye_home_service_button_link = $business_eye_customizer_all_values['business-eye-home-service-button-link'];
            ?>
            <section class="wrapper cm-pad service-sec sep-bgcolor">
                <div class="container">
                    <div class="row">
                        <div class="title-section">
                            <?php if(!empty( $business_eye_home_service_title ) ){ ?>
                                <h3><?php echo esc_html(  $business_eye_home_service_title); ?></h3>
                            <?php } ?>
                            <?php if(!empty( $business_eye_home_service_sub_title ) ){ ?>
                            <span class="title-divider"></span>
                            <span><?php echo esc_html( $business_eye_home_service_sub_title );?></span>
                            <?php } ?>
                        </div><!-- title-section ends -->

                        <?php 
                        $i = 1;
                        foreach( $business_eye_service_arrays as $business_eye_service_array ){
                            if( $business_eye_home_service_number < $i){
                                break;
                            }
                            ?>
                            <div class="col-md-4">
                                <div class="service-wrap salient-animate fadeInUp">
                                    <div class="service-icon">
                                        <a href="<?php echo esc_url( $business_eye_service_array['business-eye-home-service-link'] );?>" title="<?php echo esc_attr( $business_eye_service_array['business-eye-home-service-title'] );?>">
                                            <i class="fa <?php echo esc_attr( $business_eye_service_array['business-eye-home-service-page-icon'] ); ?>"></i>
                                        </a>
                                    </div> 
                                    <div class="service-content">
                                        <h4>
                                            <a href="<?php echo esc_url( $business_eye_service_array['business-eye-home-service-link'] );?>" title="<?php echo esc_attr( $business_eye_service_array['business-eye-home-service-title'] );?>">
                                                <?php echo esc_html( $business_eye_service_array['business-eye-home-service-title'] );?>
                                            </a>
                                        </h4>
                                        <div class="box-content-text">
                                            <p>
                                                <?php echo wp_kses_post( $business_eye_service_array['business-eye-home-service-content'] );?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php 
                        if( $i % 3 == 0 ){
                            echo "<div class='clear'></div>";
                        }
                        $i++;
                        }
                        ?>
                    </div><!-- row ends -->

                    <?php
                    if( !empty( $business_eye_home_service_button_link ) && !empty( $business_eye_home_service_button_text ) ){
                        ?>
                        <div class="btn-container browse-more-btn">
                            <a class="button-outline" href="<?php echo esc_url( $business_eye_home_service_button_link );?>">
                                <?php echo esc_html( $business_eye_home_service_button_text );?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div><!-- container ends -->
            </section><!-- service section -->
            <?php
        }
    }
endif;
add_action( 'business_eye_homepage', 'business_eye_home_service', 15 );