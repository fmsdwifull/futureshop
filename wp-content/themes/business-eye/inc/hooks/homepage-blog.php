<?php
if ( ! function_exists( 'business_eye_home_blog' ) ) :
    /**
     * Blog Section
     *
     * @since Business Eye 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_eye_home_blog() {
        global $business_eye_customizer_all_values;
        $business_eye_home_blog_title = $business_eye_customizer_all_values['business-eye-home-blog-title'];
        $business_eye_home_blog_sub_title = $business_eye_customizer_all_values['business-eye-home-blog-sub-title'];
        $business_eye_home_blog_button_text = $business_eye_customizer_all_values['business-eye-home-blog-button-text'];
        $business_eye_home_blog_button_link = $business_eye_customizer_all_values['business-eye-home-blog-button-link'];
        $business_eye_home_blog_single_words = absint( $business_eye_customizer_all_values['business-eye-home-blog-single-words'] );
        
        $business_eye_home_blog_category = esc_attr($business_eye_customizer_all_values['business-eye-home-blog-category']);
        if( 1 != $business_eye_customizer_all_values['business-eye-home-blog-enable'] ){
            return null;
        }
        ?>

        <section class="wrap-latestpost cm-pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3><?php echo esc_html( $business_eye_home_blog_title );?></h3>
                                <span class="title-divider"></span>
                            <span><?php echo esc_html( $business_eye_home_blog_sub_title );?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- if there is any sticky -->
                    <?php
                    $business_eye_home_blog_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'cat'           => $business_eye_home_blog_category
                    );
                    $business_eye_home_blog_post_query = new WP_Query($business_eye_home_blog_args);
                    if ($business_eye_home_blog_post_query->have_posts()) :
                        while ($business_eye_home_blog_post_query->have_posts()) : $business_eye_home_blog_post_query->the_post();
                            if(has_post_thumbnail()){
                                $thumbs = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'business-eye-blog-post' );
                                $urls = $thumbs['0'];
                            }
                            else{
                                $urls = get_template_directory_uri().'/assets/img/no-image.jpg';
                            } ?>
                                <div class="col-sm-4">
                                    <div class="latestpost salient-animate fadeInUp" data-wow-delay="0.8s">
                                        <div class="">
                                            <div class="thumbnail-wrap">
                                                <div class="latestpost-thumb">
                                                    <a href="<?php the_permalink();?>">
                                                        <img src="<?php echo esc_url( $urls ); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="latest-blog">
                                                <div class="latestpost-inner">
                                                    <div class="latestpost-content">
                                                        <h4 class="post-title">
                                                            <a href="<?php the_permalink();?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h4>
                                                        <?php
                                                        if ( has_excerpt() ) {
                                                            the_excerpt();
                                                        } else {
                                                            $content_blog = get_the_content();
                                                            echo wp_kses_post(business_eye_words_count( $business_eye_home_blog_single_words, $content_blog ));
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="latestpost-footer">
                                                        <span>
                                                            <?php
                                                            $archive_day   = get_the_time('d');
                                                            ?>
                                                            <a href="<?php echo esc_url(get_day_link('', '', $archive_day)); ?>"><i class="fa fa-calendar"></i> <?php echo esc_attr(get_the_date( __( 'Y', 'business-eye' ) ));?></a>
                                                        </span>
                                                        <span>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <i class="fa fa-comment"></i>
                                                                <?php
                                                                    $commentscount = get_comments_number();
                                                                    if($commentscount == 1): $commenttext = ''; endif;
                                                                    if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                                    echo absint($commentscount).' '.esc_html($commenttext);
                                                                ?>
                                                            </a>
                                                        </span>
                                                        <span class="moredetail"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                             wp_reset_postdata(); ?>
                        <?php endwhile; 
                        endif;
                        ?>
                <?php
                    if( !empty ( $business_eye_home_blog_button_text ) ){
                        ?>
                        <div class="clear"></div>
                        <div class="btn-container">
                            <a class="button-outline" href="<?php echo esc_url( $business_eye_home_blog_button_link );?>">
                                <?php echo esc_html( $business_eye_home_blog_button_text );?>
                            </a>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'business_eye_homepage', 'business_eye_home_blog', 40 );