<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values feature portfolio options*/
$business_eye_customizer_defaults['business-eye-feature-slider-enable'] = 0;
$business_eye_customizer_defaults['business-eye-featured-slider-pages'] = 0;
$business_eye_customizer_defaults['business-eye-featured-slider-number'] = 3;
$business_eye_customizer_defaults['business-eye-featured-slider-selection'] = 'from-page';
$business_eye_customizer_defaults['business-eye-fs-single-words'] = 30;
$business_eye_customizer_defaults['business-eye-fs-slider-mode'] = 'fadeout';
$business_eye_customizer_defaults['business-eye-fs-slider-time'] = 2;
$business_eye_customizer_defaults['business-eye-fs-slider-pause-time'] = 5;
$business_eye_customizer_defaults['business-eye-fs-enable-arrow'] = 0;
$business_eye_customizer_defaults['business-eye-fs-enable-pager'] = 1;
$business_eye_customizer_defaults['business-eye-fs-enable-autoplay'] = 1;
$business_eye_customizer_defaults['business-eye-fs-enable-title'] = 1;
$business_eye_customizer_defaults['business-eye-fs-enable-caption'] = 1;
$business_eye_customizer_defaults['business-eye-fs-button-text'] = esc_html__('View More','business-eye');

/*feature slider enable setting*/
$business_eye_sections['business-eye-feature-section-setting'] =
    array(
        'priority'       => 150,
        'title'          => esc_html__( 'Slider Section', 'business-eye' ),
    );

/*Feature section enable control*/
$business_eye_settings_controls['business-eye-feature-slider-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-feature-slider-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Feature Slider', 'business-eye' ),
            'section'               => 'business-eye-feature-section-setting',
        	'description'    		=> esc_html__( 'Enable "Feature slider" on checked' , 'business-eye' ),
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );



/*No of feature slider selection*/
$business_eye_settings_controls['business-eye-featured-slider-number'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-featured-slider-number']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Number Of Slider', 'business-eye' ),
            'section'               => 'business-eye-feature-section-setting',
            'type'                  => 'select',
            'choices'               => array(
                1 => esc_html__( '1', 'business-eye' ),
                2 => esc_html__( '2', 'business-eye' ),
                3 => esc_html__( '3', 'business-eye' )
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

/*creating setting control for business-eye-fs-page start*/
$business_eye_repeated_settings_controls['business-eye-featured-slider-pages'] =
    array(
        'repeated' => 3,
        'business-eye-fs-pages-ids' => array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-featured-slider-pages'],
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Select Page For Slide %s', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'dropdown-pages',
                'priority'              => 30,
                'description'           => ''
            )
        ),
        'business-eye-fs-pages-divider' => array(
            'control' => array(
                'section'               => 'business-eye-fs-selection-setting',
                'type'                  => 'message',
                'priority'              => 30,
                'description'           => '<br /><hr />'
            )
        )
    );

    $business_eye_settings_controls['business-eye-fs-single-words'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-fs-single-words']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Single Slider- Number Of Words', 'business-eye' ),
                'description'           =>  esc_html__( 'If you do not have selected from - Custom', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'number',
                'priority'              => 40,
                'active_callback'       => '',
                'input_attrs' => array( 'min' => 1, 'max' => 200),
            )
        );

    $business_eye_settings_controls['business-eye-fs-slider-mode'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-fs-slider-mode']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Slider Mode', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'select',
                'choices'               => array(
                    'scrollHorz' => esc_html__( 'Default', 'business-eye' ),
                    'fade' => esc_html__( 'Fade', 'business-eye' ),
                    'fadeout' => esc_html__( 'Fade-Out', 'business-eye' )
                ),
                'priority'              => 45,
                'active_callback'       => ''
            )
        );

    $business_eye_settings_controls['business-eye-fs-enable-arrow'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-fs-enable-arrow']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Enable Arrow', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'checkbox',
                'priority'              => 50,
                'active_callback'       => ''
            )
        );

    $business_eye_settings_controls['business-eye-fs-enable-pager'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-fs-enable-pager']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Enable Pager', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'checkbox',
                'priority'              => 55,
                'active_callback'       => ''
            )
        );


    $business_eye_settings_controls['business-eye-fs-button-text'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-fs-button-text']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Slider Button Text', 'business-eye' ),
                'section'               => 'business-eye-feature-section-setting',
                'type'                  => 'text',
                'priority'              => 55,
                'active_callback'       => ''
            )
        );
