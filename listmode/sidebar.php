<?php
/**
* The file for displaying the sidebars.
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php if ( is_singular() ) { ?>

<?php if(!is_page_template(array( 'template-full-width-page.php', 'template-full-width-post.php' ))) { ?>
<div class="listmode-sidebar-one-wrapper listmode-sidebar-widget-area listmode-clearfix" id="listmode-sidebar-one-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="listmode-sidebar-one-wrapper-inside listmode-clearfix">

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); $listmode_hooks_instance->sidebar_one(); ?>

</div>
</div>
</div><!-- /#listmode-sidebar-one-wrapper-->
<?php } ?>

<?php } ?>