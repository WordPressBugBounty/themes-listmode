<?php
/**
* The file for displaying the search form
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="listmode-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="listmode-sr-only"><?php echo esc_html_x( 'Search for:', 'label', 'listmode' ); ?></span>
    <input type="search" class="listmode-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'listmode' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="listmode-search-submit" value="<?php echo esc_attr_x( '&#xf002;', 'submit button', 'listmode' ); ?>" />
</form>