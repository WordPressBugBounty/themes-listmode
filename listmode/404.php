<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='listmode-main-wrapper listmode-clearfix' id='listmode-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="listmode-main-wrapper-inside listmode-clearfix">

<div class='listmode-posts-wrapper' id='listmode-posts-wrapper'>

<div class='listmode-posts listmode-singular-box'>
<div class="listmode-singular-box-inside">

<div class="listmode-page-header-outside">
<header class="listmode-page-header">
<div class="listmode-page-header-inside">
    <?php if ( listmode_get_option('error_404_heading') ) : ?>
    <h1 class="page-title"><?php echo esc_html( listmode_get_option('error_404_heading') ); ?></h1>
    <?php else : ?>
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'listmode' ); ?></h1>
    <?php endif; ?>
</div>
</header><!-- .listmode-page-header -->
</div>

<div class='listmode-posts-content'>

    <?php if ( listmode_get_option('error_404_message') ) : ?>
    <p><?php echo wp_kses_post( force_balance_tags( listmode_get_option('error_404_message') ) ); ?></p>
    <?php else : ?>
    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'listmode' ); ?></p>
    <?php endif; ?>

    <?php if ( !(listmode_get_option('hide_404_search')) ) { ?><?php get_search_form(); ?><?php } ?>

</div>

</div>
</div>

</div><!--/#listmode-posts-wrapper -->

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); $listmode_hooks_instance->after_404_main_content(); ?>

</div>
</div>
</div><!-- /#listmode-main-wrapper -->

<?php get_footer(); ?>