<?php
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-enable-static-page'] = 1;
$business_eye_customizer_defaults['business-eye-default-layout'] = 'right-sidebar';
$business_eye_customizer_defaults['business-eye-archive-layout'] = 'thumbnail-and-excerpt';
$business_eye_customizer_defaults['business-eye-archive-image-align'] = 'full';
$business_eye_customizer_defaults['business-eye-number-of-words'] = 30;
$business_eye_customizer_defaults['business-eye-single-post-image-align'] = 'full';
$business_eye_customizer_defaults['business-eye-single-post-image'] = '';



$business_eye_sections['business-eye-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => esc_html__( 'Layout Options', 'business-eye' ),
        'panel'          => 'business-eye-theme-options',
    );

/*home page static page display*/
$business_eye_settings_controls['business-eye-enable-static-page'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-enable-static-page'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Static Front Page', 'business-eye' ),
            'description'           =>  __( 'If you disable this the static page will be disappera form the home page and other section from customizer will reamin as it is', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );


/*layout-options option responsive lodader start*/
$business_eye_settings_controls['business-eye-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-default-layout'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Default Layout', 'business-eye' ),
            'description'           =>  esc_html__( 'Layout for all archives, single posts and pages', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'business-eye' ),
                'left-sidebar' => esc_html__( 'Primary Sidebar - Content', 'business-eye' ),
                'no-sidebar' => esc_html__( 'No Sidebar', 'business-eye' )
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );


$business_eye_settings_controls['business-eye-archive-layout'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-archive-layout'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Archive Layout', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'excerpt-only' => esc_html__( 'Excerpt Only', 'business-eye' ),
                'thumbnail-and-excerpt' => esc_html__( 'Thumbnail and Excerpt', 'business-eye' ),
            ),
            'priority'              => 34,
        )
    );


$business_eye_settings_controls['business-eye-archive-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-archive-image-align'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Archive Image Alignment', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => esc_html__( 'Full', 'business-eye' ),
                'right' => esc_html__( 'Right', 'business-eye' ),
            ),
            'priority'              => 35,
            'description'              => esc_html__('This option only work if you have selected "Thumbnail and Excerpt" or "Thumbnail and Full Post" in Archive Layout options','business-eye'),
        )
    );

$business_eye_settings_controls['business-eye-number-of-words'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-number-of-words']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Number Of Words For Excerpt', 'business-eye' ),
            'description'           =>  esc_html__( 'This will controll the excerpt length on listing page', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );


$business_eye_settings_controls['business-eye-single-post-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-single-post-image-align'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Alignment Of Image In Single Post/Page', 'business-eye' ),
            'section'               => 'business-eye-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => esc_html__( 'Full', 'business-eye' ),
                'right' => esc_html__( 'Right', 'business-eye' ),
                'left' => esc_html__( 'Left', 'business-eye' ),
                'no-image' => esc_html__( 'No image', 'business-eye' )
            ),
            'priority'              => 50,
            'description'           =>  esc_html__( 'Please note that this setting can be override from individual post/page', 'business-eye' ),
        )
    );