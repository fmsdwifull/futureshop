<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values search options*/
$business_eye_customizer_defaults['business-eye-search-enable'] = 1;


/*fs search enable setting*/
$business_eye_sections['business-eye-search-enable-setting'] =
    array(
        'priority'       => 90,
        'title'          => esc_html__( 'Search Options', 'business-eye' ),
        'panel'          => 'business-eye-theme-options',
    );

/*fs search enable controlls*/
$business_eye_settings_controls['business-eye-search-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-search-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Search', 'business-eye' ),
            'section'               => 'business-eye-search-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
