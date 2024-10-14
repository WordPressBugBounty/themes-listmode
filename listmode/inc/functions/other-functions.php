<?php
/**
* More Custom Functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Get the read more text for excerpts.
 *
 * @return string The read more text.
 */
function listmode_read_more_text() {
   $readmoretext = esc_html__( 'Continue Reading', 'listmode' );
    if ( listmode_get_option('read_more_text') ) {
            $readmoretext = listmode_get_option('read_more_text');
    }
   return $readmoretext;
}

/**
 * Change the excerpt length.
 *
 * @param int $length The current excerpt length.
 * @return int The modified excerpt length.
 */
function listmode_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 15;
    if ( listmode_get_option('read_more_length') ) {
        $read_more_length = listmode_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'listmode_excerpt_length');

/**
 * Change the excerpt more string.
 *
 * @param string $more The current excerpt more string.
 * @return string The modified excerpt more string.
 */
function listmode_excerpt_more($more) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter('excerpt_more', 'listmode_excerpt_more');

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;

/**
 * Disable block editor for widgets if the option is set.
 */
if ( !(listmode_get_option('enable_widgets_block_editor')) ) {
    // Disables the block editor from managing widgets in the Gutenberg plugin.
    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

    // Disables the block editor from managing widgets.
    add_filter( 'use_widgets_block_editor', '__return_false' );
}

if ( ! function_exists( 'listmode_remove_theme_support' ) ) :
/**
 * Remove theme support for responsive embeds if fitvids is active.
 */
function listmode_remove_theme_support() {

    $layout_instance = ListMode_Layout::get_instance();

    if ( $layout_instance->is_fitvids_active() ) {
        // Remove responsive embedded content support.
        remove_theme_support( 'responsive-embeds' );
    }

}
endif;
add_action( 'after_setup_theme', 'listmode_remove_theme_support', 1000 );