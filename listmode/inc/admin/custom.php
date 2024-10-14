<?php
/**
* Customizer Options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'listmode_header_style' ) ) :
function listmode_header_style() {
    $header_text_color = get_header_textcolor();
    //if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) { return; }
    ?>
    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
        .listmode-site-title, .listmode-site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}
    <?php else : ?>
        .listmode-site-title, .listmode-site-title a, .listmode-site-description {color: #<?php echo esc_attr( $header_text_color ); ?>;}
    <?php endif; ?>
    </style>
    <?php
}
endif;


function listmode_inline_css() {
    $custom_css = '';
    $header_instance = ListMode_Header::get_instance();
    $layout_instance = ListMode_Layout::get_instance();

    if ( !($layout_instance->is_backtotop_active()) ) {
        $custom_css .= '.listmode-scroll-top{display:none !important;}';
    }

    if ( listmode_get_option('header_image_title_mobile') ) {
        $custom_css .= '.listmode-header-image .listmode-header-image-info{display:block !important;}';
        $custom_css .= '.listmode-header-image .listmode-header-image-info .listmode-header-image-site-title{display:block !important;}';
    }

    if ( listmode_get_option('header_image_description_mobile') ) {
        $custom_css .= '.listmode-header-image .listmode-header-image-info{display:block !important;}';
        $custom_css .= '.listmode-header-image .listmode-header-image-info .listmode-header-image-site-description{display:block !important;}';
    }

    if ( listmode_get_option('header_image_cover') ) {
        if ( listmode_get_option('header_image_height_mobile') ) {
            $custom_css .= '@media screen and (max-width: 599px){.listmode-header-image-cover .listmode-header-img{min-height:'.esc_html( listmode_get_option('header_image_height_mobile') ).';}}';
        }
    }
    if ( listmode_get_option('header_padding') ) {
        $custom_css .= '.listmode-header-inside-content{padding:'.esc_html( listmode_get_option('header_padding') ).';}';
    }

    if ( !(listmode_get_option('no_limit_logo_width')) ) {
        if ( $header_instance->logo_max_width() ) {
            $custom_css .= '.listmode-logo-img{max-width:'.esc_html( $header_instance->logo_max_width() ).';}';
        }
    }

    if ( listmode_get_option('mini_post_padding') ) {
        $custom_css .= '.listmode-summaries-box-inside{padding:'.esc_html( listmode_get_option('mini_post_padding') ).';}';
    }

    if ( listmode_get_option('full_thumbnail_single') ) {
        $custom_css .= 'listmode-post-thumbnail-single-img{width:100%;}';
    }

    if( '' != $custom_css ) {
        wp_add_inline_style( 'listmode-maincss', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'listmode_inline_css' );