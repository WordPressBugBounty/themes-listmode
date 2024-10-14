<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); $listmode_hooks_instance->before_single_page(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('listmode-post-singular listmode-singular-box'); ?>>
<div class="listmode-singular-box-inside">

    <?php if ( !(listmode_get_option('hide_page_title')) ) { ?>
    <?php if ( !((is_front_page()) && (listmode_get_option('hide_static_page_title'))) ) { ?>
    <header class="entry-header">
    <div class="entry-header-inside">
        <?php if ( listmode_get_option('remove_page_title_link') ) { ?>
            <?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>
        <?php } else { ?>
            <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        <?php } ?>

       <?php listmode_page_postmeta(); ?>
    </div>
    </header><!-- .entry-header -->
    <?php } ?>
    <?php } ?>

    <?php $listmode_hooks_instance->after_single_page_title(); ?>

    <div class="entry-content listmode-clearfix">
        <?php
        if ( has_post_thumbnail() ) {
            if ( !(listmode_get_option('hide_thumbnail_page')) ) {
                if ( listmode_get_option('thumbnail_link_page') == 'no' ) { ?>
                    <div class="listmode-post-thumbnail-single">
                    <?php
                    if ( is_page_template( array( 'template-full-width-page.php' ) ) ) {
                        the_post_thumbnail('listmode-1320w-autoh-image', array('class' => 'listmode-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                    } else {
                        the_post_thumbnail('listmode-920w-autoh-image', array('class' => 'listmode-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                    }
                    ?>
                    </div>
                <?php } else { ?>
                    <div class="listmode-post-thumbnail-single">
                    <?php if ( is_page_template( array( 'template-full-width-page.php' ) ) ) { ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-post-thumbnail-single-link"><?php the_post_thumbnail('listmode-1320w-autoh-image', array('class' => 'listmode-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-post-thumbnail-single-link"><?php the_post_thumbnail('listmode-920w-autoh-image', array('class' => 'listmode-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                    <?php } ?>
                    </div>
        <?php   }
            }
        }

        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="listmode-sr-only"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'listmode' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post( get_the_title() )
        ) );

        wp_link_pages( array(
         'before'      => '<div class="listmode-clearfix"></div><div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'listmode' ) . '</span>',
         'after'       => '</div>',
         'link_before' => '<span>',
         'link_after'  => '</span>',
         ) );
         ?>
    </div><!-- .entry-content -->

    <?php $listmode_hooks_instance->after_single_page_content(); ?>

    <?php if ( !(listmode_get_option('hide_page_edit')) ) { ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="listmode-sr-only">%s</span>', 'listmode' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="listmode-edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
    <?php } ?>

</div>
</article>

<?php $listmode_hooks_instance->after_single_page(); ?>