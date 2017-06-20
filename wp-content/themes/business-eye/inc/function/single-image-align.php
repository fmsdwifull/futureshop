<?php 
/*image alignment single post*/

if( ! function_exists( 'business_eye_single_post_image_align' ) ) :
    /**
     * Business Eye default layout function
     *
     * @since  Business Eye 1.0.0
     *
     * @param int
     * @return string
     */
    function business_eye_single_post_image_align( $post_id = null ){
        global $business_eye_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $business_eye_single_post_image_align = $business_eye_customizer_all_values['business-eye-single-post-image-align'];
        $business_eye_single_post_image_align_meta = get_post_meta( $post_id, 'business-eye-single-post-image-align', true );

        if( false != $business_eye_single_post_image_align_meta ) {
            $business_eye_single_post_image_align = $business_eye_single_post_image_align_meta;
        }
        return $business_eye_single_post_image_align;
    }
endif;