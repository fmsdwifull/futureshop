<?php
/**
 * Implement Editor Styles
 *
 * @since Business Eye 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'business_eye_add_editor_styles' );

if ( ! function_exists( 'business_eye_add_editor_styles' ) ) :
    function business_eye_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;