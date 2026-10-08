<?php
/**
 * Template part for displaying results in search pages
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
$custom_blog_theme_column = get_theme_mod ('custom-blog-theme-column','three');

?>
<div class="column  col-<?php echo esc_attr($custom_blog_theme_column);?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php otography_post_thumbnail(); ?>
		<div class="entry-content-holder">
			<header class="entry-header">
				<?php

				if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

				if( $disable_date ==0 || $disable_author ==0 ){ ?>
				<div class="entry-meta">
					<?php
					if($disable_date ==0){
						otography_posted_by();
					}
					if($disable_date ==0){
						otography_posted_on();
					}
					?>
				</div><!-- .entry-meta -->
				<?php } ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
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
</div><!-- .column -->
