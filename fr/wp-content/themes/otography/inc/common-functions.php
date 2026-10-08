<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package otography
 */

//Excerpt More
function otography_excerpt_more( $link ) {

   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','otography'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<div class="read-more"><a href="%1$s" class="more-link">%2$s</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );

    return $link;
}

add_filter( 'excerpt_more', 'otography_excerpt_more' );

//Excerpt length
function otography_excerpt_length($length) {

    $excerpt_length = get_theme_mod('excerpt_length','15');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;

    return absint($length);
}
add_filter('excerpt_length', 'otography_excerpt_length');


// Site Info
function otography_site_info(){ ?>
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'otography' ) ); ?>">
<?php
/* translators: %s: CMS name, i.e. WordPress. */
printf( esc_html__( 'Proudly powered by %s', 'otography' ), 'WordPress' );
?>
</a>
<span class="sep"> | </span>
<?php
/* translators: 1: Theme name, 2: Theme author. */
printf( esc_html__( 'Theme: %1$s By %2$s.', 'otography' ), 'Otography <span class="sep"> | </span> ', '<a href="'.esc_url('https://themespiral.com/').'">ThemeSpiral.com</a>' );
}

add_action ('otography_footer_copyright_frontend','otography_site_info');
