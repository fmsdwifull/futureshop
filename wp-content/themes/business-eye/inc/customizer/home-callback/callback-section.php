<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values callback options*/
$business_eye_customizer_defaults['business-eye-callback-enable'] = 0;
$business_eye_customizer_defaults['business-eye-callback-page'] = 0;
$business_eye_customizer_defaults['business-eye-home-callback-single-words'] = 40;
$business_eye_customizer_defaults['business-eye-home-callback-remove-button'] = 1;
$business_eye_customizer_defaults['business-eye-home-callback-button-text'] = esc_html__('View More','business-eye');
$business_eye_customizer_defaults['business-eye-home-callback-button-link'] = '';
/* Feature section Enable settings*/
$business_eye_sections['business-eye-callback-options'] =
    array(
        'priority'       => 160,
        'title'          => esc_html__( 'Callback Section', 'business-eye' ),
    );

/*callback section enable control*/
$business_eye_settings_controls['business-eye-callback-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-callback-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable callback Section', 'business-eye' ),
            'description'           =>  esc_html__( 'Enable "callback Section" on checked', 'business-eye' ),
            'section'               => 'business-eye-callback-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


    /*creating setting control for business-eye-callback-page start*/
    $business_eye_settings_controls['business-eye-callback-page'] =
        array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-callback-page'],
                    ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Select Page For callback Section', 'business-eye' ),
                    'description'           => '',
                    'section'               => 'business-eye-callback-options',
                    'type'                  => 'dropdown-pages',
                    'priority'              => 20
                )
        );
        
    /*String in max to be appear as description on callback*/
    $business_eye_settings_controls['business-eye-home-callback-single-words'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-callback-single-words']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Number Of Words', 'business-eye' ),
                'description'           =>  esc_html__( 'Give number of words you wish to be appear on home page callback section', 'business-eye' ),
                'section'               => 'business-eye-callback-options',
                'type'                  => 'number',
                'input_attrs' => array( 'min' => 1, 'max' => 200),
                'priority'              => 20,
                'active_callback'       => ''
            )
        );

        $business_eye_settings_controls['business-eye-home-callback-remove-button'] =
            array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-home-callback-remove-button']
                ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Enable Button', 'business-eye' ),
                    'section'               => 'business-eye-callback-options',
                    'type'                  => 'checkbox',
                    'priority'              => 30,
                    'active_callback'       => ''
                )
            );
