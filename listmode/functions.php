<?php
/**
* ListMode functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

define( 'LISTMODE_PROURL', 'https://themesdna.com/listmode-pro-wordpress-theme/' );
define( 'LISTMODE_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'LISTMODE_THEMEOPTIONSDIR', get_template_directory() . '/inc/admin' );

// Add new constant that returns true if WooCommerce is active
define( 'LISTMODE_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

require_once( LISTMODE_THEMEOPTIONSDIR . '/customizer.php' );

/**
 * This function return a value of given theme option name from database.
 *
 * @since 1.0.0
 *
 * @param string $option Theme option to return.
 * @return mixed The value of theme option.
 */
function listmode_get_option($option) {
    $listmode_options = get_option('listmode_options');
    if ((is_array($listmode_options)) && (array_key_exists($option, $listmode_options))) {
        return $listmode_options[$option];
    }
    else {
        return '';
    }
}

function listmode_is_option_set($option) {
    $listmode_options = get_option('listmode_options');
    if ((is_array($listmode_options)) && (array_key_exists($option, $listmode_options))) {
        return true;
    } else {
        return false;
    }
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
class ListMode_Setup {
    public function __construct() {
        add_action('after_setup_theme', array($this, 'setup'));
    }

    public function setup() {
        global $wp_version;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ListMode, use a find and replace
         * to change 'listmode' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'listmode', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        if ( function_exists( 'add_image_size' ) ) {
            add_image_size( 'listmode-1320w-autoh-image',  1320, 9999, false );
            add_image_size( 'listmode-920w-autoh-image',  920, 9999, false );
            add_image_size( 'listmode-100w-100h-image',  100, 100, true );
        }

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
        'primary' => esc_html__('Primary Menu', 'listmode')
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'navigation-widgets' );
        add_theme_support( 'html5', $markup );

        add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 350,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        // Support for Custom Header
        add_theme_support( 'custom-header', apply_filters( 'listmode_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => 'ffffff',
        'width'                  => 1920,
        'height'                 => 400,
        'flex-width'            => true,
        'flex-height'            => true,
        'wp-head-callback'       => 'listmode_header_style',
        'uploads'                => true,
        ) ) );

        // Set up the WordPress core custom background feature.
        $background_args = array(
                'default-color'          => 'ffffff',
                'default-image'          => '',
                'default-repeat'         => 'repeat',
                'default-position-x'     => 'left',
                'default-position-y'     => 'top',
                'default-size'     => 'auto',
                'default-attachment'     => 'fixed',
                'wp-head-callback'       => '_custom_background_cb',
                'admin-head-callback'    => 'admin_head_callback_func',
                'admin-preview-callback' => 'admin_preview_callback_func',
        );
        add_theme_support( 'custom-background', apply_filters( 'listmode_custom_background_args', $background_args) );
        
        // Support for Custom Editor Style
        add_editor_style( 'assets/css/editor-style.css' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'woocommerce' );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        if ( !(listmode_get_option('enable_widgets_block_editor')) ) {
            remove_theme_support( 'widgets-block-editor' );
        }
    }
}
new ListMode_Setup();

/**
 * Check if WooCommerce is activated
 */
function listmode_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Includes theme functions
 */
function listmode_file_includes() {
    $listmode_includes = [ 'layout-functions', 'enqueue-scripts', 'widgets-init', 'social-buttons', 'post-author-bio-functions', 'postmeta', 'post-styles-functions', 'navigation-functions', 'woocommerce-support', 'menu-functions', 'slider', 'header-functions', 'css-functions', 'other-functions', 'custom-hooks', 'block-styles', 'admin/custom', ];

    foreach ($listmode_includes as $listmode_file) {
        if ( strpos($listmode_file, 'admin/') === 0 ) {
            $listmode_file_path = trailingslashit(get_template_directory()) . "inc/{$listmode_file}.php";
        } else {
            $listmode_file_path = trailingslashit(get_template_directory()) . "inc/functions/{$listmode_file}.php";
        }
        require_once($listmode_file_path);
    }
}
listmode_file_includes();