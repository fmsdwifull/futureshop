<?php
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-enable-back-to-top'] = 1;

$business_eye_sections['business-eye-back-to-top-options'] =
    array(
        'priority'       => 80,
        'title'          => esc_html__( 'Back To Top Options', 'business-eye' ),
        'panel'          => 'business-eye-theme-options'
    );

$business_eye_settings_controls['business-eye-enable-back-to-top'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-enable-back-to-top'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Back To Top', 'business-eye' ),
            'section'               => 'business-eye-back-to-top-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );