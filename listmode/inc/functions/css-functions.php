<?php
/**
* Css Classes Functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Class ListMode_CSS
 *
 * Handles the addition of CSS classes to various HTML elements.
 */
class ListMode_CSS {

    /**
     * Constructor for ListMode_CSS.
     * Adds filters to modify post and body classes.
     */
    public function __construct() {
        add_filter('post_class', array($this, 'add_category_id_class'));
        add_filter('body_class', array($this, 'add_body_classes'));
    }

    /**
     * Adds category IDs as classes to post elements.
     *
     * @param array $classes Existing post classes.
     * @return array Modified post classes with category IDs.
     */
    public function add_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes[] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
    }

    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Existing body classes.
     * @return array Modified body classes with custom classes.
     */
    public function add_body_classes($classes) {
        $layout_instance = ListMode_Layout::get_instance();

        if ( is_multi_author() ) {
            $classes[] = 'listmode-group-blog';
        }

        if ( !(listmode_get_option('disable_loading_animation')) ) {
            $classes[] = 'listmode-animated listmode-fadein';
        }

        $classes[] = 'listmode-theme-is-active';

        if ( get_header_image() ) {
            $classes[] = 'listmode-header-image-active';
        }

        if ( listmode_get_option('header_image_cover') ) {
            $classes[] = 'listmode-header-image-cover';
        }

        if ( has_custom_logo() ) {
            $classes[] = 'listmode-custom-logo-active';
        }

        if ( is_singular() ) {
            $classes[] = 'listmode-singular-page';
        } else {
            $classes[] = 'listmode-non-singular-page';
        }

        if ( is_singular() ) {
            if( is_single() ) {
                if ( listmode_get_option('featured_media_under_post_title') ) {
                    $classes[] = 'listmode-single-media-under-title';
                }
            }
            if( is_page() ) {
                if ( listmode_get_option('featured_media_under_page_title') ) {
                    $classes[] = 'listmode-single-media-under-title';
                }
            }

            if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
               $classes[] = 'listmode-layout-full-width';
            } else {
                $classes[] = 'listmode-layout-c-s1';
            }
        } else {
            $classes[] = 'listmode-layout-full-width';
        }

        if ( (!($layout_instance->is_primary_menu_active()) && !($layout_instance->is_social_buttons_active())) ) {
            $classes[] = 'listmode-header-layout-fullwidth';
        } else {
            $classes[] = 'listmode-header-layout-branding-menu-social';
        }

        if ( listmode_get_option('hide_tagline') ) {
            $classes[] = 'listmode-tagline-inactive';
        }

        if ( 'beside-title' === listmode_get_option('logo_location') ) {
            $classes[] = 'listmode-logo-beside-title';
        } elseif ( 'above-title' === listmode_get_option('logo_location') ) {
            $classes[] = 'listmode-logo-above-title';
        } else {
            $classes[] = 'listmode-logo-above-title';
        }

        if ( listmode_is_woocommerce_activated() ) {
            if ( listmode_get_option('woocommerce_full_width') ) {
                $classes[] = 'listmode-woocommerce-full-width';
            }
        }

        if ( $layout_instance->is_primary_menu_active() ) {
            $classes[] = 'listmode-primary-menu-active';
        } else {
            $classes[] = 'listmode-primary-menu-inactive';
        }
        $classes[] = 'listmode-primary-mobile-menu-active';

        $classes[] = 'listmode-table-css-active';

        if ( listmode_get_option('no_underline_content_links') ) {
            $classes[] = 'listmode-nouc-links';
        } else {
            $classes[] = 'listmode-uc-links';
        }

        return $classes;
    }

}
$listmode_css_classes = new ListMode_CSS();