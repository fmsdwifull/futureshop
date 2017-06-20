<?php
/**
* Returns word count of the sentences.
*
* @since @since business-eye 1.0.0
*/
if ( ! function_exists( 'business_eye_words_count' ) ) :
	function business_eye_words_count( $length = 25, $business_eye_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $business_eye_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;