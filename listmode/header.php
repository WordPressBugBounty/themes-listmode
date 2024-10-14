<?php
/**
* The header for ListMode theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); ?>
<?php $listmode_header_instance = ListMode_Header::get_instance(); ?>
<?php $listmode_menu_instance = ListMode_Menus::get_instance(); ?>
<?php $listmode_social_instance = ListMode_Social::get_instance(); ?>
<?php $listmode_layout_instance = ListMode_Layout::get_instance(); ?>
</head>

<body <?php body_class(); ?> id="listmode-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#listmode-posts-wrapper"><?php esc_html_e( 'Skip to content', 'listmode' ); ?></a>

<div class="listmode-site-wrapper">

<?php $listmode_header_instance->header_image(); ?>

<?php $listmode_hooks_instance->before_header(); ?>

<div class="listmode-site-header listmode-container" id="listmode-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="listmode-head-content listmode-clearfix" id="listmode-head-content">

<?php if ( $listmode_layout_instance->is_header_content_active() ) { ?>
<div class="listmode-header-inside listmode-clearfix">
<div class="listmode-header-inside-content listmode-clearfix">
<div class="listmode-outer-wrapper listmode-header-outer-wrapper">
<div class="listmode-header-inside-container">

<div class="listmode-header-element-logo listmode-header-element-item">
<div class="listmode-header-element-logo-inside listmode-header-element-item-inside">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding site-branding-full">
    <div class="listmode-custom-logo-image">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="listmode-logo-img-link">
        <img src="<?php echo esc_url( $listmode_header_instance->custom_logo() ); ?>" alt="" class="listmode-logo-img"/>
    </a>
    </div>
    <div class="listmode-custom-logo-info"><?php $listmode_header_instance->site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php $listmode_header_instance->site_title(); ?>
    </div>
<?php endif; ?>
</div>
</div>

<?php if ( $listmode_layout_instance->is_primary_menu_active() ) { ?>
<div class="listmode-header-element-menu listmode-header-element-item">
<div class="listmode-header-element-menu-inside listmode-header-element-item-inside">
<div class="listmode-container listmode-primary-menu-container listmode-clearfix">
<div class="listmode-primary-menu-container-inside listmode-clearfix">
<nav class="listmode-nav-primary" id="listmode-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'listmode' ); ?>">
<button class="listmode-primary-responsive-menu-icon" aria-controls="listmode-menu-primary-navigation" aria-expanded="false"><?php echo esc_html( $listmode_menu_instance->primary_menu_text() ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'listmode-menu-primary-navigation', 'menu_class' => 'listmode-primary-nav-menu listmode-menu-primary', 'container' => '', ) ); ?>
</nav>
</div>
</div>
</div>
</div>
<?php } ?>

<?php if ( $listmode_layout_instance->is_social_buttons_active() ) { ?>
<div class="listmode-header-element-social listmode-header-element-item">
<div class="listmode-header-element-social-inside listmode-header-element-item-inside">
<?php $listmode_social_instance->display_social_buttons(); ?>
</div>
</div>
<?php } ?>

</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="listmode-no-header-content">
  <?php $listmode_header_instance->site_title(); ?>
</div>
<?php } ?>

</div><!--/#listmode-head-content -->
</div><!--/#listmode-header -->

<div id="listmode-search-overlay-wrap" class="listmode-search-overlay">
  <div class="listmode-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
  <button class="listmode-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'listmode' ); ?>" title="<?php esc_attr_e('Close Search','listmode'); ?>">&#xD7;</button>
</div>

<?php $listmode_hooks_instance->after_header(); ?>

<div id="listmode-header-end"></div>

<?php listmode_slider_area(); ?>

<?php $listmode_hooks_instance->before_main_wrapper(); ?>

<div class="listmode-outer-wrapper listmode-main-area-outer-wrapper" id="listmode-wrapper-outside">
<div class="listmode-container listmode-clearfix" id="listmode-wrapper">

<div class="listmode-content-wrapper listmode-clearfix" id="listmode-content-wrapper">