<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package salient themes
 * @subpackage Business Eye
 * @since Business Eye 1.0.0
 */


/**
 * business_eye_action_after_content hook
 * @since Business Eye 1.0.0
 *
 * @hooked null
 */
do_action( 'business_eye_action_after_content' );

/**
 * business_eye_action_before_footer hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_before_footer - 10
 */
do_action( 'business_eye_action_before_footer' );

/**
 * business_eye_action_widget_before_footer hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_widget_before_footer - 10
 */
do_action( 'business_eye_action_widget_before_footer' );

/**
 * business_eye_action_footer hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_footer - 10
 */
do_action( 'business_eye_action_footer' );

/**
 * business_eye_action_after_footer hook
 * @since Business Eye 1.0.0
 *
 * @hooked null
 */
do_action( 'business_eye_action_after_footer' );

/**
 * business_eye_action_after hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_page_end - 10
 */
do_action( 'business_eye_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>