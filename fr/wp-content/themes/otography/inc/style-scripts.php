<?php
 /**
 * Enqueue scripts and styles.
 *
 * @package otography
 */

function otography_scripts() {
	$select_main_banner_category = get_theme_mod('select_main_banner_category','');
	$slider_options = get_theme_mod('slider-options','main-banner');
	$disable_main_banner = get_theme_mod('disable_main_banner',0);
	$enable_sticky_menu = get_theme_mod('enable_sticky_menu',1);
	wp_enqueue_style( 'otography-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'otography-google-fonts', otography_fonts_url(), array(), null );

	wp_enqueue_script('otography-global', get_template_directory_uri().'/assets/js/global.js', array('jquery'), true, false);

	wp_enqueue_script( 'otography-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), false, true );

	wp_enqueue_script( 'otography-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/library/sticky-sidebar/ResizeSensor.js', array(), false, true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.js', array(), false, true );

	if ($slider_options =='main-banner'){

		if($disable_main_banner !=1 && $select_main_banner_category !=''){

			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array(), false, true );

			wp_enqueue_script( 'otography-slick-settings', get_template_directory_uri() . '/assets/library/slick/slick-settings.js', array(), false, true );
		}

	}

	if($enable_sticky_menu ==1 ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/library/sticky/jquery.sticky.js', array(), false, true );
		wp_enqueue_script( 'otography-sticky-settings', get_template_directory_uri() . '/assets/library/sticky/sticky-setting.js', array(), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'otography_scripts' );

function otography_admin_notice (){

  wp_enqueue_style( 'otography-admin-css', get_template_directory_uri() . '/css/admin/admin.css' );

}

add_action( 'admin_enqueue_scripts', 'otography_admin_notice' );

if ( ! function_exists( 'otography_fonts_url' ) ) :
/**
 * Register Google fonts for Otography.
 *
 * Create your own otography_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function otography_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by IBM Plex Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'IBM Plex Sans font: on or off', 'otography' ) ) {
		$fonts[] = 'IBM Plex Sans';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;