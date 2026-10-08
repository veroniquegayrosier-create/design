<?php
/**
 * Otography Layout Optios
 *
 * @package otography
 */

/**
 * Displays custom theme posts in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Header Options

	// Padding in Header Image
	$wp_customize->add_setting( 'header_image_padding',
		array(
		'default'           => '100',
		'sanitize_callback' => 'otography_sanitize_positive_integer',
		)
	);
	$wp_customize->add_control( 'header_image_padding',
	array(
		'label'       => esc_html__( 'Header Image height', 'otography' ),
		'description' => esc_html__( 'Height in vh( Screen Percent )', 'otography' ),
		'section'     => 'header_image',
		'type'        => 'number',
		'priority'    => 1,
		'input_attrs' => array( 'min' => 1, 'max' => 200),
		)
	);