<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div class="listmode-mini-post-wrapper">
<div id="post-<?php the_ID(); ?>" class="listmode-mini-post listmode-item-post listmode-summaries-box<?php echo esc_attr( listmode_post_summaries_class() ); ?>">
<div class="listmode-mini-post-inside listmode-summaries-box-inside">

    <?php if ( !(listmode_get_option('hide_thumbnail_home')) ) { ?>
    <?php if ( has_post_thumbnail() ) { ?>
        <?php if ( listmode_get_option('remove_thumbnail_home_link') ) { ?>
            <div class="listmode-mini-post-thumbnail listmode-fp-post-thumbnail listmode-mini-post-thumbnail-float listmode-mini-post-thumbnail-100">
                <?php the_post_thumbnail('listmode-100w-100h-image', array('class' => 'listmode-mini-post-thumbnail-img listmode-fp-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?>
            </div>
        <?php } else { ?>
            <div class="listmode-mini-post-thumbnail listmode-fp-post-thumbnail listmode-mini-post-thumbnail-float listmode-mini-post-thumbnail-100">
                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-mini-post-thumbnail-link listmode-fp-post-thumbnail-link"><?php the_post_thumbnail('listmode-100w-100h-image', array('class' => 'listmode-mini-post-thumbnail-img listmode-fp-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <?php if ( !(listmode_get_option('hide_default_thumbnail_home')) ) { ?>
            <?php if ( listmode_get_option('remove_thumbnail_home_link') ) { ?>
                <div class="listmode-mini-post-thumbnail listmode-fp-post-thumbnail listmode-mini-post-thumbnail-float listmode-mini-post-thumbnail-100">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-100-100.jpg' ); ?>" class="listmode-mini-post-thumbnail-img listmode-fp-post-thumbnail-img"/>
                </div>
            <?php } else { ?>
                <div class="listmode-mini-post-thumbnail listmode-fp-post-thumbnail listmode-mini-post-thumbnail-float listmode-mini-post-thumbnail-100">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-mini-post-thumbnail-link listmode-fp-post-thumbnail-link"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-100-100.jpg' ); ?>" class="listmode-mini-post-thumbnail-img listmode-fp-post-thumbnail-img"/></a>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php } ?>

    <?php if ( listmode_get_option('show_post_categories_home') && has_category() && ('post' == get_post_type()) ) { ?>
        <?php if ( listmode_get_option('remove_post_categories_home_link') ) { ?>
            <?php listmode_mini_post_categories_nolinks(); ?>
        <?php } else { ?>
            <?php listmode_mini_post_categories(); ?>
        <?php } ?>
    <?php } ?>

    <?php if ( listmode_get_option('show_post_tags_home') && has_tag() && ('post' == get_post_type()) ) { ?>
        <?php if ( listmode_get_option('remove_post_tags_home_link') ) { ?>
            <?php listmode_mini_post_tags_nolinks(); ?>
        <?php } else { ?>
            <?php listmode_mini_post_tags(); ?>
        <?php } ?>
    <?php } ?>

    <?php if ( !(listmode_get_option('hide_post_title_home')) ) { ?>

        <?php if ( listmode_get_option('remove_post_title_home_link') ) { ?>

            <?php if ( listmode_get_option('limit_post_titles_home') ) { ?>
                <h2 class="listmode-mini-post-title"><?php echo esc_html( wp_trim_words( get_the_title(), listmode_post_title_home_length(), '...' ) ); ?></h2>
            <?php } else { ?>
                <?php the_title( '<h2 class="listmode-mini-post-title">', '</h2>' ); ?>
            <?php } ?>

        <?php } else { ?>

            <?php if ( listmode_get_option('limit_post_titles_home') ) { ?>
                <h2 class="listmode-mini-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( wp_trim_words( get_the_title(), listmode_post_title_home_length(), '...' ) ); ?></a></h2>
            <?php } else { ?>
                <?php the_title( sprintf( '<h2 class="listmode-mini-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <?php } ?>

        <?php } ?>

    <?php } ?>

    <?php if ( !(listmode_get_option('hide_post_author_home')) || !(listmode_get_option('hide_post_date_home')) || listmode_get_option('show_comments_link_home') ) { ?>
    <div class="listmode-mini-post-meta">
    <?php if ( !(listmode_get_option('hide_post_author_home')) ) { ?><?php if ( listmode_get_option('remove_post_author_home_link') ) { ?><span class="listmode-mini-post-meta-author listmode-mini-post-meta-element"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_author() ); ?></span><?php } else { ?><span class="listmode-mini-post-meta-author listmode-mini-post-meta-element"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?><?php } ?>
    <?php if ( listmode_get_option('post_date_home_type') == 'updated' ) { ?>
        <?php if ( !(listmode_get_option('hide_post_date_home')) ) { ?><span class="listmode-mini-post-meta-date listmode-mini-post-meta-element"><span class="listmode-entry-meta-icon"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_modified_date() ); ?></span><?php } ?>
    <?php } else { ?>
        <?php if ( !(listmode_get_option('hide_post_date_home')) ) { ?><span class="listmode-mini-post-meta-date listmode-mini-post-meta-element"><span class="listmode-entry-meta-icon"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php } ?>
    <?php if ( listmode_get_option('show_comments_link_home') ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="listmode-mini-post-meta-comment listmode-mini-post-meta-element"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comments<span class="listmode-sr-only"> on %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>

    <?php if ( !(listmode_get_option('hide_post_snippet')) ) { ?>
        <div class="listmode-mini-post-snippet listmode-fp-post-snippet listmode-mini-post-excerpt listmode-fp-post-excerpt"><?php the_excerpt(); ?></div>
    <?php } ?>

    <?php if ( listmode_get_option('show_read_more_button') ) { ?><div class='listmode-mini-post-read-more listmode-fp-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( listmode_read_more_text() ); ?><span class="listmode-sr-only"> <?php echo wp_kses_post( get_the_title() ); ?></span></a></div><?php } ?>

</div>
</div>
</div>