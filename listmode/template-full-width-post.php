<?php
/**
* The template for displaying full-width post.
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: post
*/

get_header(); ?>

<div class="listmode-main-wrapper listmode-clearfix" id="listmode-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="listmode-main-wrapper-inside listmode-clearfix">

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); ?>
<?php $listmode_navigation_instance = ListMode_Navigation::get_instance(); ?>

<?php $listmode_hooks_instance->before_main_content(); ?>

<div class="listmode-posts-wrapper" id="listmode-posts-wrapper">

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content-single', get_post_format() );

    $listmode_navigation_instance->post_navigation();

    $listmode_hooks_instance->before_single_comment_form();

    if ( !(listmode_get_option('hide_comment_form')) ) {

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;

    }

endwhile; ?>

<div class="clear"></div>
</div><!--/#listmode-posts-wrapper -->

<?php $listmode_hooks_instance->after_main_content(); ?>

</div>
</div>
</div><!-- /#listmode-main-wrapper -->

<?php get_footer(); ?>