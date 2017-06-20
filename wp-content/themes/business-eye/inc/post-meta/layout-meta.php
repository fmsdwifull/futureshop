<?php
/**
 * business-eye Custom Metabox
 *
 * @package business-eye
 */
$business_eye_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'business_eye_add_layout_metabox');
function business_eye_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option('page_on_front');
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $business_eye_post_types;
    foreach ( $business_eye_post_types as $post_type ) {
        add_meta_box(
            'business_eye_layout_options', // $id
            esc_html__( 'Layout options', 'business-eye' ), // $title
            'business_eye_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* business-eye sidebar layout */
$business_eye_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
    )
);
/* business-eye featured layout */
$business_eye_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => esc_html__( 'Full', 'business-eye' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => esc_html__( 'Right ', 'business-eye' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => esc_html__( 'Left', 'business-eye' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => esc_html__( 'No Image', 'business-eye' )
    )
);

function business_eye_layout_options_callback() {

    global $post , $business_eye_default_layout_options, $business_eye_single_post_image_align_options;
    $business_eye_customizer_saved_values = business_eye_get_all_options(1);

    /*business-eye-single-post-image-align*/
    $business_eye_single_post_image_align = $business_eye_customizer_saved_values['business-eye-single-post-image-align'];

    /*business-eye default layout*/
    $business_eye_single_sidebar_layout = $business_eye_customizer_saved_values['business-eye-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'business_eye_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e('Choose Sidebar Template', 'business-eye' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $business_eye_single_sidebar_layout_meta = get_post_meta( $post->ID, 'business-eye-default-layout', true );
                if( false != $business_eye_single_sidebar_layout_meta ){
                   $business_eye_single_sidebar_layout = $business_eye_single_sidebar_layout_meta;
                }
                foreach ($business_eye_default_layout_options as $field) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="business-eye-default-layout"
                               value="<?php echo esc_attr( $field['value'] ); ?>"
                            <?php checked( $field['value'], $business_eye_single_sidebar_layout ); ?>/>
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_html_e('You can set up the sidebar content', 'business-eye' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e('here', 'business-eye' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_html_e('Featured Image Alignment', 'business-eye' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $business_eye_single_post_image_align_meta = get_post_meta( $post->ID, 'business-eye-single-post-image-align', true );
                if( false != $business_eye_single_post_image_align_meta ){
                    $business_eye_single_post_image_align = $business_eye_single_post_image_align_meta;
                }
                foreach ($business_eye_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="business-eye-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $business_eye_single_post_image_align ); ?>/>
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function business_eye_save_sidebar_layout( $post_id ) {
    global $post;
    // Verify the nonce before proceeding.
    if (
        ! ( isset( $_POST['business_eye_layout_options_nonce'] )
        && wp_verify_nonce( sanitize_key( $_POST['business_eye_layout_options_nonce'] ), basename( __FILE__ ) ) )
    ) {
        return;
    }
    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['business-eye-default-layout'])){
        $old = get_post_meta( $post_id, 'business-eye-default-layout', true);
        $new = sanitize_text_field($_POST['business-eye-default-layout']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'business-eye-default-layout', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'business-eye-default-layout', $old);
        }
    }

    /*image align*/
    if(isset($_POST['business-eye-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'business-eye-single-post-image-align', true);
        $new = sanitize_text_field($_POST['business-eye-single-post-image-align']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'business-eye-single-post-image-align', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'business-eye-single-post-image-align', $old);
        }
    }
}
add_action('save_post', 'business_eye_save_sidebar_layout');
