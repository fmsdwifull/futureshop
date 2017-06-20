<?php
/**
 * The template for displaying home page.
 * @package business-eye
 */
global $business_eye_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }

    else{
		/**
		 * business_eye_homepage hook
		 * @since business-eye 1.0.0
		 *
		 * @hooked business_eye_homepage -  10
		 * @sub_hooked business_eye_homepage -  30
		 */
		do_action( 'business_eye_homepage' );
        $business_eye_static_page = absint($business_eye_customizer_all_values['business-eye-enable-static-page']);
        if ($business_eye_static_page == 1) { ?>
            <div id="content" class="site-content container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <header class="entry-headers">
                        <?php the_title( '<h1 class="entry-titles">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
                </div>
            </div>
                <div id="primary" class="content-area col-sm-8">
                    <main id="main" class="site-main" role="main">

                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
                <?php
                    get_sidebar();
                ?>
                
            </div>
        <?php }
}
get_footer();