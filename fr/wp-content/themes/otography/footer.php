<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package otography
 */

?>
<?php
$go_top = get_theme_mod('disable-go-top','otography');

if (!is_page_template( 'template/otography-template.php' )) { ?>

	</div><!-- #content -->

<?php }
	
	/**
	 * Instagram Feed
	 */
	do_action('otography_frontend_instagram_feed'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php
			if ( !is_page_template( 'template/otography-template.php' ) ) {
				/**
				 * Footer settings and Options
				 */
				do_action ('otography_frontend_footer_settings'); 
			}
			?>

		<div class="copyright-area">
			<div class="wrap">
				<div class="site-info">
					<?php 

						/**
						 * Footer Copyright
						 */
						do_action ('otography_footer_copyright_frontend');
					?>
				</div><!-- .site-info -->
					<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) { ?>
							<div class="footer-right-info">
								<?php the_privacy_policy_link(); ?>
							</div>
						<?php }
					?>
			</div><!-- .wrap -->
		</div><!-- .copyright-area -->
	</footer><!-- #colophon -->
	<?php if( $go_top ==0 ) { ?>
		<button href="#" type="button" class="back-to-top"><i class="fa fa-angle-up"></i><?php esc_html_e('Go Top','otography'); ?></button>
	<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
