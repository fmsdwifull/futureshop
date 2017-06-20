<?php
if( ! function_exists( 'business_eye_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  Business Eye 1.0.0
     *
     * @param null
     * @return int
     */
    function business_eye_excerpt_length( $length ){
        global $business_eye_customizer_all_values;
        $excerpt_length = $business_eye_customizer_all_values['business-eye-number-of-words'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'business_eye_excerpt_length', 999 );