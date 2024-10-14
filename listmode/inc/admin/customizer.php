<?php
/**
* ListMode Theme Customizer.
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! class_exists( 'WP_Customize_Control' ) ) {return null;}

$listmode_admin_classes = [ 'customize-static-text-control', 'customize-button-control', 'customize-category-control', 'customize-submit-control' ];

$listmode_options_files = [ 'getting-started', 'menu-options', 'header-options', 'slider-options', 'non-singular-post-options', 'singular-post-options', 'navigation-options', 'singular-page-options', 'social-profiles', 'footer-options', 'search-404-options', 'other-options', 'upgrade-to-pro', 'sanitize-callbacks' ];

foreach ($listmode_admin_classes as $listmode_admin_class) {
    require_once(trailingslashit(get_template_directory()) . "inc/admin/classes/class-{$listmode_admin_class}.php"); /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
}

foreach ($listmode_options_files as $listmode_options_file) {
    require_once(trailingslashit(get_template_directory()) . "inc/admin/options/{$listmode_options_file}.php"); /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
}

function listmode_register_theme_customizer( $wp_customize ) {

    if(method_exists('WP_Customize_Manager', 'add_panel')):
    $wp_customize->add_panel('listmode_main_options_panel', array( 'title' => esc_html__('Theme Options', 'listmode'), 'priority' => 10, ));
    endif;
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'listmode_main_options_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = 20;
    $wp_customize->get_section( 'header_image' )->panel = 'listmode_main_options_panel';
    $wp_customize->get_section( 'header_image' )->priority = 26;
    $wp_customize->get_section( 'background_image' )->panel = 'listmode_main_options_panel';
    $wp_customize->get_section( 'background_image' )->priority = 27;
    $wp_customize->get_section( 'colors' )->panel = 'listmode_main_options_panel';
    $wp_customize->get_section( 'colors' )->priority = 40;
      
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    $wp_customize->get_control( 'background_color' )->description = esc_html__('To change Background Color, need to remove background image first:- go to Appearance : Customize : Theme Options : Background Image', 'listmode');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.listmode-site-title a',
            'render_callback' => 'listmode_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.listmode-site-description',
            'render_callback' => 'listmode_customize_partial_blogdescription',
        ) );
    }

    listmode_getting_started($wp_customize);
    listmode_menu_options($wp_customize);
    listmode_header_options($wp_customize);
    listmode_slider_options($wp_customize);
    listmode_post_summaries_options($wp_customize);
    listmode_post_options($wp_customize);
    listmode_navigation_options($wp_customize);
    listmode_page_options($wp_customize);
    listmode_social_profiles($wp_customize);
    listmode_footer_options($wp_customize);
    listmode_search_404_options($wp_customize);
    listmode_other_options($wp_customize);
    listmode_upgrade_to_pro($wp_customize);

}

add_action( 'customize_register', 'listmode_register_theme_customizer' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function listmode_customize_partial_blogname() {
    bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function listmode_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

function listmode_customizer_js_scripts() {
    wp_enqueue_script('listmode-theme-customizer-js', get_template_directory_uri() . '/inc/admin/js/customizer.js', array( 'jquery', 'customize-preview' ), null, true);
}
add_action( 'customize_preview_init', 'listmode_customizer_js_scripts' );