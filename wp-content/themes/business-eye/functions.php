<?php
/**
 * business-eye functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business-eye
 */

/**
 * require business-eye int.
 */
require get_template_directory() . '/inc/init.php';

if ( ! function_exists( 'business_eye_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_eye_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on business-eye, use a find and replace
	 * to change 'business-eye' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-eye', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Enable support for image sizes on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'business-eye-main-banner', 1370, 550, true );
	add_image_size( 'business-eye-blog-post', 365, 247, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'business-eye' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'business_eye_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*implimenting new feature from 4.5*/
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	   'flex-width' => true
	) );

    /*woocommerce support*/
    add_theme_support( 'woocommerce' );
    
}
endif;
add_action( 'after_setup_theme', 'business_eye_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_eye_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_eye_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_eye_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */


/*Google Fonts*/
function business_eye_google_fonts() {
	$fonts_url = '';
	$fonts     = array();
	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'business-eye' ) ) {
		$fonts[] = 'Noto Sans:400,400i,700,700i';
	}
	
	$fonts[] = 'Lato:300,300i,400,400i,700,700i,900,900i|Poppins:300,400,500,600,700';

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}


function business_eye_scripts() {
		/*google fonts*/
		wp_enqueue_style( 'google-fonts', business_eye_google_fonts() );

	 	/*animate*/
	    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/frameworks/wow/css/animate.min.css', array(), '3.4.0' );/*added*/

		// mmenu
		wp_enqueue_style( 'jquery-mmenu-all', get_template_directory_uri() . '/assets/frameworks/mmenu/css/jquery.mmenu.all.css' );/*added*/
		
		// photobox
		wp_enqueue_style( 'jquery-photobox', get_template_directory_uri() . '/assets/frameworks/photobox/photobox.css' );/*added*/

		//slick main
	    wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick.css', array(), '3.4.0' );/*added*/
		
		//slick theme
	    wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick-theme.css', array(), '3.4.0' );/*added*/
		
		wp_enqueue_style( 'business-eye-style', get_stylesheet_uri() );
		
		// Script
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), '2.8.3', true );

		wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
		
		wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/frameworks/jquery.easing/jquery.easing.js', array('jquery'), '0.3.6', 1);

	    wp_enqueue_script('jquery-wow', get_template_directory_uri() . '/assets/frameworks/wow/js/wow.min.js', array('jquery'), '1.1.2', 1);

	    // mmenu
		wp_enqueue_script( 'jquery-mmenu', get_template_directory_uri() . '/assets/frameworks/mmenu/js/jquery.mmenu.min.all.js', array('jquery'), '4.7.5', false );

		/*cycle2 slider*/
		wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.js', array( 'jquery' ), '2.1.6', true );
		
    	wp_enqueue_script( 'jquery-cycle2-swipe', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.swipe.js', array( 'jquery' ), '20121120', true );

    	// isotope
    	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/assets/frameworks/isotope/isotope.pkgd.js', array('jquery'), '3.0.1', true );
		
    	// photobox
    	wp_enqueue_script( 'jquery-photobox', get_template_directory_uri() . '/assets/frameworks/photobox/jquery.photobox.js', array('jquery'), '1.9.2', true );
    	
    	// slick
    	wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick.min.js', array('jquery'), '1.6.0', 1);

		wp_enqueue_script('business-eye-salient-custom', get_template_directory_uri() . '/assets/js/salient-custom.js', array('jquery'), '1.0.1', 1);

		wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );
		wp_add_inline_style( 'business-eye-style', business_eye_inline_style() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_eye_scripts' );

/*added admin css for meta*/
function business_eye_wp_admin_style($hook) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
        wp_register_style( 'business-eye-admin-css', get_template_directory_uri() . '/assets/css/admin-meta.css',array(), ''  );
        wp_enqueue_style( 'business-eye-admin-css' );
    }
}
add_action( 'admin_enqueue_scripts', 'business_eye_wp_admin_style' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/business-eye/class-customize.php' );

/**
*Inline style to use color options
**/
if( ! function_exists( 'business_eye_inline_style' ) ) :

    /**
     * style to use color options
     *
     * @since  business eye 1.0.1
     */
    function business_eye_inline_style(){
      
        global $business_eye_customizer_all_values;
        global $business_eye_google_fonts;
        $business_eye_background_color = get_background_color();
        $business_eye_primary_color_option = $business_eye_customizer_all_values['business-eye-primary-color'];
        $business_eye_site_identity_color_option = $business_eye_customizer_all_values['business-eye-site-identity-color'];
        ?>
        <style type="text/css">
        /*=====COLOR OPTION=====*/

        /*Color*/
        /*----------------------------------*/
        <?php 
        /*Primary*/
        if( !empty($business_eye_primary_color_option) ){
        ?>

        .button,
        button,
        html input[type="button"],
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .button:visited,
        button:visited,
        html input[type="button"]:visited,
        input[type="button"]:visited,
        input[type="reset"]:visited,
        input[type="submit"]:visited,
        .form-inner .wpcf7-submit,
        .form-inner .wpcf7-submit:visited,
        .slide-pager .cycle-pager-active,
        .slick-dots .slick-active button,
        .title-divider,
        section.wrapper-slider .slide-pager .cycle-pager-active,
        section.wrapper-slider .slide-pager .cycle-pager-active:visited,
        section.wrapper-slider .slide-pager .cycle-pager-active:hover,
        section.wrapper-slider .slide-pager .cycle-pager-active:focus,
        section.wrapper-slider .slide-pager .cycle-pager-active:active,
        .title-divider,
        .title-divider:visited,
        .block-overlay-hover,
        .block-overlay-hover:visited,
        #gmaptoggle,
        #gmaptoggle:visited,
        .salient-back-to-top,
        .salient-back-to-top:visited,
        .widget_calendar tbody a,
        .widget_calendar tbody a:visited,
        .wrap-portfolio .button.is-checked,
        .radius-thumb-holder,
        .radius-thumb-holder:before,
        .radius-thumb-holder:hover:before, 
        .radius-thumb-holder:focus:before, 
        .radius-thumb-holder:active:before,
        #pbCloseBtn:hover:before,
        .slide-pager .cycle-pager-active, 
        .slide-pager span:hover,
        .featurepost .latestpost-footer .moredetail a,
        .featurepost .latestpost-footer .moredetail a:visited,
        #load-wrap,
        .back-tonav,
        .back-tonav:visited,
        .wrap-service .box-container .box-inner:hover .box-content, 
        .wrap-service .box-container .box-inner:focus .box-content,
        .top-header .noticebar .notice-title,
        .top-header .timer,
        .nav-buttons,
        .widget .widgettitle:after,
        .widget .widget-title:after,
        .widget .search-form .search-submit,
        .widget .search-form .search-submit:focus,
        .main-navigation.sec-main-navigation ul li.current_page_item:before,
        .comments-area input[type="submit"],
        .slick-prev:before,
        .slick-next:before,
        .single-icon a .icon-holder:after,
        .single-icon a .hover-content,
        .section-title h2:after,
        .button,
        button,
        html input[type="button"],
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .button:visited,
        button:visited,
        html input[type="button"]:visited,
        input[type="button"]:visited,
        input[type="reset"]:visited,
        input[type="submit"]:visited,
        .wrapper-port .single-thumb .content-area,
        .wrapper-testimonial .controls a:hover,
        .wrapper-testimonial .controls a:focus,
        .wrapper-testimonial .controls a:active,
        .salient-back-to-top,
        .salient-back-to-top:focus,
        .salient-back-to-top:visited,
        .salient-back-to-top:hover,
        .salient-back-to-top:focus,
        .salient-back-to-top:active,
        .wrapper-blog .slick-arrow,
        .wrapper-blog .carousel-group .text:after,
        .carousel-group .slick-dots .slick-active,
        .button-search-close,
        .widget .search-form .search-submit,
        .widget .search-form .search-submit:visited,
        body.woocommerce #respond input#submit, 
        body.woocommerce a.button, 
        body.woocommerce button.button, 
        body.woocommerce input.button,
        body.woocommerce #respond input#submit:focus, 
        body.woocommerce a.button:focus, 
        body.woocommerce button.button:focus, 
        body.woocommerce input.button:focus,
        body.woocommerce .cart .button, 
        body.woocommerce .cart input.button,
        body.woocommerce div.product form.cart .button,
        body.woocommerce div.product form.cart .button,
        body.woocommerce div.product form.cart .button,
        body.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
        body.woocommerce-cart .woocommerce #respond input#submit,
        body.woocommerce-cart .woocommerce a.button,
        body.woocommerce-cart .woocommerce button.button,
        body.woocommerce-cart .woocommerce input.button,
        body.woocommerce-checkout .woocommerce input.button.alt,
        .widget_calendar tbody a,
        h1.page-title:before,
        h1.entry-title:before,
        .wraploader,
        body.woocommerce #respond input#submit:hover, 
        body.woocommerce a.button:hover, 
        body.woocommerce button.button:hover, 
        body.woocommerce input.button:hover,
        body.woocommerce nav.woocommerce-pagination ul li a:focus, 
        body.woocommerce nav.woocommerce-pagination ul li a:hover,
        body.woocommerce nav.woocommerce-pagination ul li span.current,
        .search-form .search-submit {
        	background-color: <?php echo esc_attr( $business_eye_primary_color_option );?>;;
        }

        @media screen and (min-width: 768px){
        .main-navigation .current_page_item > a:after,
        .main-navigation .current-menu-item > a:after,
        .main-navigation .current_page_ancestor > a:after,
        .main-navigation li.active > a:after,
        .main-navigation li.active > a:after,
        .main-navigation li.active > a:after,
        .main-navigation li.current_page_parent a:after {
            background-color: <?php echo esc_attr( $business_eye_primary_color_option );?>;;
          }
        }

        .widget-title,
        .widgettitle,
        .wrapper-slider,
        .flip-container .front,
        .flip-container .back,
        .wrapper-about a.button,
        .widget .widgettitle, .blog article.hentry .widgettitle,
        #blog-post article.hentry .widgettitle,
        .search article.hentry .widgettitle,
        .archive article.hentry .widgettitle,
        .tag article.hentry .widgettitle,
        .category article.hentry .widgettitle,
        #ak-blog-post article.hentry .widgettitle,
        .page article.hentry .widgettitle,
        .single article.hentry .widgettitle,
        body.woocommerce article.hentry .widgettitle, body.woocommerce .site-main .widgettitle,
        .widget .widget-title, .blog article.hentry .widget-title,
        #blog-post article.hentry .widget-title,
        .search article.hentry .widget-title,
        .archive article.hentry .widget-title,
        .tag article.hentry .widget-title,
        .category article.hentry .widget-title,
        #ak-blog-post article.hentry .widget-title,
        .page article.hentry .widget-title,
        .single article.hentry .widget-title,
        body.woocommerce article.hentry .widget-title,
        body.woocommerce .site-main .widget-title,
        #secondary h2.widget-title,
        body.woocommerce #respond input#submit:hover, 
        body.woocommerce a.button:hover, 
        body.woocommerce button.button:hover, 
        body.woocommerce input.button:hover,
        body.woocommerce nav.woocommerce-pagination ul li a:focus, 
        body.woocommerce nav.woocommerce-pagination ul li a:hover,
        body.woocommerce nav.woocommerce-pagination ul li span.current{
          border-color: <?php echo esc_attr( $business_eye_primary_color_option );?>;;
        }

        .latestpost-footer .moredetail a,
        .latestpost-footer .moredetail a:visited,
        .single-icon a .icon-holder,
        .wrapper-about a.button,
        .team-item:hover h3 a,
        .team-item:focus h3 a,
        .team-item:active h3 a,
        .post-content .cat a,
        .service-wrap .service-icon i,
        .edit-link a{
          color: <?php echo esc_attr( $business_eye_primary_color_option );?>;;
        }
        <?php
        } 
        if( !empty($business_eye_site_identity_color_option) ){
        ?>
            /*Site identity / logo & tagline*/
            .site-header .site-title a,
            .site-header .site-description,
            .site-header .site-branding a,
            .site-header .site-description,
            .site-header .wrapper-site-identity .site-branding .site-title {
              color: <?php echo esc_attr( $business_eye_site_identity_color_option );?>;
            }
        <?php
        } 
        ?>
        </style>
    <?php
    }
endif;