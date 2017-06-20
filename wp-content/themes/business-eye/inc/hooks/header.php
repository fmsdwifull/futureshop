<?php
if ( ! function_exists( 'business_eye_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_set_global() {
    /*Getting saved values start*/
    $GLOBALS['business_eye_customizer_all_values'] = business_eye_get_all_options(1);
}
endif;
add_action( 'business_eye_action_before_head', 'business_eye_set_global', 0 );

if ( ! function_exists( 'business_eye_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'business_eye_action_before_head', 'business_eye_doctype', 10 );

if ( ! function_exists( 'business_eye_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'business_eye_action_before_wp_head', 'business_eye_before_wp_head', 10 );

if( ! function_exists( 'business_eye_default_layout' ) ) :
    /**
     * Business Eye default layout function
     *
     * @since  Business Eye 1.0.0
     *
     * @param int
     * @return string
     */
    function business_eye_default_layout( $post_id = null ){

        global $business_eye_customizer_all_values,$post;
        $business_eye_default_layout = $business_eye_customizer_all_values['business-eye-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $business_eye_default_layout_meta = get_post_meta( $post_id, 'business-eye-default-layout', true );

        if( false != $business_eye_default_layout_meta ) {
            $business_eye_default_layout = $business_eye_default_layout_meta;
        }
        return $business_eye_default_layout;
    }
endif;

if ( ! function_exists( 'business_eye_body_class' ) ) :
/**
 * add body class
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_body_class( $business_eye_body_classes ) {
    if(!is_front_page() || ( is_front_page())){
        $business_eye_default_layout = business_eye_default_layout();
        if( !empty( $business_eye_default_layout ) ){
            if( 'left-sidebar' == $business_eye_default_layout ){
                $business_eye_body_classes[] = 'salient-left-sidebar';
            }
            elseif( 'right-sidebar' == $business_eye_default_layout ){
                $business_eye_body_classes[] = 'salient-right-sidebar';
            }
            elseif( 'both-sidebar' == $business_eye_default_layout ){
                $business_eye_body_classes[] = 'salient-both-sidebar';
            }
            elseif( 'no-sidebar' == $business_eye_default_layout ){
                $business_eye_body_classes[] = 'salient-no-sidebar';
            }
            else{
                $business_eye_body_classes[] = 'salient-right-sidebar';
            }
        }
        else{
            $business_eye_body_classes[] = 'salient-right-sidebar';
        }
    }
    return $business_eye_body_classes;

}
endif;
add_action( 'body_class', 'business_eye_body_class', 10, 1);

if ( ! function_exists( 'business_eye_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_before_page_start() {
    global $business_eye_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'business_eye_action_before', 'business_eye_before_page_start', 10 );

if ( ! function_exists( 'business_eye_page_start' ) ) :
/**
 * page start
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_page_start() {
?>
    <div id="page" class="site">
<?php
}
endif;
add_action( 'business_eye_action_before', 'business_eye_page_start', 15 );

if ( ! function_exists( 'business_eye_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-eye' ); ?></a>
<?php
}
endif;
add_action( 'business_eye_action_before_header', 'business_eye_skip_to_content', 10 );

if ( ! function_exists( 'business_eye_header' ) ) :
/**
 * Main header
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_eye_header() {
    global $business_eye_customizer_all_values;
    global $post;
    ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-sm-4 col-md-3">
                        <div class="site-branding">
                        <?php 
                            business_eye_the_custom_logo(); ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif;

                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <h2 class="site-description"><?php echo esc_html($description); ?></h2>
                            <?php endif; 
                        ?>
                        </div><!-- .site-branding -->
                    </div>
                    <div class="col-xs-4 col-sm-8 col-md-9">
                        <div class="search-form-up">
                            <?php get_search_form(); ?>
                        </div>

                        <div id="nav-wrap" class="clearfix">
                            <a href="#menu" class="menu-icon"><i class="fa fa-bars"></i></a>
                           
                            <nav id="site-navigation" class="main-navigation" role="navigation">
                                <?php wp_nav_menu( array( 
                                'theme_location' => 'primary',
                                'container' => false,
                                ) ); ?>
                            </nav>    
                            <?php $business_eye_enable_search = $business_eye_customizer_all_values['business-eye-search-enable' ];
                                if ($business_eye_enable_search == 1) { ?>
                                        <?php 
                                    $business_eye_enable_search = $business_eye_customizer_all_values['business-eye-search-enable' ];
                                        if ($business_eye_enable_search == 1) { ?>
                                         <div class="search-container">
                                             <a class="search-button" href="#">
                                                <i class="fa fa-search"></i>
                                             </a>
                                         </div>
                                    <?php 
                                        } 
                                    ?>  
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <nav id="menu">
            <?php wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container' => false,
            ) ); ?>
        </nav>
       
        <!-- slider section -->
        <?php 
        if (  is_front_page() && !is_home() ) {
            do_action('homepage-main-slider');
        }
        else {
            do_action('business-eye-page-inner-title');
        }
        ?>
<?php 
}
endif;
add_action( 'business_eye_action_header', 'business_eye_header', 10 );

if( ! function_exists( 'business_eye_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function business_eye_add_breadcrumb(){
        global $business_eye_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $business_eye_customizer_all_values['business-eye-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="breadcrumb-wrap">';
         business_eye_simple_breadcrumb();
        echo '</div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'business_eye_action_after_title', 'business_eye_add_breadcrumb', 10 );


