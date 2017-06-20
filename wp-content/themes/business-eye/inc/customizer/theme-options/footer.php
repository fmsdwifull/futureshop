<?php
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-copyright-text'] = esc_html__('All right reserved','business-eye');

$business_eye_sections['business-eye-footer-options'] =
    array(
        'priority'       => 60,
        'title'          => esc_html__( 'Footer Options', 'business-eye' ),
        'panel'          => 'business-eye-theme-options'
    );


$business_eye_settings_controls['business-eye-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Copyright Text', 'business-eye' ),
            'section'               => 'business-eye-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );
