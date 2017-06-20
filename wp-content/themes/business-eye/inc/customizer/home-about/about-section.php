<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values about options*/
$business_eye_customizer_defaults['business-eye-home-about-enable'] = 0;
$business_eye_customizer_defaults['business-eye-home-about-page'] = 0;
$business_eye_customizer_defaults['business-eye-home-about-single-words'] = 80;
$business_eye_customizer_defaults['business-eye-home-about-button-text'] = esc_html__('Know More','business-eye');

/* Feature section Enable settings*/
$business_eye_sections['business-eye-home-about-section-settings'] =
    array(
        'priority'       => 155,
        'title'          => esc_html__( 'About Section', 'business-eye' ),
    );


/*About section enable control*/
$business_eye_settings_controls['business-eye-home-about-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-about-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable About Section', 'business-eye' ),
            'description'           =>  esc_html__( 'Enable "About Section" on checked', 'business-eye' ),
            'section'               => 'business-eye-home-about-section-settings',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/*creating setting control for business-eye-home-about-page start*/
$business_eye_repeated_settings_controls['business-eye-home-about-page'] =
    array(
        'repeated' => 1,
        'business-eye-about-pages-ids' => array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-about-page'],
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Select Page For About Section', 'business-eye' ),
                'description'           => '',
                'section'               => 'business-eye-home-about-section-settings',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        ),
        'business-eye-about-pages-divider' => array(
            'control' => array(
                'section'               => 'business-eye-about-selection-setting',
                'type'                  => 'message',
                'priority'              => 60,
                'description'           => '<br /><hr />'
            )
        )
    );

/*String in max to be appear as description on about*/
$business_eye_settings_controls['business-eye-home-about-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-about-single-words']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Number Of Words', 'business-eye' ),
            'description'           =>  esc_html__( 'Give number of words you wish to be appear on home page about section', 'business-eye' ),
            'section'               => 'business-eye-home-about-section-settings',
            'type'                  => 'number',
            'priority'              => 50,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );

/*About Button Text control*/
$business_eye_settings_controls['business-eye-home-about-button-text'] =
array(
    'setting' =>     array(
        'default'              => $business_eye_customizer_defaults['business-eye-home-about-button-text']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'About Section Button Text', 'business-eye' ),
        'section'               => 'business-eye-home-about-section-settings',
        'type'                  => 'text',
        'priority'              => 60,
        'active_callback'       => ''
    )
);

