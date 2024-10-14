<?php
/**
* Post meta functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'listmode_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function listmode_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'listmode' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="listmode-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'listmode' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

/**
 * Get the custom text for post category links.
 *
 * @return string Custom text for post category links.
 */
function listmode_post_cat_links_text() {
    if ( listmode_is_option_set('cat_links_text') ) {
        $cat_links_text = listmode_get_option('cat_links_text');
    } else {
        $cat_links_text = '';
    }
    return apply_filters( 'listmode_post_cat_links_text', $cat_links_text );
}

/**
 * Get the custom text for post tag links.
 *
 * @return string Custom text for post tag links.
 */
function listmode_post_tag_links_text() {
    if ( listmode_is_option_set('tag_links_text') ) {
        $tag_links_text = listmode_get_option('tag_links_text');
    } else {
        $tag_links_text = '';
    }
    return apply_filters( 'listmode_post_tag_links_text', $tag_links_text );
}

if ( ! function_exists( 'listmode_mini_post_categories' ) ) :
/**
 * Prints HTML with meta information for the post categories in mini view.
 */
function listmode_mini_post_categories() {
    global $post;
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'listmode' ) );
        if ( $categories_list ) { ?>
            <div class="listmode-mini-post-categories listmode-mini-post-taxonomies"><?php if(listmode_post_cat_links_text()) { ?><span class="listmode-mini-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_post_cat_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( $categories_list ); ?></div>
        <?php }
    }
}
endif;

if ( ! function_exists( 'listmode_mini_post_categories_nolinks' ) ) :
/**
 * Prints HTML with meta information for the post categories in mini view without links.
 */
function listmode_mini_post_categories_nolinks() {
    global $post;
    if ( 'post' == get_post_type() ) {
        $categories = get_the_category();
        $category_names = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $category_names .= $category->cat_name . ', ';
            }
            if ( $category_names ) { ?>
                <div class="listmode-mini-post-categories listmode-mini-post-taxonomies"><?php if(listmode_post_cat_links_text()) { ?><span class="listmode-mini-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_post_cat_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( rtrim( $category_names, esc_html__( ', ', 'listmode' ) ) ); ?></div>
            <?php }
        }
    }
}
endif;

if ( ! function_exists( 'listmode_mini_post_tags' ) ) :
/**
 * Prints HTML with meta information for the post tags in mini view.
 */
function listmode_mini_post_tags() {
    global $post;
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'listmode' ) );
        if ( $tags_list ) { ?>
            <div class="listmode-mini-post-tags listmode-mini-post-taxonomies"><?php if(listmode_post_tag_links_text()) { ?><span class="listmode-mini-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_post_tag_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( $tags_list ); ?></div>
        <?php }
    }
}
endif;

if ( ! function_exists( 'listmode_mini_post_tags_nolinks' ) ) :
/**
 * Prints HTML with meta information for the post tags in mini view without links.
 */
function listmode_mini_post_tags_nolinks() {
    global $post;
    if ( 'post' == get_post_type() ) {
        $tags = get_the_tags($post->ID);
        $tag_names = '';
        if ( ! empty( $tags ) ) {
            foreach ( $tags as $tag ) {
                $tag_names .= $tag->name . ', ';
            }
            if ( $tag_names ) { ?>
                <div class="listmode-mini-post-tags listmode-mini-post-taxonomies"><?php if(listmode_post_tag_links_text()) { ?><span class="listmode-mini-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_post_tag_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( rtrim( $tag_names, esc_html__( ', ', 'listmode' ) ) ); ?></div>
            <?php }
        }
    }
}
endif;

if ( ! function_exists( 'listmode_mini_postmeta' ) ) :
/**
 * Prints HTML with meta information for the post meta in mini view.
 */
function listmode_mini_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(listmode_get_option('hide_post_author_home')) || !(listmode_get_option('hide_post_date_home')) || listmode_get_option('show_comments_link_home') ) { ?>
    <div class="listmode-mini-post-meta">
    <?php if ( !(listmode_get_option('hide_post_author_home')) ) { ?><span class="listmode-mini-post-meta-author listmode-mini-post-meta-element"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(listmode_get_option('hide_post_date_home')) ) { ?><span class="listmode-mini-post-meta-date listmode-mini-post-meta-element"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( listmode_get_option('show_comments_link_home') ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="listmode-mini-post-meta-comment listmode-mini-post-meta-element"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comments<span class="listmode-sr-only"> on %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'listmode_single_cats' ) ) :
/**
 * Prints HTML with meta information for the single post categories.
 */
function listmode_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'listmode' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="listmode-entry-meta-single listmode-entry-meta-single-top"><span class="listmode-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="listmode-sr-only">Posted in </span>%1$s', 'listmode' ) . '</span></div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'listmode_single_postmeta' ) ) :
/**
 * Prints HTML with meta information for the single post meta.
 */
function listmode_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(listmode_get_option('hide_post_author')) || !(listmode_get_option('hide_post_date')) || !(listmode_get_option('hide_comments_link')) || listmode_get_option('show_post_edit') ) { ?>
    <div class="listmode-entry-meta-single">
    <?php if ( !(listmode_get_option('hide_post_author')) ) { ?><span class="listmode-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( listmode_get_option('post_date_type') == 'updated' ) { ?>
        <?php if ( !(listmode_get_option('hide_post_date')) ) { ?><span class="listmode-entry-meta-single-date"><span class="listmode-entry-meta-icon"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_modified_date() ); ?></span><?php } ?>
    <?php } else { ?>
        <?php if ( !(listmode_get_option('hide_post_date')) ) { ?><span class="listmode-entry-meta-single-date"><span class="listmode-entry-meta-icon"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php } ?>
    <?php if ( !(listmode_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="listmode-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="listmode-sr-only"> on %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( listmode_get_option('show_post_edit') ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post.0 Only visible to screen readers */ __( 'Edit<span class="listmode-sr-only"> %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), '<span class="listmode-edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'listmode_page_postmeta' ) ) :
/**
 * Prints HTML with meta information for the page post meta.
 */
function listmode_page_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(listmode_get_option('hide_page_author')) || !(listmode_get_option('hide_page_date')) || !(listmode_get_option('hide_page_comments')) ) { ?>
    <?php if ( !((is_front_page()) && (listmode_get_option('hide_static_page_meta'))) ) { ?>
    <div class="listmode-entry-meta-single listmode-entry-meta-page">
    <?php if ( !(listmode_get_option('hide_page_author')) ) { ?><span class="listmode-entry-meta-single-author"><span class="listmode-entry-meta-icon"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;</span><span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( listmode_get_option('page_date_type') == 'updated' ) { ?>
        <?php if ( !(listmode_get_option('hide_page_date')) ) { ?><span class="listmode-entry-meta-single-date"><span class="listmode-entry-meta-icon"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_modified_date() ); ?></span><?php } ?>
    <?php } else { ?>
        <?php if ( !(listmode_get_option('hide_page_date')) ) { ?><span class="listmode-entry-meta-single-date"><span class="listmode-entry-meta-icon"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php } ?>
    <?php if ( !(listmode_get_option('hide_page_comments')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="listmode-entry-meta-single-comments"><span class="listmode-entry-meta-icon"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;</span><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="listmode-sr-only"> on %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
    <?php } ?>
<?php }
endif;