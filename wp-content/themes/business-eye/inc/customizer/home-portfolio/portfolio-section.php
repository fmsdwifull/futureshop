<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-home-portfolio-title'] = esc_html__('Our Portfolio','business-eye');
$business_eye_customizer_defaults['business-eye-home-portfolio-sub-title'] = esc_html__('The way we have created.','business-eye');
$business_eye_customizer_defaults['business-eye-home-portfolio-number'] = 9;
$business_eye_customizer_defaults['business-eye-home-portfolio-category'] = 0;
$business_eye_customizer_defaults['business-eye-home-portfolio-enable'] = 0;
$business_eye_customizer_defaults['business-eye-home-portfolio-button-text'] = esc_html__('Browse more','business-eye');
$business_eye_customizer_defaults['business-eye-home-portfolio-button-link'] = '';
/*aboutoptions*/
$business_eye_sections['business-eye-home-portfolio-options'] =
    array(
        'priority'       => 165,
        'title'          => esc_html__( 'Portfolio Section', 'business-eye' ),
    );


$business_eye_settings_controls['business-eye-home-portfolio-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Portfolio', 'business-eye' ),
            'description'           => esc_html__( 'Enable Portfolio Section" on checked' , 'business-eye' ),
            'section'               => 'business-eye-home-portfolio-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$business_eye_settings_controls['business-eye-home-portfolio-title'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-title']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Main Title', 'business-eye' ),
            'description'           =>  esc_html__( 'Enable "portfolio Section" on checked', 'business-eye' ),
            'section'               => 'business-eye-home-portfolio-options',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$business_eye_settings_controls['business-eye-home-portfolio-sub-title'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-sub-title']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Sub Title', 'business-eye' ),
            'section'               => 'business-eye-home-portfolio-options',
            'type'                  => 'text',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );


    $business_eye_settings_controls['business-eye-home-portfolio-category'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-category']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Select Category For Portfolio', 'business-eye' ),
                'description'           =>  esc_html__( 'Portfolio will only displayed from this category', 'business-eye' ),
                'section'               => 'business-eye-home-portfolio-options',
                'type'                  => 'category_dropdown',
                'priority'              => 60,
                'active_callback'       => ''
            )
        );

        $business_eye_settings_controls['business-eye-home-portfolio-button-text'] =
            array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-button-text']
                ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Browse All Button Text', 'business-eye' ),
                    'section'               => 'business-eye-home-portfolio-options',
                    'type'                  => 'text',
                    'priority'              => 70,
                    'active_callback'       => ''
                )
            );

        $business_eye_settings_controls['business-eye-home-portfolio-button-link'] =
            array(
                'setting' =>     array(
                    'default'              => $business_eye_customizer_defaults['business-eye-home-portfolio-button-link']
                ),
                'control' => array(
                    'label'                 =>  esc_html__( 'Browse All Button Link', 'business-eye' ),
                    'section'               => 'business-eye-home-portfolio-options',
                    'type'                  => 'url',
                    'priority'              => 80,
                    'active_callback'       => ''
                )
            );