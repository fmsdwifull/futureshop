<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Eye
 */

?>
	<div class="entry-content">
		<?php
		$business_eye_single_post_image_align = business_eye_single_post_image_align(get_the_ID());
		if( 'no-image' != $business_eye_single_post_image_align ){
			if( 'left' == $business_eye_single_post_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $business_eye_single_post_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
		}
		?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-eye' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_eye_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

