<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Class ListMode_Widgets
 *
 * Manages the registration and display of widget areas for the ListMode theme.
 */
class ListMode_Widgets {

    /**
     * Constructor.
     *
     * Initializes the class by setting up action hooks for registering and displaying widgets.
     */
    public function __construct() {
        add_action('widgets_init', array($this, 'listmode_register_sidebars'));
        add_action('listmode_sidebar_one', array($this, 'listmode_sidebar_one_widgets'));
        add_action('listmode_before_main_wrapper', array($this, 'listmode_top_wide_widgets'));
        add_action('listmode_before_main_content', array($this, 'listmode_top_widgets'));
        add_action('listmode_after_main_content', array($this, 'listmode_bottom_widgets'));
        add_action('listmode_after_main_wrapper', array($this, 'listmode_bottom_wide_widgets'));
        add_action('listmode_after_404_main_content', array($this, 'listmode_404_widgets'));
        add_action('listmode_before_single_comment_form', array($this, 'listmode_post_bottom_widgets'));
    }

    /**
     * Registers widget areas.
     *
     * Adds multiple widget areas to the theme, including sidebars, top, bottom, and footer widget areas.
     *
     * @return void
     */
    public function listmode_register_sidebars() {
        register_sidebar(array(
            'id' => 'listmode-sidebar-one',
            'name' => esc_html__( 'Sidebar 1 Widgets', 'listmode' ),
            'description' => esc_html__( 'This widget area is located on the left-hand side of your web page.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-side-widget widget listmode-widget-box listmode-widget-box %2$s"><div class="listmode-widget-box-inside listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-fullwidth-widgets',
            'name' => esc_html__( 'Top Full Width Widgets (Everywhere)', 'listmode' ),
            'description' => esc_html__( 'This full-width widget area is located after the primary menu of your website. Widgets of this widget area are displayed on every page of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget listmode-top-fullwidth-widget listmode-widget-box widget %2$s"><div class="listmode-top-fullwidth-widget-inside listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-home-fullwidth-widgets',
            'name' => esc_html__( 'Top Full Width Widgets (Default HomePage)', 'listmode' ),
            'description' => esc_html__( 'This full-width widget area is located after the primary menu of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget listmode-top-fullwidth-widget listmode-widget-box widget %2$s"><div class="listmode-top-fullwidth-widget-inside listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-top-widgets',
            'name' => esc_html__( 'Above Content Widgets (Everywhere)', 'listmode' ),
            'description' => esc_html__( 'This widget area is located at the top of the main content of your website. Widgets of this widget area are displayed on every page of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-home-top-widgets',
            'name' => esc_html__( 'Above Content Widgets (Default HomePage)', 'listmode' ),
            'description' => esc_html__( 'This widget area is located at the top of the main content of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-bottom-widgets',
            'name' => esc_html__( 'Below Content Widgets (Everywhere)', 'listmode' ),
            'description' => esc_html__( 'This widget area is located at the bottom of the main content of your website. Widgets of this widget area are displayed on every page of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-home-bottom-widgets',
            'name' => esc_html__( 'Below Content Widgets (Default HomePage)', 'listmode' ),
            'description' => esc_html__( 'This widget area is located at the bottom of the main content of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-fullwidth-bottom-widgets',
            'name' => esc_html__( 'Bottom Full Width Widgets (Everywhere)', 'listmode' ),
            'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on every page of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget listmode-bottom-fullwidth-widget listmode-widget-box widget %2$s"><div class="listmode-bottom-fullwidth-widget-inside listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-home-fullwidth-bottom-widgets',
            'name' => esc_html__( 'Bottom Full Width Widgets (Default HomePage)', 'listmode' ),
            'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget listmode-bottom-fullwidth-widget listmode-widget-box widget %2$s"><div class="listmode-bottom-fullwidth-widget-inside listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-single-post-bottom-widgets',
            'name' => esc_html__( 'Single Post Bottom Widgets', 'listmode' ),
            'description' => esc_html__( 'This widget area is located at the bottom of single post of any post type (except attachments and pages).', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-top-footer',
            'name' => esc_html__( 'Footer Top', 'listmode' ),
            'description' => esc_html__( 'This widget area is located on the top of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-footer-1',
            'name' => esc_html__( 'Footer 1', 'listmode' ),
            'description' => esc_html__( 'This widget area is the column 1 of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-footer-2',
            'name' => esc_html__( 'Footer 2', 'listmode' ),
            'description' => esc_html__( 'This widget area is the column 2 of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-footer-3',
            'name' => esc_html__( 'Footer 3', 'listmode' ),
            'description' => esc_html__( 'This widget area is the column 3 of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-footer-4',
            'name' => esc_html__( 'Footer 4', 'listmode' ),
            'description' => esc_html__( 'This widget area is the column 4 of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-bottom-footer',
            'name' => esc_html__( 'Footer Bottom', 'listmode' ),
            'description' => esc_html__( 'This widget area is located on the bottom of the footer of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-footer-widget widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));

        register_sidebar(array(
            'id' => 'listmode-404-widgets',
            'name' => esc_html__( '404 Page Widgets', 'listmode' ),
            'description' => esc_html__( 'This widget area is located on the 404(not found) page of your website.', 'listmode' ),
            'before_widget' => '<div id="%1$s" class="listmode-main-widget widget listmode-widget-box %2$s"><div class="listmode-widget-box-inside">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="listmode-widget-header"><h2 class="listmode-widget-title"><span class="listmode-widget-title-inside">',
            'after_title' => '</span></h2></div>'));
    }

    /**
     * Display the Sidebar 1 widget area.
     *
     * Outputs the widgets assigned to the 'listmode-sidebar-one' area.
     *
     * @return void
     */
    public function listmode_sidebar_one_widgets() {
        dynamic_sidebar( 'listmode-sidebar-one' );
    }

    /**
     * Display the top wide widget areas.
     *
     * Outputs the widgets assigned to the various full-width widget areas
     * depending on the current page context.
     *
     * @return void
     */
    public function listmode_top_wide_widgets() {
        if ( is_active_sidebar( 'listmode-home-fullwidth-widgets' ) || is_active_sidebar( 'listmode-fullwidth-widgets' ) ) {
            echo '<div class="listmode-top-wrapper-outer listmode-clearfix">';
            echo '<div class="listmode-featured-posts-area listmode-top-wrapper listmode-clearfix">';
            echo '<div class="listmode-outer-wrapper listmode-fullwidth-widgets-outer-wrapper">';
    
            if ( is_front_page() && is_home() && !is_paged() ) {
                dynamic_sidebar( 'listmode-home-fullwidth-widgets' );
            }
            dynamic_sidebar( 'listmode-fullwidth-widgets' );
    
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    /**
     * Display the top widget areas.
     *
     * Outputs the widgets assigned to the various top widget areas
     * depending on the current page context.
     *
     * @return void
     */
    public function listmode_top_widgets() {
        if ( is_active_sidebar( 'listmode-home-top-widgets' ) || is_active_sidebar( 'listmode-top-widgets' ) ) {
            echo '<div class="listmode-featured-posts-area listmode-featured-posts-area-top listmode-clearfix">';
    
            if ( is_front_page() && is_home() && !is_paged() ) {
                dynamic_sidebar( 'listmode-home-top-widgets' );
            }
            dynamic_sidebar( 'listmode-top-widgets' );
    
            echo '</div>';
        }
    }

    /**
     * Display the bottom widget areas.
     *
     * Outputs the widgets assigned to the various bottom widget areas
     * depending on the current page context.
     *
     * @return void
     */
    public function listmode_bottom_widgets() {
        if ( is_active_sidebar( 'listmode-home-bottom-widgets' ) || is_active_sidebar( 'listmode-bottom-widgets' ) ) {
            echo '<div class="listmode-featured-posts-area listmode-featured-posts-area-bottom listmode-clearfix">';
    
            if ( is_front_page() && is_home() && !is_paged() ) {
                dynamic_sidebar( 'listmode-home-bottom-widgets' );
            }
            dynamic_sidebar( 'listmode-bottom-widgets' );
    
            echo '</div>';
        }
    }

    /**
     * Display the bottom wide widget areas.
     *
     * Outputs the widgets assigned to the various bottom full-width widget areas
     * depending on the current page context.
     *
     * @return void
     */
    public function listmode_bottom_wide_widgets() {
        if ( is_active_sidebar( 'listmode-home-fullwidth-bottom-widgets' ) || is_active_sidebar( 'listmode-fullwidth-bottom-widgets' ) ) {
            echo '<div class="listmode-bottom-wrapper-outer listmode-clearfix">';
            echo '<div class="listmode-featured-posts-area listmode-bottom-wrapper listmode-clearfix">';
            echo '<div class="listmode-outer-wrapper listmode-fullwidth-widgets-outer-wrapper">';
    
            if ( is_front_page() && is_home() && !is_paged() ) {
                dynamic_sidebar( 'listmode-home-fullwidth-bottom-widgets' );
            }
            dynamic_sidebar( 'listmode-fullwidth-bottom-widgets' );
    
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    /**
     * Display the 404 page widget areas.
     *
     * Outputs the widgets assigned to the 'listmode-404-widgets' area.
     *
     * @return void
     */
    public function listmode_404_widgets() {
        if ( is_active_sidebar( 'listmode-404-widgets' ) ) {
            echo '<div class="listmode-featured-posts-area listmode-featured-posts-area-top listmode-clearfix">';
            dynamic_sidebar( 'listmode-404-widgets' );
            echo '</div>';
        }
    }

    /**
     * Display the bottom widgets for single posts.
     *
     * Outputs the widgets assigned to the 'listmode-single-post-bottom-widgets' area.
     *
     * @return void
     */
    public function listmode_post_bottom_widgets() {
        if ( is_active_sidebar( 'listmode-single-post-bottom-widgets' ) ) {
            echo '<div class="listmode-featured-posts-area listmode-clearfix">';
            dynamic_sidebar( 'listmode-single-post-bottom-widgets' );
            echo '</div>';
        }
    }

}
$listmode_widgets_init = new ListMode_Widgets();