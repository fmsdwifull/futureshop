<?php
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-enable-breadcrumb'] = 1;

$business_eye_sections['business-eye-breadcrumb-options'] =
    array(
        'priority'       => 30,
        'title'          => esc_html__( 'Breadcrumb Options', 'business-eye' ),
        'panel'          => 'business-eye-theme-options',
    );

$business_eye_settings_controls['business-eye-enable-breadcrumb'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Breadcrumb', 'business-eye' ),
            'section'               => 'business-eye-breadcrumb-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );