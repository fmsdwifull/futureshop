<?php 
global $post;
if (!function_exists('business_eye_single_page_title')) :
    function business_eye_single_page_title() {
        //$business_eye_inner_baner_image = get_header_image();
        $business_eye_inner_baner_image = get_template_directory_uri() .'/assets/img/banner.png';
     ?>
			<div class="page-inner-title" style="background-image:url(<?php echo esc_url($business_eye_inner_baner_image); ?>);">
				<div class="container">
				    <div class="row">
				        <div class="col-md-12">
				        	<div class="page-inner-banner">
								<header class="entry-header">
									<?php if (is_singular()){ ?>
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<?php if (! is_page() ){?>
										<header class="entry-header">
											<div class="entry-meta entry-inner">
												<?php business_eye_posted_on(); ?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									<?php } }
									elseif (is_404()) { ?>
										<h2 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'business-eye' ); ?></h2>
									<?php }
									elseif (is_archive()) {
										the_archive_title( '<h2 class="entry-title">', '</h2>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									}
									elseif (is_search()) { ?>
										<h2 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'business-eye' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
									<?php }
									else{ ?>
											<h2 class="entry-title"><?php echo (esc_html__( 'Latest Blog', 'business-eye' )); ?></h2>
									<?php }
									?>
								</header><!-- .entry-header -->
								<?php 
									/**
									 * business_eye_action_after_title hook
									 * @since Business Eye 1.0.0
									 *
									 * @hooked null
									 */
									do_action( 'business_eye_action_after_title' );
								?>	
				        	</div>

				        </div>
				    </div>
				</div>
			</div>

		<?php 
		
	}
endif;
add_action( 'business-eye-page-inner-title', 'business_eye_single_page_title', 15 );
