<?php
/**
 * Theme Functions which enhance the theme by hooking into WordPress
 *
 * @package otography
 */


// Navigation Top
function otography_navigation_top(){
$disable_search_form = get_theme_mod('disable_search_form',0);
if(has_nav_menu('menu-1')){ ?>
    <div id="site-header-menu" class="site-header-menu">
        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu','otography'); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="toggle-text"><?php _e('Menu','otography'); ?></span>
                <span class="toggle-bar"></span>
            </button>
            <?php
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
            ) ); ?>
        </nav><!-- #site-navigation -->
    </div>
<?php }

 if($disable_search_form ==0) { ?>

       <button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','otography'); ?></span></span></button>

    <?php }
}

add_action('otography_frontend_navigation_top','otography_navigation_top');

// Search Form 
function otography_search_form(){
    $search_text = get_theme_mod('search_text',esc_html__('Search','otography')); ?>
<div class="search-container">
    <button class="close-search"><span></span></button>
    <form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
         <label class="screen-reader-text"><?php echo esc_html($search_text); ?></label>
            <input class="search-field" placeholder="<?php echo esc_attr($search_text).'&hellip;'; ?>" name="s" type="search"> 
            <input class="search-submit" value="<?php echo esc_attr($search_text); ?>" type="submit">
    </form>
</div><!-- .search-container -->
    
<?php }
add_action('otography_frontend_search_form','otography_search_form');

// Social Navigation
function otography_social_navigation(){ ?>
    <nav class="social-navigation" aria-label="<?php esc_html_e('Social','otography');?>" role="navigation">
        <?php
        if(has_nav_menu('menu-2')){
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-2',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul class="social-links-menu">%3$s</ul>',
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
            ) );
        } ?>
    </nav><!-- .social-navigation -->

<?php }

add_action('otography_frontend_social_navigation','otography_social_navigation');

// Site Branding
function otography_site_branding(){ ?>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
        <div class="site-branding-text">

            <?php if ( (is_front_page() || is_front_page() && is_home() ) ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $otography_description = get_bloginfo( 'description', 'display' );
            if ( $otography_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $otography_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div><!-- .site-branding-text -->
    </div><!-- .site-branding -->

<?php }

add_action('otography_frontend_site_branding','otography_site_branding');

// Main Banner
function otography_main_banner(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$remove_banner_link = get_theme_mod('remove_banner_link',0);
$no_of_main_banner = get_theme_mod('no_of_main_banner','5');
$slider_options = get_theme_mod('slider-options','main-banner');
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','otography'));
$banner_button_text = get_theme_mod ('banner_button_text','');
$banner_button_url = get_theme_mod ('banner_button_url','');
$query = new WP_Query(array(
    'posts_per_page' =>  intval($no_of_main_banner),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_main_banner_category),
));
if(!is_paged()){
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
        <div class="main-banner"> 
            <div class="banner-wrap">
                <div class="banner-list">
                    <?php 
                    if($slider_options == 'metaslider' || $slider_options == 'smartslider' || $slider_options == 'masterslider'){
                        do_action('otography_frontend_plugins_slider');
                    } else {
                        while ($query->have_posts()):$query->the_post();
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'otography' ) ); ?>
                            <div class="slide">
                                <div class="slide-content">
                                     <?php if(has_post_thumbnail()){ ?>
                                    <div class="slide-thumb">
                                        <?php if($remove_banner_link ==0){ ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
                                        <?php }
                                                the_post_thumbnail();
                                            if($remove_banner_link ==0){ ?>
                                            </a>
                                        <?php } ?>
                                    </div><!-- .slide-thumb -->
                                    <?php } ?>
                                    <div class="slide-text-wrap">
                                        <div class="slide-text-content">
                                         <?php
                                          if ( $tags_list ) { ?>
                                            <div class="entry-tag">
                                                <?php otography_tag_lists (); ?>
                                            </div>
                                        <?php }

                                        if($remove_banner_link ==0){ ?>
                                            <h2 class="slide-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                        <?php } else { ?>
                                            <h2 class="slide-title"><?php the_title(); ?></h2>
                                         <?php } ?>
                                            <div class="slide-text">
                                                <?php the_content( sprintf(
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
                                                    ) );?>
                                            </div><!-- .slider-text -->
                                        </div><!-- .slide-text-content -->
                                    </div><!-- .slide-text-wrap -->
                                </div><!-- .slide-content -->
                            </div><!-- .slide -->
                        <?php endwhile;
                        wp_reset_postdata();
                    } ?>
                </div><!-- .banner-list -->
                <?php if($banner_button_text  !='') { ?>

                <div class="banner-button-link">
                    <a href="<?php echo esc_url ( $banner_button_url ); ?>"><i class="fa fa-angle-up"></i><?php echo esc_html ( $banner_button_text ); ?><i class="fa fa-angle-down"></i></a>
                </div>

            <?php } ?>
            </div><!-- .banner-wrap -->
        </div><!-- .main-banner -->
        <?php }
    }
} ?>

<?php }

add_action('otography_frontend_main_banner','otography_main_banner');

function otography_header_image(){
    if ( has_header_image() && ( !is_page_template( 'template/otography-template.php' ) ) ) { ?>
            <div class="custom-header">
                    <div class="custom-header-media">
                        <?php the_custom_header_markup(); ?>
                    </div><!-- .custom-header-media -->
            </div><!-- .custom-header -->
     <?php }

}

add_action('otography_frontend_header_image','otography_header_image');

// Main Banner

function otography_banner_display_type(){

    if ( is_front_page() && is_home() ) {

    // Default homepage
        do_action('otography_frontend_main_banner');

    } elseif ( is_front_page()){

    //Static homepage
        do_action('otography_frontend_main_banner');

    }elseif (is_page_template( 'template/otography-template.php' )) {

        do_action('otography_frontend_main_banner');
        
    }
}

add_action('otography_frontend_banner_display_type','otography_banner_display_type');