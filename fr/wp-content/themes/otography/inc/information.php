<?php
/**
 * Information about theme
 *
 * @link https://jetpack.com/
 *
 * @package otography
 */

/*
** Notice after Theme Activation and Update.
*/
function otography_activation_notice() {

	global $current_user;
  	$current_user_id   = $current_user->ID;
	$theme_data	 = wp_get_theme();

	if ( !get_user_meta( $current_user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ) ) { ?>
		<div class="notice otography-dismiss">
		<?php
	
		echo '<h1>';
			/* translators: %s theme name */
			printf( esc_html__( 'Welcome to %s', 'otography' ), esc_html( $theme_data->Name ) );
		echo '</h1>';

		echo '<p>';
			/* translators: %1$s: theme name, %2$s link */
			printf( __( 'Thank you for choosing %1$s! To fully take advantage of our best theme, make sure you visit Welcome page', 'otography' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=otography-about' ) ) );
			printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore=0' );
		echo '</p>';

		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=otography-about' ) ) .'" class="button button-primary button-hero">';
			/* translators: %s theme name */
			printf( esc_html__( 'Get started with %s', 'otography' ), esc_html( $theme_data->Name ) );
		echo '</a></p>';

		echo '</div>';
	}

}