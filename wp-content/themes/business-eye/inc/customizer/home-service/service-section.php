<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-home-service-enable'] = 0;
$business_eye_customizer_defaults['business-eye-home-service-single-words'] = 30;
$business_eye_customizer_defaults['business-eye-home-service-button-text'] = esc_html__('Browse more services','business-eye');
$business_eye_customizer_defaults['business-eye-home-service-page-icon'] = 'fa-desktop';

$business_eye_customizer_defaults['business-eye-home-service-title'] = esc_html__('Our Services','business-eye');
$business_eye_customizer_defaults['business-eye-home-service-sub-title'] = esc_html__('Our Outstanding Offers','business-eye');

$business_eye_customizer_defaults['business-eye-home-service-button-link'] = '';
$business_eye_customizer_defaults['business-eye-home-service-selection'] = 'from-page';
$business_eye_customizer_defaults['business-eye-home-service-number'] = 3;
$business_eye_customizer_defaults['business-eye-home-service-pages'] = 0;

/*serviceoptions*/
$business_eye_sections['business-eye-home-service-options'] =
    array(
        'priority'       => 160,
        'title'          => esc_html__( 'Service Section', 'business-eye' ),
    );
   
    $business_eye_settings_controls['business-eye-home-service-enable'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-service-enable']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Enable Service', 'business-eye' ),
                'section'               => 'business-eye-home-service-options',
                'type'                  => 'checkbox',
                'priority'              => 10,
                'active_callback'       => ''
            )
        );

$business_eye_settings_controls['business-eye-home-service-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-service-single-words']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Number Of Words in Single Column Content', 'business-eye' ),
            'description'           =>  esc_html__( 'If you do not have selected from - Custom', 'business-eye' ),
            'section'               => 'business-eye-home-service-options',
            'type'                  => 'number',
            'priority'              => 30,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );


    $business_eye_settings_controls['business-eye-home-service-title'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-service-title']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Main Title', 'business-eye' ),
                'section'               => 'business-eye-home-service-options',
                'type'                  => 'text',
                'priority'              => 32,
                'active_callback'       => ''
            )
        );


    $business_eye_settings_controls['business-eye-home-service-sub-title'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-service-sub-title']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Sub Title', 'business-eye' ),
                'section'               => 'business-eye-home-service-options',
                'type'                  => 'text',
                'priority'              => 33,
                'active_callback'       => ''
            )
        );

    $business_eye_repeated_settings_controls['business-eye-home-service-options'] =
        array(
            'repeated' => 3,
            'business-eye-home-service-page-icon' => array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-home-service-page-icon'],
                ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Icon %s', 'business-eye' ),
                    'section'               => 'business-eye-home-service-options',
                    'type'                  => 'text',
                    'priority'              => 35,
                    'description'           => sprintf( esc_html__( 'Use font awesome icon: Eg: %1$s. %2$s See more here %3$s', 'business-eye' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
                )
            ),
            'business-eye-home-service-pages-ids' => array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-home-service-pages'],
                ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Select Page For Service %s', 'business-eye' ),
                    'section'               => 'business-eye-home-service-options',
                    'type'                  => 'dropdown-pages',
                    'priority'              => 35,
                    'description'           => ''
                )
            ),
            'business-eye-home-service-options-divider' => array(
                'control' => array(
                    'section'               => 'business-eye-home-service-options',
                    'type'                  => 'message',
                    'priority'              => 35,
                    'description'           => '<br /><hr />'
                )
            )
        );

$business_eye_settings_controls['business-eye-home-service-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-service-button-text']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Button Text', 'business-eye' ),
            'section'               => 'business-eye-home-service-options',
            'type'                  => 'text',
            'priority'              => 40,
            'active_callback'       => ''
        )
    );

$business_eye_settings_controls['business-eye-home-service-button-link'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-service-button-link']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Button Link URL', 'business-eye' ),
            'section'               => 'business-eye-home-service-options',
            'type'                  => 'url',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );