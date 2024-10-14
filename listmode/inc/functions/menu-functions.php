<?php
/**
* Menu Functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Menus {

    private static $instance;

    /**
     * Constructor to add actions for initializing the menu functionalities.
     */
    public function __construct() {
        add_action('wp_page_menu_args', array($this, 'page_menu_args'));
        add_filter('wp_nav_menu_args', array($this, 'nav_menu_args'));
    }

    /**
     * Get the singleton instance of the class.
     *
     * @return ListMode_Menus The instance of the class.
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Modify wp_page_menu() arguments to show a "Home" link as the first item.
     *
     * @param array $args Configuration arguments.
     * @return array Modified configuration arguments.
     */
    public function page_menu_args($args) {
        $args['show_home'] = true;
        return $args;
    }

    /**
     * Get the primary menu text.
     *
     * @return string Text for the primary menu.
     */
    public function primary_menu_text() {
        $menu_text = esc_html__( 'Menu', 'listmode' );
        if ( listmode_get_option('primary_menu_text') ) {
            $menu_text = listmode_get_option('primary_menu_text');
        }
        return apply_filters( 'listmode_primary_menu_text', $menu_text );
    }

    /**
     * Display the primary fallback menu using wp_page_menu() if no custom menu is assigned.
     */
    public function primary_fallback_menu() {
        wp_page_menu( array(
            'sort_column'  => 'menu_order, post_title',
            'menu_id'      => 'listmode-menu-primary-navigation',
            'menu_class'   => 'listmode-primary-nav-menu listmode-menu-primary',
            'container'    => 'ul',
            'echo'         => true,
            'link_before'  => '',
            'link_after'   => '',
            'before'       => '',
            'after'        => '',
            'item_spacing' => 'discard',
            'walker'       => '',
        ) );
    }

    /**
     * Modify wp_nav_menu() arguments to set the fallback menu for the primary location.
     *
     * @param array $args Configuration arguments.
     * @return array Modified configuration arguments.
     */
    public function nav_menu_args($args) {
        if ($args['theme_location'] === 'primary' && empty($args['menu'])) {
            $args['fallback_cb'] = array($this, 'primary_fallback_menu');
        }
        return $args;
    }

}
// Initialize the instance
ListMode_Menus::get_instance();