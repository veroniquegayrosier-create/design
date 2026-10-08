<?php
/**
 * Display Inline
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_add_inline_style
 *
 * wp_add_inline_style
 * @package otography
 */

function otography_styles_method() {
	$header_image_padding = get_theme_mod('header_image_padding','100');
	$disable_banner_text = get_theme_mod ('disable_banner_text',0);
	$custom_css='';

		if ( $header_image_padding !='100' ) { 
			$custom_css .= '
				.has-header-image .custom-header {
				height: '.absint($header_image_padding).'vh;
				}';
		}

		if ($disable_banner_text !=0) {
			$custom_css .= '
				.slide-text-content {
				display: none;
				}';
		}

	wp_add_inline_style( 'otography-style', wp_strip_all_tags($custom_css) );
}
add_action( 'wp_enqueue_scripts', 'otography_styles_method', 10 );

//Color Schemes
function otography_color_schemes(){
	$color_schemes = get_theme_mod ('color-schemes','#b68c70');

	if($color_schemes =='#b68c70'){
		return;
	}

	$custom_css ='
	/* link and Button ________________________ */
	a,
	.main-navigation ul li:hover > a,
	.main-navigation ul li.current-menu-item > a, 
	.main-navigation ul li.current_page_item > a, 
	.main-navigation ul li.current-menu-ancestor > a,
	.posts-navigation .nav-links .nav-previous,
	.posts-navigation .nav-links .nav-previous a,
	.posts-navigation .nav-links .nav-next,
	.posts-navigation .nav-links .nav-next a,
	.post-navigation .nav-links .nav-previous,
	.post-navigation .nav-links .nav-previous a,
	.post-navigation .nav-links .nav-next,
	.post-navigation .nav-links .nav-next a,
	.pagination .nav-links .page-numbers.current,
	.pagination .nav-links .page-numbers:hover,
	a.more-link,
	blockquote:before,
	.site-description,
	.social-links-menu li a:hover:before,
	.menu-social-links-container ul > li a:before,
	.entry-footer .entry-meta span:before,
	.slick-dots .slick-active button {
		color: %1$s;
	}


	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul.sub-menu,
	.main-navigation ul.children,
	.menu-social-links-container ul > li a:hover,
	.main-header .social-links-menu li:not(:last-child):after,
	.sticky-name,
	.slide-text-content .tag-links a,
	.back-to-top,
	.slick-dots li.slick-active:before,
	#bbpress-forums #bbp-search-form #bbp_search_submit {
		background-color: %1$s;
	}

	.main-navigation > ul > li:hover > a,
	.main-navigation > ul > li.current-menu-item > a, 
	.main-navigation > ul > li.current_page_item > a, 
	.main-navigation > ul > li.current-menu-ancestor > a {
		border-bottom-color: %1$s;
	}

	@media only screen and (max-width: 767px) {
	    .main-navigation ul>li:hover > .dropdown-toggle,
	    .main-navigation ul>li.current-menu-item .dropdown-toggle,
	    .main-navigation ul>li.current-menu-ancestor .dropdown-toggle {
	        background-color: %1$s;
	    }
	}

	.widget_search .search-submit,
	.post-page-search .search-submit {
		background-color: %1$s;
		border-color: %1$s;
	}

	/* Woocommerce ________________________ */
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt, 
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,
	.woocommerce span.onsale {
		background-color: %1$s;
	}

	.woocommerce div.product p.price, 
	.woocommerce div.product span.price,
	.woocommerce ul.products li.product .price {
		color: %1$s;
	}';

wp_add_inline_style( 'otography-style', sprintf( $custom_css, $color_schemes ) );

}
add_action( 'wp_enqueue_scripts', 'otography_color_schemes', 20 );