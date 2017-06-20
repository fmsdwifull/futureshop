<?php
/**
 * The default template for displaying header
 *
 * @package salient themes
 * @subpackage Business Eye
 * @since Business Eye 1.0.0
 */

/**
 * business_eye_action_before_head hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_set_global -  0
 * @hooked business_eye_doctype -  10
 */
do_action( 'business_eye_action_before_head' );?>



<head>

	<?php
	/**
	 * business_eye_action_before_wp_head hook
	 * @since Business Eye 1.0.0
	 *
	 * @hooked business_eye_before_wp_head -  10
	 */
	do_action( 'business_eye_action_before_wp_head' );

	wp_head();

	/**
	 * business_eye_action_after_wp_head hook
	 * @since Business Eye 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'business_eye_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>

<?php
/**
 * business_eye_action_before hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_page_start - 15
 */
do_action( 'business_eye_action_before' );

/**
 * business_eye_action_before_header hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_skip_to_content - 10
 */
do_action( 'business_eye_action_before_header' );

/**
 * business_eye_action_header hook
 * @since Business Eye 1.0.0
 *
 * @hooked business_eye_after_header - 10
 */
do_action( 'business_eye_action_header' );

/**
 * business_eye_action_before_content hook
 * @since Business Eye 1.0.0
 *
 * @hooked null
 */
do_action( 'business_eye_action_before_content' );
?>
