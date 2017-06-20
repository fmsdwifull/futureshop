<?php
/**
 * salient themes init file
 *
 * @package salient themes
 * @subpackage business-eye
 * @since business-eye 1.0.0
 */

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer/customizer.php';

/**
 * Include Functions
 */
require get_template_directory().'/inc/function/breadcrum.php';

require get_template_directory().'/inc/function/words-count.php';

require get_template_directory().'/inc/function/single-image-align.php';

require get_template_directory() . '/inc/function/header-logo.php';

require get_template_directory() . '/inc/function/inner-head.php';

/**
* Include sidebar widgets
*/
require get_template_directory().'/inc/sidebar-widget-init.php';

/**
 * Include Hooks
 */

 require get_template_directory().'/inc/hooks/header.php';
 
 require get_template_directory().'/inc/hooks/footer.php';

 require get_template_directory().'/inc/hooks/homepage-slider.php';
 
 require get_template_directory().'/inc/hooks/homepage-service.php';
 
 require get_template_directory().'/inc/hooks/homepage-portfolio.php';
 
 require get_template_directory().'/inc/hooks/homepage-about.php';
 
 require get_template_directory().'/inc/hooks/homepage-callback.php';
 
 require get_template_directory().'/inc/hooks/homepage-blog.php';
 
 require get_template_directory().'/inc/hooks/excerpt.php';
 
 require get_template_directory().'/inc/hooks/init.php';
 

 /* 
 Layout additions
 */
 require get_template_directory() . '/inc/post-meta/layout-meta.php';

