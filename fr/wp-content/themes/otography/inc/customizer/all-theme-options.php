<?php
/**
 * Otography All theme Options
 *
 * @package otography
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Front Page Category (List of categories to hide from home page)

    $frontpage_cat_lists = otography_frontpage_cat_list();

    $wp_customize->add_setting(
        'front_page_categories',
        array(
            'default'           => '',
            'sanitize_callback' => 'otography_sanitize_multi_checkbox'
        )
    );

    $wp_customize->add_control(
        new Otography_Customize_Multiple_Checkboxes_Control(
            $wp_customize,
            'front_page_categories',
            array(
                'section' => 'otography_all_theme_options',
                'label'   => __( 'Front/ Home page posts categories', 'otography' ),
                'description' => __('Selected category display on front/ home page. If not selected, all post will be displayed','otography'),
                'choices' => $frontpage_cat_lists,
                'priority'    => 10,
            )
        )
    );

    // Disable Blog Options
    $wp_customize->add_setting('main-title', array(
            'type'              => 'main-title-control',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Otography_title_display( $wp_customize, 'eup-1', array(
            'priority' => 100,
            'label' => __('Disable Blog/ Single Options', 'otography'),
            'section' => 'otography_all_theme_options',
            'settings' => 'main-title',
        ) )
    );

    $wp_customize->add_setting( 'disable-author', array(
        'default' => 0,
        'sanitize_callback' => 'otography_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-author', array(
        'priority'=>110,
        'label' => __('Disable Author', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-date', array(
        'default' => 0,
        'sanitize_callback' => 'otography_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-date', array(
        'priority'=>120,
        'label' => __('Disable Date', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-cateogry', array(
        'default' => 0,
        'sanitize_callback' => 'otography_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-cateogry', array(
        'priority'=>130,
        'label' => __('Disable Category', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-comments', array(
        'default' => 0,
        'sanitize_callback' => 'otography_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-comments', array(
        'priority'=>140,
        'label' => __('Disable Comments', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'checkbox',
    ));

    //Select Theme Layout
    $wp_customize->add_setting( 'select-layout', array(
        'default' => 'full-width',
        'sanitize_callback' => 'otography_sanitize_select',
    ));
    $wp_customize->add_control( 'select-layout', array(
        'priority'=>200,
        'label' => __('Select Sidebar Layout', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'right' => __( 'Right Sidebar','otography' ),
            'left' => __( 'Left Sidebar','otography' ),
            'full-width' => __( 'Default Fullwidth','otography' ),
        ),
    ));

     // Disable Blog Options
    $wp_customize->add_setting('main-title', array(
        'type'              => 'main-title-control',
        'sanitize_callback' => 'sanitize_text_field',            
    ));
    $wp_customize->add_control( new Otography_title_display( $wp_customize, 'otography-12', array(
        'priority' => 250,
        'label' => __('Sticky Menu', 'otography'),
        'section' => 'otography_all_theme_options',
        'settings' => 'main-title',
    ) ) );

    $wp_customize->add_setting( 'enable_sticky_menu', array(
        'default' => 1,
        'sanitize_callback' => 'otography_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'enable_sticky_menu', array(
        'priority'=>270,
        'label' => __('Enable Sticky Menu', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'post-pagination', array(
        'default' => 'numeric',
        'sanitize_callback' => 'otography_sanitize_select',
    ));
    $wp_customize->add_control( 'post-pagination', array(
        'priority'=>280,
        'label' => __('Post Pagination', 'otography'),
        'section' => 'otography_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'default' => __( 'Default','otography' ),
            'numeric' => __( 'Numeric','otography' ),
        ),
    ));
