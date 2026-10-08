<?php
/**
 * Otography Main Banner
 *
 * @package otography
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
    // Main Banner
    $wp_customize->add_setting( 'select_main_banner_category', array(
        'default' => '',
        'sanitize_callback' => 'otography_sanitize_select',
    ));
    $wp_customize->add_control( 'select_main_banner_category', array(
        'priority'=>10,
        'label' => __('Select Main Banner', 'otography'),
        'section' => 'otography_main_banner_section',
        'type' => 'select',
        'choices'   =>  otography_cat_list()
    ));

    $wp_customize->add_setting( 'banner_button_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'banner_button_text', array(
        'priority'=>30,
        'label' => __('Button Text', 'otography'),
        'section' => 'otography_main_banner_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting( 'banner_button_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'banner_button_url', array(
        'priority'=>40,
        'label' => __('Button Url', 'otography'),
        'section' => 'otography_main_banner_section',
        'type' => 'text',
    ));