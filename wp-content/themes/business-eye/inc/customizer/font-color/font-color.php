<?php

global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;


/*Default color*/
$business_eye_sections['colors'] =
    array(
        'priority'       => 40,
        'title'          => esc_html__( 'Basic Colors Options', 'business-eye' ),
    );

$business_eye_customizer_defaults['business-eye-primary-color'] = '#fc6e51';
$business_eye_customizer_defaults['business-eye-site-identity-color'] = '#060606';



$business_eye_settings_controls['business-eye-primary-color'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-primary-color'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Primary Color', 'business-eye' ),
            'description'           =>  esc_html__( 'will change the primary color default is #fc6e51', 'business-eye' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


$business_eye_settings_controls['business-eye-site-identity-color'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-site-identity-color'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Site identity Color', 'business-eye' ),
            'description'           =>  esc_html__( 'will change the site identity color default is #060606', 'business-eye' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 5,
            'active_callback'       => ''
        )
    );
