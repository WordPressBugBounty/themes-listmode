<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div><!--/#listmode-content-wrapper -->

</div><!--/#listmode-wrapper -->
</div><!--/#listmode-wrapper-outside -->

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); ?>
<?php $listmode_layout_instance = ListMode_Layout::get_instance(); ?>

<?php $listmode_hooks_instance->after_main_wrapper(); ?>

<?php $listmode_hooks_instance->before_footer(); ?>

<?php if ( !($listmode_layout_instance->hide_footer_widgets()) ) { ?>
<?php if ( is_active_sidebar( 'listmode-footer-1' ) || is_active_sidebar( 'listmode-footer-2' ) || is_active_sidebar( 'listmode-footer-3' ) || is_active_sidebar( 'listmode-footer-4' ) || is_active_sidebar( 'listmode-top-footer' ) || is_active_sidebar( 'listmode-bottom-footer' ) ) : ?>
<div class='listmode-clearfix' id='listmode-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='listmode-container listmode-clearfix'>
<div class="listmode-outer-wrapper listmode-footer-outer-wrapper">

<?php if ( is_active_sidebar( 'listmode-top-footer' ) ) : ?>
<div class='listmode-clearfix'>
<div class='listmode-top-footer-block'>
<?php dynamic_sidebar( 'listmode-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'listmode-footer-1' ) || is_active_sidebar( 'listmode-footer-2' ) || is_active_sidebar( 'listmode-footer-3' ) || is_active_sidebar( 'listmode-footer-4' ) ) : ?>
<div class='listmode-footer-block-cols listmode-clearfix'>

<div class="listmode-footer-block-col listmode-footer-4-col" id="listmode-footer-block-1">
<?php dynamic_sidebar( 'listmode-footer-1' ); ?>
</div>

<div class="listmode-footer-block-col listmode-footer-4-col" id="listmode-footer-block-2">
<?php dynamic_sidebar( 'listmode-footer-2' ); ?>
</div>

<div class="listmode-footer-block-col listmode-footer-4-col" id="listmode-footer-block-3">
<?php dynamic_sidebar( 'listmode-footer-3' ); ?>
</div>

<div class="listmode-footer-block-col listmode-footer-4-col" id="listmode-footer-block-4">
<?php dynamic_sidebar( 'listmode-footer-4' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'listmode-bottom-footer' ) ) : ?>
<div class='listmode-clearfix'>
<div class='listmode-bottom-footer-block'>
<?php dynamic_sidebar( 'listmode-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#listmode-footer-blocks-->
<?php endif; ?>
<?php } ?>

<div class='listmode-clearfix' id='listmode-footer'>
<div class='listmode-foot-wrap listmode-container'>
<div class="listmode-outer-wrapper listmode-footer-outer-wrapper">

<?php if ( listmode_get_option('footer_text') ) : ?>
  <p class='listmode-copyright'><?php echo wp_kses_post( force_balance_tags( listmode_get_option('footer_text') ) ); ?></p>
<?php else : ?>
  <p class='listmode-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'listmode' ), esc_html(date_i18n(__('Y','listmode'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='listmode-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'listmode' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#listmode-footer -->

<?php $listmode_hooks_instance->after_footer(); ?>

</div>

<?php if ( $listmode_layout_instance->is_backtotop_active() ) { ?><button class="listmode-scroll-top" title="<?php esc_attr_e('Scroll to Top','listmode'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="listmode-sr-only"><?php esc_html_e('Scroll to Top', 'listmode'); ?></span></button><?php } ?>

<?php wp_footer(); ?>
</body>
</html>