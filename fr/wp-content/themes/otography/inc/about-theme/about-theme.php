<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package otography
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'otography_about' );
function otography_about() {    	
	add_theme_page( esc_html__('About Theme', 'otography'), esc_html__('About Theme', 'otography'), 'edit_theme_options', 'otography-about', 'otography_about_page');   
}

// CSS for About Theme Page
function otography_admin_theme_style() {
   wp_enqueue_style('otography-admin-style', get_template_directory_uri() . '/inc/about-theme/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'otography_admin_theme_style');

function otography_about_page() {
	$theme = wp_get_theme();

?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'otography' ), esc_html( $theme->Name ) ); ?>
				<?php esc_html_e('Version:','otography'); ?> <?php echo esc_html($theme['Version']);?></h3>
				<p>
					<?php esc_html_e('Otography is a minimal, elegant, clean, modern and bold WordPress photography theme for photographers, photo studios, wedding photographers, wildlife, portfolio, technology, graphic designers, personal portfolio, agency, magazines and event decorators. It can be used for bloggers who have travel and adventure blog, lifestyle food blog, fashion and Design blog and many other types of blogs where images can describe your story to attract visitors. It is responsive, cross-browser compatible, SEO ready and supports RTL letters. It is ready to promotion with social media icons to reach maximum target audience fast and easy. Full width slider impress your customers with lively eye-catching images right on your banner section.','otography'); ?>
				</p>
				<p>
				<?php /* translators: %s theme name */
					printf( esc_html__( '%s theme is the most Popular Free WordPress Photography, Blog, Portfolio theme. Please click the below button to display how your site looks like', 'otography' ), esc_html( $theme->Name ) );
				?></p>
				<p> &nbsp;</p>
				<a href="<?php echo esc_url('https://demo.themespiral.com/otography'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Free Demo', 'otography' ); ?></a><a href="<?php echo esc_url('https://demo.themespiral.com/otography-pro'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Pro Demo', 'otography' ); ?></a>
		</div>
		<div class="theme-tabs">
			<input type="radio" name="nav" id="one" checked="checked"/>
			<label for="one" class="tab-label"><?php esc_html_e('Getting Started?','otography');?></label>

			<input type="radio" name="nav" id="two"/>
			<label for="two" class="tab-label"><?php esc_html_e('Demo Importer','otography');?></label>

			<input type="radio" name="nav" id="three"/>
			<label for="three" class="tab-label"><?php esc_html_e('Support','otography');?></label>

			<input type="radio" name="nav" id="four"/>
			<label for="four" class="tab-label"><?php esc_html_e('Video Tutorials','otography');?></label>

			<input type="radio" name="nav" id="five"/>
			<label for="five" class="tab-label"><?php esc_html_e('Pro Features','otography');?></label>

			<article class="content one">
			    <h3><?php esc_html_e('About Documentation','otography');?></h3>
			    <p><?php esc_html_e('Documentation is the information that describes the product to its users. Our documentation covers only related to Free Themes and Pro Extension Plugins. It will guide your to develop your Website as we displayed in demo site without any others help.','otography');?></p>
			    <p>
					<a href="<?php echo esc_url('https://docs.themespiral.com/otography/');?>" target="_blank" class="button button-primary"><?php printf( esc_html__( '%s Documentation', 'otography' ), esc_html( $theme->Name ) ); ?></a>
				</p>
				<h3><?php esc_html_e('Theme Customizer','otography');?></h3>
			   <p><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'otography' ), esc_html( $theme->Name ) ); ?>
			   	<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Start Customizing','otography');?></a>
				</p>
				<h3><?php esc_html_e('F.A.Q (Frequently Asked Questions)','otography');?></h3>
			   <p><?php esc_html_e('Want to know more about Themes and Plugins developed by Theme Spiral? ','otography'); ?><a href="<?php echo esc_url('https://themespiral.com/f-a-q/');?>" class="button button-primary" target="_blank"><?php esc_html_e('F.A.Q','otography');?></a></p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content two">
			    <h3><?php esc_html_e('Demo Importer','otography');?></h3>
				<p>
					<?php esc_html_e( 'If your site have your own content then do not use this plugins. It will mess your site with dummy content. Is your site fresh? Install the Demo importer plugins and activate it.', 'otography' ); ?></p>
				<p><?php esc_html_e('Do you want to import Demo Data? ','otography'); ?></p>
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'otography' ); ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'otography' ); ?>
					</a>
				<?php } ?> &nbsp;&nbsp;
				<h3><?php esc_html_e('How to install Dummy Content ?','otography');?></h3>

				<p><?php esc_html_e(' Please install One Click Demo Import plugins. You can install it after activating otography theme. It is listed in recommended Plugins','otography'); ?></p>
				<ul>
					<li><?php esc_html_e('After plugin is activated, it asks you to upload  XML, WIE and  DAT dummy file','otography');?></li>
					<li><a href="https://themespiral.com/download/1365/" target="_blank"><?php esc_html_e('Download it from Here ','otography');?></a></li>
					<li><?php esc_html_e('Unzip otography-dummy-content.zip file. You can find all XML, WIE and  DAT dummy file','otography');?></li>
					<li><?php esc_html_e('Navigate to Appearance > Import Demo Data','otography');?> 
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?> <a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>"><?php esc_html_e('Upload','otography'); ?></a><?php } ?></li>
					<li><?php esc_html_e('Upload manually and Click on Import demo data.','otography');?></li>
					<li><?php esc_html_e('Now all your files and settings has been imported. Now you just need to setup your menu and social links','otography');?></li>
				</ul>
				<p><strong><?php esc_html_e('Setup Menu and Social Links:','otography');?> </strong></p>
				
				<ul>
					<li><?php esc_html_e('In the Blog Dashboard, select Appearance > Menus.','otography');?></li>
					<li><?php esc_html_e('Under the Menu Settings, located at the bottom of your screen, select Primary Menu/ Social Links','otography');?></li>
					<li><?php esc_html_e('Click save menu','otography');?></li>
				</ul>

				<p><strong><?php esc_html_e('Setup Home Page:','otography');?></strong></p>
				<ul>
					<li><?php esc_html_e('Navigate to Dashboard > Reading > Click on ( A static page ) from Your homepage displays','otography');?></li>
				
				<li><?php esc_html_e('Select Homepage as Home and Postpage as Blog','otography');?></li>
			</ul>
			<strong><p><?php esc_html_e('Sample of Demo Import Plugin is same for all themes. Although it does not belongs to this site but the process is same.','otography'); ?></p></strong>
				<a href="https://www.youtube.com/watch?v=PmoUGhFnMiw" class="button button-primary" style="text-decoration: none;" target="_blank">
						<?php esc_html_e( 'Watch Sample Demo Import Video', 'otography' ); ?></a>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content three">
			   <h3><?php esc_html_e('About Support','otography');?></h3>
				<p><?php esc_html_e('Need Help? Use our Forums if you have any Themes and Plugins related questions. Support will be provided only related to our Themes and Plugins','otography');?>
					<a href="<?php echo esc_url('https://themespiral.com/forums/'); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Forums','otography');?></a>
				</p>
				<h3><?php esc_html_e('Sales Questions','otography');?></h3>
				<p><?php esc_html_e('Do you have discussion relating to billing, your account or have pre-sales questions? Get touch with us!','otography');?>
					<a href="<?php echo esc_url('https://themespiral.com/contact-us/');?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact us','otography');?></a>
				</p>
			   <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content four">
			   <h3><?php esc_html_e('Video Tutorials','otography');?></h3>
				<h4> <?php esc_html_e('Setup Site Identity','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=ZR36mHWjPPs"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Site Identity', 'otography' ); ?></a>

				<h4> <?php esc_html_e('Setup Main Banner','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=0AnN9euqiF0"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=otography_main_banner_section')); ?>"></span><?php esc_html_e( 'Main Banner', 'otography' ); ?></a>

				<h4> <?php esc_html_e('Setup Social Icons','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=Q2QsNmyLgLY"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Social Icons', 'otography' ); ?></a>


				<h4> <?php esc_html_e('Setup Otography Template','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=ZL2JOwx2av0"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>

				<h4> <?php esc_html_e('Setup Color Schemes','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=s77pzYGdpAU"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=colors')); ?>"></span><?php esc_html_e( 'Color Schemes', 'otography' ); ?></a>

				<h4> <?php esc_html_e('Setup Primary Menu','otography'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=YDlBPvQzMTc"><?php esc_html_e( 'Watch Video', 'otography' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Primary Menu', 'otography' ); ?></a>
			</article>

			<article class="content five">
				 <h3><?php esc_html_e('Upgrade to Pro','otography');?></h3>
				 <p><?php esc_html_e('Want additional features? Pro extension plugin adds additinal features for free themes. ','otography')?><a href="<?php echo esc_url('https://themespiral.com/themes/otography');?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e('Upgrade to Pro','otography');?></a></p>
			   <h3><?php esc_html_e('Pro Features Extension','otography');?></h3>
				<div class="feature-content">
					<ul class="feature-text">
						<li><?php esc_html_e('Site Layout','otography'); ?></li>
						<li><?php esc_html_e('Single Sidebar Layout','otography'); ?></li>
						<li><?php esc_html_e('Flexible Content Width','otography'); ?></li>
						<li><?php esc_html_e('Sidebar Content Width','otography'); ?></li>
						<li><?php esc_html_e('Default Text Edit','otography'); ?></li>
						<li><?php esc_html_e('Choose Main Banner','otography'); ?></li>
						<li><?php esc_html_e('Main Banner Settings','otography'); ?></li>
						<li><?php esc_html_e('Excerpt Text edit','otography'); ?></li>
						<li><?php esc_html_e('Footer Layout','otography'); ?></li>
						<li><?php esc_html_e('Footer Edit','otography'); ?></li>
						<li><?php esc_html_e('Instagram Compatible','otography'); ?></li>
						<li><?php esc_html_e('Unlimited Color','otography'); ?></li>
						<li><?php esc_html_e('Font Color','otography'); ?></li>
						<li><?php esc_html_e('Background Color','otography'); ?></li>
						<li><?php esc_html_e('Font Size','otography'); ?></li>
						<li><?php esc_html_e('Font Family','otography'); ?></li>
						<li><?php esc_html_e('Footer Column 1/2/3/4','otography'); ?></li>
						<li><?php esc_html_e('Footer Edit options','otography'); ?></li>
						<li><?php esc_html_e('More Social Icons','otography'); ?></li>
						<li><?php esc_html_e('Change Featured Text in Sticky Post','otography'); ?></li>
						<li><?php esc_html_e('Grid Template','otography'); ?></li>
					</ul>
			    </div><!-- .feature-content -->
			</article>
		</div>
		<div class="pro-content">
			<div class="pro-content-wrap">
				<div class="pro-content-header">
					<h3><?php esc_html_e('Powerful Pro Extension Features','otography');?></h3>
					<p><?php esc_html_e('Get unlimited features using Pro extension. Purchase Otography Pro extension and get additional features and advanced customization options to make your website look awesome in different styles. ','otography'); ?></p>
				</div>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/free_vs_pro.png" alt="<?php esc_attr_e('Free vs Pro','otography');?>">
			</div>
		</div>
	</div>
</div>
<?php }