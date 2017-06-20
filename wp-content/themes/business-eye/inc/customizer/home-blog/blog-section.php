<?php
global $business_eye_panels;
global $business_eye_sections;
global $business_eye_settings_controls;
global $business_eye_repeated_settings_controls;
global $business_eye_customizer_defaults;

/*defaults values*/
$business_eye_customizer_defaults['business-eye-home-blog-enable'] = 0;
$business_eye_customizer_defaults['business-eye-home-blog-title'] = esc_html__('FROM OUR BLOG','business-eye');
$business_eye_customizer_defaults['business-eye-home-blog-sub-title'] = esc_html__('Stay update with us','business-eye');
$business_eye_customizer_defaults['business-eye-home-blog-single-words'] = 30;
$business_eye_customizer_defaults['business-eye-home-blog-category'] = 0;
$business_eye_customizer_defaults['business-eye-home-blog-button-text'] = esc_html__('Browse more','business-eye');
$business_eye_customizer_defaults['business-eye-home-blog-button-link'] = '';

/*blogoptions*/
$business_eye_sections['business-eye-home-blog-options'] =
    array(
        'priority'       => 180,
        'title'          => esc_html__( 'Blog Section', 'business-eye' ),
    );

$business_eye_settings_controls['business-eye-home-blog-enable'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-blog-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Blog', 'business-eye' ),
            'description'           => esc_html__( 'Enable "Blog Section" on checked' , 'business-eye' ),
            'section'               => 'business-eye-home-blog-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
$business_eye_settings_controls['business-eye-home-blog-title'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-blog-title']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Main Title', 'business-eye' ),
            'section'               => 'business-eye-home-blog-options',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$business_eye_settings_controls['business-eye-home-blog-sub-title'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-blog-sub-title']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Sub Title', 'business-eye' ),
            'section'               => 'business-eye-home-blog-options',
            'type'                  => 'text',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );


    /*String in max to be appear as description on blog*/
    $business_eye_settings_controls['business-eye-home-blog-single-words'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-blog-single-words']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Number Of Words', 'business-eye' ),
                'description'           =>  esc_html__( 'Give number of words you wish to be appear on home page blog section sticky post/ feature post', 'business-eye' ),
                'section'               => 'business-eye-home-blog-options',
                'type'                  => 'number',
                'priority'              => 40,
                'input_attrs' => array( 'min' => 1, 'max' => 200),
                'active_callback'       => ''
            )
        );

/*creating setting control for business-eye-fs-Category start*/
$business_eye_settings_controls['business-eye-home-blog-category'] =
    array(
        'setting' =>     array(
            'default'              => $business_eye_customizer_defaults['business-eye-home-blog-category']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Select Category For Blog', 'business-eye' ),
            'description'           =>  esc_html__( 'Blog will only displayed from this category', 'business-eye' ),
            'section'               => 'business-eye-home-blog-options',
            'type'                  => 'category_dropdown',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );
    
    $business_eye_settings_controls['business-eye-home-blog-button-text'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-blog-button-text']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Browse All Button Text', 'business-eye' ),
                'section'               => 'business-eye-home-blog-options',
                'type'                  => 'text',
                'priority'              => 60,
                'active_callback'       => ''
            )
        );

    $business_eye_settings_controls['business-eye-home-blog-button-link'] =
        array(
            'setting' =>     array(
                'default'              => $business_eye_customizer_defaults['business-eye-home-blog-button-link']
            ),
            'control' => array(
                'label'                 =>  esc_html__( 'Browse All Button Link', 'business-eye' ),
                'section'               => 'business-eye-home-blog-options',
                'type'                  => 'url',
                'priority'              => 70,
                'active_callback'       => ''
            )
        );