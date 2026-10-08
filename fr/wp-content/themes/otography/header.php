<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package otography
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<?php 
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'otography' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="main-header" class="main-header">

			<?php

				/**
				* Header Image
				*/

				do_action ('otography_frontend_header_image'); 
			?>
				<div id="nav-sticker">
					<div class="navigation-top">
						<div class="wrap">
							<?php

								/**
								* Site Branding
								*/
								do_action ('otography_frontend_site_branding');

								/**
								 * Navigation Top
								 */
								do_action('otography_frontend_navigation_top'); ?>
						</div><!-- .wrap -->
					</div><!-- .navigation-top -->
				</div><!-- #nav-sticker -->
				<?php
				/**
				* Search Form
				*/
				do_action('otography_frontend_search_form');

				// Main Banner
				do_action ('otography_frontend_banner_display_type');

				/**
				* Social navigation
				*/

				do_action ('otography_frontend_social_navigation'); ?>	
		</div><!-- .main-header -->
	</header><!-- #masthead -->

	<?php if ( !is_page_template( 'template/otography-template.php' ) ) { ?>

	<div id="content" class="site-content">

	<?php } ?>