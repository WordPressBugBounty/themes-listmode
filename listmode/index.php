<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

<?php if ( !(listmode_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( listmode_get_option('posts_heading') ) : ?>
<div class="listmode-posts-header"><h2 class="listmode-posts-heading"><span><?php echo esc_html( listmode_get_option('posts_heading') ); ?></span></h2></div>
<?php else : ?>
<div class="listmode-posts-header"><h2 class="listmode-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'listmode' ); ?></span></h2></div>
<?php endif; ?>
<?php } ?>
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