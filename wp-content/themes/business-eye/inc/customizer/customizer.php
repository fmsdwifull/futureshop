<?php
/**
 * salient themes Theme Customizer
 *
 * @package salient themes
 * @subpackage business-eye
 * @since business-eye 1.0.0
 */
add_filter('salient_customizer_framework_url', 'business_eye_customizer_framework_url');

if( ! function_exists( 'business_eye_customizer_framework_url' ) ):

    function business_eye_customizer_framework_url(){
        return trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/salient-customizer/';
    }

endif;

add_filter('salient_customizer_framework_path', 'business_eye_customizer_framework_path');

if( ! function_exists( 'business_eye_customizer_framework_path' ) ):
    function business_eye_customizer_framework_path(){
        return trailingslashit( get_template_directory() ) . 'inc/frameworks/salient-customizer/';
    }
endif;

if(!defined('SALIENT_CUSTOMIZER_NAME')){
    define('SALIENT_CUSTOMIZER_NAME','business-eye-options');
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since business-eye 1.0
 */
if ( ! function_exists( 'business_eye_reset_options' ) ) :
    function business_eye_reset_options( $reset_options ) {
        set_theme_mod( SALIENT_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require get_template_directory().'/inc/frameworks/salient-customizer/salient-customizer.php';

global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/******************************************
Modify Site Identity sections
 *******************************************/
require get_template_directory().'/inc/customizer/font-color/font-color.php';

/******************************************
Featured Slider options
 *******************************************/
require get_template_directory().'/inc/customizer/featured-slider/slider-section.php';


/******************************************
Home Service options
 *******************************************/
require get_template_directory().'/inc/customizer/home-service/service-section.php';

/******************************************
Portfolio options
 *******************************************/
require get_template_directory().'/inc/customizer/home-portfolio/portfolio-section.php';

/******************************************
Home About options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-about/about-section.php';

/******************************************
Home Blog options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-blog/blog-section.php';

/******************************************
Home callback options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-callback/callback-section.php';


/******************************************
Theme options panel
 *******************************************/
require get_template_directory().'/inc/customizer/theme-options/option-panel.php';

/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since business-eye 1.0
 */
global $business_eye_customizer_defaults;
$business_eye_customizer_defaults['business-eye-customizer-reset-settings'] = '';
if ( ! function_exists( 'business_eye_customizer_reset' ) ) :
    function business_eye_customizer_reset( ) {
        global $business_eye_customizer_saved_values;
        $business_eye_customizer_saved_values = business_eye_get_all_options();
        if ( $business_eye_customizer_saved_values['business-eye-customizer-reset-settings'] == 1 ) {
            global $business_eye_customizer_defaults;
            /*getting fields*/
            $business_eye_customizer_defaults['business-eye-customizer-reset-settings'] = '';
            /*resetting fields*/
            business_eye_reset_options( $business_eye_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','business_eye_customizer_reset' );

$business_eye_sections['business-eye-customizer-resets'] =
    array(
        'priority'       => 999,
        'title'          => esc_html__( 'Reset All Options', 'business-eye' )
    );
$business_eye_settings_controls['business-eye-customizer-reset-settings'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-customizer-reset-settings'],
            'sanitize_callback'    => 'salient_customizer_sanitize_checkbox',
            'transport'            => 'postmessage'
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Reset All Options', 'business-eye' ),
            'description'           =>  esc_html__( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'business-eye' ),
            'section'               => 'business-eye-customizer-resets',
            'type'                  => 'checkbox',
            'priority'              => 10
        )
    );

/******************************************
Managing section setting control
 *******************************************/

$business_eye_sections['header_image'] =
    $business_eye_customizer_args = array(
        'panels'            => $business_eye_panels, /*always use key panels */
        'sections'          => $business_eye_sections,/*always use key sections*/
        'settings_controls' => $business_eye_settings_controls,/*always use key settings_controls*/
        'repeated_settings_controls' => $business_eye_repeated_settings_controls,/*always use key sections*/
    );

/*registering panel section setting and control start*/
function business_eye_add_panels_sections_settings() {
    global $business_eye_customizer_args;
    return $business_eye_customizer_args;
}
add_filter( 'salient_customizer_panels_sections_settings', 'business_eye_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_eye_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'business_eye_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_eye_customize_preview_js() {
    wp_enqueue_script( 'business-eye-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160105', true );
}
add_action( 'customize_preview_init', 'business_eye_customize_preview_js' );



/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since business-eye 1.0
 */
if ( ! function_exists( 'business_eye_get_all_options' ) ) :
    function business_eye_get_all_options( $merge_default = 0 ) {
        $business_eye_customizer_saved_values = salient_customizer_get_all_values( );
        if( 1 == $merge_default ){
            global $business_eye_customizer_defaults;
            if(is_array( $business_eye_customizer_saved_values )){
                $business_eye_customizer_saved_values = array_merge($business_eye_customizer_defaults, $business_eye_customizer_saved_values );
            }
            else{
                $business_eye_customizer_saved_values = $business_eye_customizer_defaults;
            }
        }
        return $business_eye_customizer_saved_values;
    }
endif;