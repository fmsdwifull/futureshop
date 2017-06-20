<?php
if ( ! function_exists( 'business_eye_featured_slider_array' ) ) :
    /**
     * Featured Slider array creation
     *
     * @since Business Eye 1.0.0
     *
     * @param string $from_slider
     * @return array
     */
    function business_eye_featured_slider_array( $from_slider ){
        global $business_eye_customizer_all_values;
        $business_eye_feature_slider_number = absint( $business_eye_customizer_all_values['business-eye-featured-slider-number'] );
        $business_eye_feature_slider_single_words = absint( $business_eye_customizer_all_values['business-eye-fs-single-words'] );
        $repeated_page = array('business-eye-fs-pages-ids');
        $business_eye_feature_slider_args = array();
        $business_eye_feature_slider_contents_array = array();

        if ( 'from-category' ==  $from_slider ){
            $business_eye_feature_slider_category = $business_eye_customizer_all_values['business-eye-featured-slider-category'];
            if( 0 != $business_eye_feature_slider_category ){
                $business_eye_feature_slider_args =    array(
                    'post_type' => 'post',
                    'cat' => $business_eye_feature_slider_category,
                    'ignore_sticky_posts' => true
                );
            }
        }
        else{
            $business_eye_feature_slider_posts = salient_customizer_get_repeated_all_value(3 , $repeated_page);
            $business_eye_feature_slider_posts_ids = array();
            if( null != $business_eye_feature_slider_posts ) {
                foreach( $business_eye_feature_slider_posts as $business_eye_feature_slider_post ) {
                    if( 0 != $business_eye_feature_slider_post['business-eye-fs-pages-ids'] ){
                        $business_eye_feature_section_posts_ids[] = $business_eye_feature_slider_post['business-eye-fs-pages-ids'];
                    }
                }

                if( !empty( $business_eye_feature_section_posts_ids )){
                    $business_eye_feature_slider_args =    array(
                        'post_type' => 'page',
                        'post__in' => $business_eye_feature_section_posts_ids,
                        'posts_per_page' => $business_eye_feature_slider_number,
                        'orderby' => 'post__in'
                    );
                }

            }
        }
        if( !empty( $business_eye_feature_slider_args )){
            // the query
            $business_eye_fature_section_post_query = new WP_Query( $business_eye_feature_slider_args );

            if ( $business_eye_fature_section_post_query->have_posts() ) :
                $i = 0;
                while ( $business_eye_fature_section_post_query->have_posts() ) : $business_eye_fature_section_post_query->the_post();
                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'business-eye-main-banner' );
                        $url = $thumb['0'];
                    }
                    $business_eye_feature_slider_contents_array[$i]['business-eye-feature-slider-title'] = get_the_title();
                    if (has_excerpt()) {
                        $business_eye_feature_slider_contents_array[$i]['business-eye-feature-slider-content'] = get_the_excerpt();
                    }
                    else {
                        $business_eye_feature_slider_contents_array[$i]['business-eye-feature-slider-content'] = business_eye_words_count( $business_eye_feature_slider_single_words ,get_the_content());
                    }
                    $business_eye_feature_slider_contents_array[$i]['business-eye-feature-slider-link'] = get_permalink();
                    $business_eye_feature_slider_contents_array[$i]['business-eye-feature-slider-image'] = $url;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $business_eye_feature_slider_contents_array;
    }
endif;

if ( ! function_exists( 'business_eye_featured_home_slider' ) ) :
    /**
     * Featured Slider
     *
     * @since business-eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_featured_home_slider() {
        global $business_eye_customizer_all_values;

        if( 1 != $business_eye_customizer_all_values['business-eye-feature-slider-enable'] ){
            return null;
        }
        $business_eye_feature_slider_selection_options = $business_eye_customizer_all_values['business-eye-featured-slider-selection'];
        $business_eye_slider_arrays = business_eye_featured_slider_array( $business_eye_feature_slider_selection_options );


        if( is_array( $business_eye_slider_arrays )){
        $business_eye_feature_slider_number = absint( $business_eye_customizer_all_values['business-eye-featured-slider-number'] );
        $business_eye_feature_slider_mode = $business_eye_customizer_all_values['business-eye-fs-slider-mode'];
        $business_eye_feature_slider_time = $business_eye_customizer_all_values['business-eye-fs-slider-time'];
        $business_eye_feature_slider_pause_time = $business_eye_customizer_all_values['business-eye-fs-slider-pause-time'];
        $business_eye_feature_enable_arrow = $business_eye_customizer_all_values['business-eye-fs-enable-arrow'];
        $business_eye_feature_enable_pager = $business_eye_customizer_all_values['business-eye-fs-enable-pager'];
        $business_eye_feature_enable_autoplay = $business_eye_customizer_all_values['business-eye-fs-enable-autoplay'];
        $business_eye_feature_enable_title = $business_eye_customizer_all_values['business-eye-fs-enable-title'];
        $business_eye_feature_enable_caption = $business_eye_customizer_all_values['business-eye-fs-enable-caption'];
        $business_eye_feature_enable_search = $business_eye_customizer_all_values['business-eye-search-enable'];
        $business_eye_feature_button_text = $business_eye_customizer_all_values['business-eye-fs-button-text'];

    ?>

    <section class="wrapper main-slider wrapper-slider bannerbg">
        <?php if( 1 == $business_eye_feature_enable_arrow){ ?>
            <div class="controls">
                <a href="#" class="slide-prev" id="slide-prev"><i class="fa fa-angle-left"></i></a> 
                <a href="#" class="slide-next" id="slide-next"><i class="fa fa-angle-right"></i></a>
            </div>
        <?php }  ?>

        
            <div id="cycle-slideshow" class="cycle-slideshow bannerbg"
            data-cycle-log="false"
            data-cycle-fx=<?php echo esc_attr( $business_eye_feature_slider_mode);?>
            data-cycle-speed="<?php echo (esc_attr( $business_eye_feature_slider_time) * 1000)?>"
            data-cycle-carousel-fluid=true
            data-cycle-carousel-visible=1
            data-cycle-pause-on-hover="true"
            data-cycle-slides="> div"
            data-cycle-prev="#slide-prev"
            data-cycle-next="#slide-next"
            data-cycle-auto-height=container
            data-cycle-swipe=true
            data-cycle-swipe-fx=scrollHorz
            <?php if( 1 == $business_eye_feature_enable_pager){ ?>
                data-cycle-pager="#slide-pager"
            <?php }  ?>
            <?php if( 1 != $business_eye_feature_enable_autoplay){ ?>
                data-cycle-timeout=0
            <?php }  ?>
            <?php if(1 == $business_eye_feature_enable_autoplay){ ?>
                data-cycle-timeout=<?php echo (esc_attr( $business_eye_feature_slider_pause_time) * 1000)?>
            <?php }  ?>
            >
                <?php
                $i = 1;
                foreach( $business_eye_slider_arrays as $business_eye_slider_array ){
                    if( $business_eye_feature_slider_number < $i){
                        break;
                    }
                    if(empty($business_eye_slider_array['business-eye-feature-slider-image'])){
                        $business_eye_feature_slider_image = get_template_directory_uri().'/assets/img/no-image.jpg';
                    }
                    else{
                        $business_eye_feature_slider_image =$business_eye_slider_array['business-eye-feature-slider-image'];
                    }
                    ?>  
                    <div class="slide-item bg-overlay" style="background-image: url('<?php echo esc_url( $business_eye_feature_slider_image )?>');">
                        <div class="thumb-overlay">
                                        <div class="banner-content">
                                            <?php if ((1 == $business_eye_feature_enable_title) || (1 == $business_eye_feature_enable_caption)){?>
                                                <div class="banner-content-inner">
                                                    <?php if( 1 == $business_eye_feature_enable_title) {
                                                        ?>
                                                            <h2 class="slider-title"><a href="<?php echo esc_url( $business_eye_slider_array['business-eye-feature-slider-link'] );?>"><?php echo esc_html( $business_eye_slider_array['business-eye-feature-slider-title'] );?></a></h2>
                                                        <?php
                                                    }
                                                    if( 1 == $business_eye_feature_enable_caption){
                                                        ?>
                                                        <div class="text-content">
                                                            <?php echo wp_kses_post( $business_eye_slider_array['business-eye-feature-slider-content'] );?>
                                                        </div>
                                                        <?php if (!empty($business_eye_feature_button_text)) { ?>
                                                            <div class="btn-holder">
                                                                <a href="<?php echo esc_url( $business_eye_slider_array['business-eye-feature-slider-link'] );?>" class="button"><?php echo esc_html($business_eye_feature_button_text); ?></a>
                                                            </div>
                                                        <?php } ?>
                                                        <?php
                                                    }?>      
                                                </div>
                                            <?php } ?> 
                                        </div>

                        </div>
                    </div>

                    <?php
                $i++;
                }
                ?>

            </div>
       
        <div class="cycle-pager slide-pager" id="slide-pager"></div>
    </section>
    <?php
        }
    }
endif;
add_action( 'homepage-main-slider', 'business_eye_featured_home_slider', 10 );