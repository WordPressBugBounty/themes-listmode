<?php
/**
* The template for displaying search results pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="listmode-main-wrapper listmode-clearfix" id="listmode-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="listmode-main-wrapper-inside listmode-clearfix">

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); ?>
<?php $listmode_navigation_instance = ListMode_Navigation::get_instance(); ?>

<?php $listmode_hooks_instance->before_main_content(); ?>

<div class="listmode-posts-wrapper" id="listmode-posts-wrapper">
<div class="listmode-posts">

<?php if ( !(listmode_get_option('hide_search_results_heading')) ) { ?>
<div class="listmode-page-header-outside">
<header class="listmode-page-header">
<div class="listmode-page-header-inside">
<?php if ( listmode_get_option('search_results_heading') ) : ?>
<h1 class="page-title"><?php echo esc_html( listmode_get_option('search_results_heading') ); ?> <span><?php echo esc_html(get_search_query()); ?></span></h1>
<?php else : ?>
<h1 class="page-title"><?php esc_html_e( 'Search Results for:', 'listmode' ); ?> <span><?php echo esc_html(get_search_query()); ?></span></h1>
<?php endif; ?>
</div>
</header>
</div>
<?php } ?>

<div class="listmode-posts-content">

<?php if (have_posts()) : ?>

    <div class="listmode-posts-container listmode-clearfix listmode-mini-posts-container listmode-fpw-4-columns">
    <?php $listmode_total_posts = $wp_query->post_count; ?>
    <?php $listmode_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'miniview' ); ?>

    <?php $listmode_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php $listmode_navigation_instance->posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div>
</div><!--/#listmode-posts-wrapper -->

<?php $listmode_hooks_instance->after_main_content(); ?>

</div>
</div>
</div><!-- /#listmode-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>