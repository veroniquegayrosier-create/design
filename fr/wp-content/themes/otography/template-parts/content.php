<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package otography
 */

?>
<?php 
$disable_category = get_theme_mod('disable-cateogry',0);
$disable_date = get_theme_mod('disable-date',0);
$disable_author = get_theme_mod('disable-author',0);
$disable_comments = get_theme_mod('disable-comments',0);
$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'otography' ) );
$excerpt_display = get_theme_mod('excerpt-display','excerpt-display');
$sticky_text = get_theme_mod ('sticky_text',esc_html__('Featured','otography'));
$custom_blog_theme_column = get_theme_mod ('custom-blog-theme-column','three');
?>
<?php if ( ! is_single () ) { ?>
<div class="column  col-<?php echo esc_attr($custom_blog_theme_column);?>">
<?php } ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
		$disable_featured_image_single = get_theme_mod('disable_featured_image_single',0);
		if (! is_single() || ($disable_featured_image_single ==0 && is_single() ) ):

			otography_post_thumbnail();

		endif;

		if ( is_sticky() ) { ?>
			<div class="sticky-post-tag">
				<span class="sticky-name"><?php echo esc_html($sticky_text); ?></span>
	   	</div>
		<?php } ?>

		<div class="entry-content-holder">

			<header class="entry-header">
			<?php
			$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','otography'));
			

			if ( 'post' === get_post_type() ) :

				if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

				if( $disable_date ==0 || $disable_author ==0 ){ ?>
				<div class="entry-meta">
					<?php
					if($disable_author ==0){
						otography_posted_by();
					}
					if($disable_date ==0){
						otography_posted_on();
					}
					?>
				</div><!-- .entry-meta -->
				<?php } 

			 endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				if(is_single()){
					the_content();
				} else {
					if($excerpt_display == 'full-content'){
						the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							$excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
					} else {
						the_excerpt();
					}
				}
				

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'otography' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
			<?php if( $disable_comments ==0 || $disable_category ==0 ) { ?>
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php
					if($disable_category ==0) {

						otography_cat_lists ();

					}

					if(!empty($tags_list) ) {

							otography_tag_lists();

					}

					if( $disable_comments ==0 ) {

						otography_comment_links();

					}

					?>
				</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
		</div><!-- .entry-content-holder -->
				
		<?php } ?>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php if (! is_single () ) { ?>
</div><!-- .column -->
<?php } ?>
