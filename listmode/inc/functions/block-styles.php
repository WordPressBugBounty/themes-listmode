<?php
/**
* Block Styles
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Block_Styles {

    public function __construct() {
        add_action('init', array($this, 'register_block_styles'));
    }

    public function register_block_styles() {
        if (function_exists('register_block_style')) {
            register_block_style( 'core/button', array( 'name' => 'listmode-button', 'label' => esc_html__( 'ListMode Button', 'listmode' ), 'is_default' => true, 'style_handle' => 'listmode-maincss', ) ); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
        }
    }

}
new ListMode_Block_Styles();