<?php
/**
* Slider
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Get slider category links text
 *
 * @return string The slider category links text.
 */
function listmode_slide_cat_links_text() {
    if ( listmode_is_option_set('slide_cat_links_text') ) {
        $slide_cat_links_text = listmode_get_option('slide_cat_links_text');
    } else {
        $slide_cat_links_text = '';
    }
    return apply_filters( 'listmode_slide_cat_links_text', $slide_cat_links_text );
}

/**
 * Get slider tag links text
 *
 * @return string The slider tag links text.
 */
function listmode_slide_tag_links_text() {
    if ( listmode_is_option_set('slide_tag_links_text') ) {
        $slide_tag_links_text = listmode_get_option('slide_tag_links_text');
    } else {
        $slide_tag_links_text = '';
    }
    return apply_filters( 'listmode_slide_tag_links_text', $slide_tag_links_text );
}

/**
 * Check if slider is active
 *
 * @return bool True if slider is active, false otherwise.
 */
function listmode_is_slider_active() {
    $slider_active = false;

    if ( listmode_get_option('enable_slider') ) {
        $slider_active = true;
    }

    return apply_filters( 'listmode_is_slider_active', $slider_active );
}

if ( ! function_exists( 'listmode_slider' ) ) :

/**
 * Display slider
 */
function listmode_slider() { ?>

<?php $listmode_hooks_instance = ListMode_Hooks::get_instance(); $listmode_hooks_instance->before_slider(); ?>

<div class="listmode-slider-wrapper-outside listmode-clearfix">
<div class="listmode-slider-wrapper">
<div class="listmode-outer-wrapper listmode-slider-outer-wrapper">
    <?php
    $slider_length = 10;
    if ( listmode_get_option('slider_length') ) {
        $slider_length = listmode_get_option('slider_length');
    }

    $slider_post_type = 'recentposts';
    if ( listmode_get_option('slider_post_type') ) {
        $slider_post_type = listmode_get_option('slider_post_type');
    }

    $slider_cat = listmode_get_option('slider_cat');
    $slider_tag = listmode_get_option('slider_tag');

    $slider_post_orderby = 'date';
    if ( listmode_get_option('slider_post_orderby') ) {
        $slider_post_orderby = listmode_get_option('slider_post_orderby');
    }

    $slider_post_order = 'DESC';
    if ( listmode_get_option('slider_post_order') ) {
        $slider_post_order = listmode_get_option('slider_post_order');
    }

    $slider_dateformat = 'F j, Y';
    if ( listmode_get_option('slider_dateformat') ) {
        $slider_dateformat = listmode_get_option('slider_dateformat');
    }

    $post_title_length_slider = 6;
    if ( listmode_get_option('post_title_length_slider') ) {
        $post_title_length_slider = listmode_get_option('post_title_length_slider');
    }

    $snippet_length_slider = 20;
    if ( listmode_get_option('snippet_length_slider') ) {
        $snippet_length_slider = listmode_get_option('snippet_length_slider');
    }

    $snippet_type_slider = 'postexcerpt';
    if ( listmode_get_option('snippet_type_slider') ) {
        $snippet_type_slider = listmode_get_option('snippet_type_slider');
    }

    if(($slider_post_type === 'catposts') && $slider_cat) {
        $slider_query = new WP_Query( array( 'orderby' => $slider_post_orderby, 'order' => $slider_post_order, 'posts_per_page' => $slider_length, 'nopaging' => false, 'post_status' => array( 'publish' ), 'ignore_sticky_posts' => true, 'post_type' => array( 'post' ), 'cat' => $slider_cat, 'no_found_rows' => true ) );
    } elseif(($slider_post_type === 'tagposts') && $slider_tag) {
        $slider_query = new WP_Query( array( 'orderby' => $slider_post_orderby, 'order' => $slider_post_order, 'posts_per_page' => $slider_length, 'nopaging' => false, 'post_status' => array( 'publish' ), 'ignore_sticky_posts' => true, 'post_type' => array( 'post' ), 'tag_id' => $slider_tag, 'no_found_rows' => true ) );
    } else {
        $slider_query = new WP_Query( array( 'orderby' => $slider_post_orderby, 'order' => $slider_post_order, 'posts_per_page' => $slider_length, 'nopaging' => false, 'post_status' => array( 'publish' ), 'ignore_sticky_posts' => true, 'post_type' => array( 'post' ), 'no_found_rows' => true ) );
    }

    if ($slider_query->have_posts()) : ?>

    <?php if ( listmode_get_option('show_slider_heading') ) { ?>
    <?php if ( listmode_get_option('slider_heading') ) : ?>
    <div class="listmode-slider-header"><div class="listmode-slider-header-inside"><h2 class="listmode-slider-heading"><span class="listmode-slider-heading-inside"><?php echo esc_html( listmode_get_option('slider_heading') ); ?></span></h2></div></div>
    <?php else : ?>
    <div class="listmode-slider-header"><div class="listmode-slider-header-inside"><h2 class="listmode-slider-heading"><span class="listmode-slider-heading-inside"><?php esc_html_e( 'Featured Posts Slider', 'listmode' ); ?></span></h2></div></div>
    <?php endif; ?>
    <?php } ?>

    <div class="listmode-slider-items listmode-clearfix">
    <div class="listmode-posts-carousel">
    <div class="owl-carousel owl-theme">
    <?php while ($slider_query->have_posts()) : $slider_query->the_post();  ?>

        <div class="listmode-slide-item">
        <?php $listmode_slider_post_content = get_the_content(); ?>
        <div class="listmode-fslider-post-wrapper">
        <div id="post-<?php the_ID(); ?>" class="listmode-fslider-post listmode-slider-box">
        <div class="listmode-fslider-post-inside listmode-slider-box-inside">

            <?php if ( !(listmode_get_option('hide_thumbnail_slider')) ) { ?>
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="listmode-fslider-post-thumbnail listmode-fp-post-thumbnail listmode-fslider-post-thumbnail-float listmode-fslider-post-thumbnail-100">
                    <?php if ( listmode_get_option('remove_thumbnail_slider_link') ) { ?>
                        <?php the_post_thumbnail('listmode-100w-100h-image', array('class' => 'listmode-fslider-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?>
                    <?php } else { ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-fslider-post-thumbnail-link"><?php the_post_thumbnail('listmode-100w-100h-image', array('class' => 'listmode-fslider-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <?php if ( !(listmode_get_option('hide_default_thumbnail_slider')) ) { ?>
                <div class="listmode-fslider-post-thumbnail listmode-fp-post-thumbnail listmode-fslider-post-thumbnail-float listmode-fslider-post-thumbnail-100">
                    <?php if ( listmode_get_option('remove_thumbnail_slider_link') ) { ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-100-100.jpg' ); ?>" class="listmode-fslider-post-thumbnail-img"/>
                    <?php } else { ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'listmode' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="listmode-fslider-post-thumbnail-link"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-100-100.jpg' ); ?>" class="listmode-fslider-post-thumbnail-img"/></a>
                    <?php } ?>
                </div>
                <?php } ?>
            <?php } ?>
            <?php } ?>

            <?php if ( listmode_get_option('show_slide_cats') && has_category() && ('post' == get_post_type()) ) { ?>
                <?php if ( listmode_get_option('remove_slide_cats_link') ) { ?>
                    <?php
                    if ( 'post' == get_post_type() ) {
                        $listmode_categories = get_the_category();
                        $listmode_category_names = '';
                        if ( ! empty( $listmode_categories ) ) {
                            foreach ( $listmode_categories as $listmode_category ) {
                                $listmode_category_names .= $listmode_category->cat_name . ', ';
                            }
                            if ( $listmode_category_names ) { ?>
                                <div class="listmode-fslider-post-categories listmode-fslider-post-taxonomies"><?php if(listmode_slide_cat_links_text()) { ?><span class="listmode-fslider-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_slide_cat_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( rtrim( $listmode_category_names, esc_html__( ', ', 'listmode' ) ) ); ?></div>
                            <?php }
                        }
                    }
                    ?>
                <?php } else { ?>
                    <?php
                    if ( 'post' == get_post_type() ) {
                        /* translators: used between list items, there is a space after the comma */
                        $listmode_categories_list = get_the_category_list( esc_html__( ', ', 'listmode' ) );
                        if ( $listmode_categories_list ) { ?>
                            <div class="listmode-fslider-post-categories listmode-fslider-post-taxonomies"><?php if(listmode_slide_cat_links_text()) { ?><span class="listmode-fslider-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_slide_cat_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( $listmode_categories_list ); ?></div>
                        <?php }
                    }
                    ?>
                <?php } ?>
            <?php } ?>

            <?php if ( listmode_get_option('show_slide_tags') && has_tag() && ('post' == get_post_type()) ) { ?>
                <?php if ( listmode_get_option('remove_slide_tags_link') ) { ?>
                    <?php
                    if ( 'post' == get_post_type() ) {
                        $listmode_tags = get_the_tags(get_the_ID());
                        $listmode_tag_names = '';
                        if ( ! empty( $listmode_tags ) ) {
                            foreach ( $listmode_tags as $listmode_tag ) {
                                $listmode_tag_names .= $listmode_tag->name . ', ';
                            }
                            if ( $listmode_tag_names ) { ?>
                                <div class="listmode-fslider-post-tags listmode-fslider-post-taxonomies"><?php if(listmode_slide_tag_links_text()) { ?><span class="listmode-fslider-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_slide_tag_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( rtrim( $listmode_tag_names, esc_html__( ', ', 'listmode' ) ) ); ?></div>
                            <?php }
                        }
                    }
                    ?>
                <?php } else { ?>
                    <?php
                    if ( 'post' == get_post_type() ) {
                        /* translators: used between list items, there is a space after the comma */
                        $listmode_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'listmode' ) );
                        if ( $listmode_tags_list ) { ?>
                            <div class="listmode-fslider-post-tags listmode-fslider-post-taxonomies"><?php if(listmode_slide_tag_links_text()) { ?><span class="listmode-fslider-post-taxonomies-meta-text"><?php echo wp_kses_post(listmode_slide_tag_links_text()); ?>&nbsp;</span><?php } ?><?php echo wp_kses_post( $listmode_tags_list ); ?></div>
                        <?php }
                    }
                    ?>
                <?php } ?>
            <?php } ?>

            <?php if ( !(listmode_get_option('hide_post_title_slider')) ) { ?>
                <?php if ( listmode_get_option('remove_post_title_slider_link') ) { ?>

                    <?php if ( listmode_get_option('limit_slider_post_titles') ) { ?>
                        <h2 class="listmode-fslider-post-title"><?php echo esc_html( wp_trim_words( get_the_title(), $post_title_length_slider, '...' ) ); ?></h2>
                    <?php } else { ?>
                        <?php the_title( '<h2 class="listmode-fslider-post-title">', '</h2>' ); ?>
                    <?php } ?>

                <?php } else { ?>

                    <?php if ( listmode_get_option('limit_slider_post_titles') ) { ?>
                        <h2 class="listmode-fslider-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( wp_trim_words( get_the_title(), $post_title_length_slider, '...' ) ); ?></a></h2>
                    <?php } else { ?>
                        <?php the_title( sprintf( '<h2 class="listmode-fslider-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    <?php } ?>

                <?php } ?>
            <?php } ?>

            <?php if ( !(listmode_get_option('hide_slide_author')) || !(listmode_get_option('hide_slide_date')) || listmode_get_option('show_slide_comments') ) { ?>
            <div class="listmode-fslider-post-meta">
            <?php if ( !(listmode_get_option('hide_slide_author')) ) { ?><?php if ( listmode_get_option('remove_slide_author_link') ) { ?><span class="listmode-fslider-post-meta-author listmode-fslider-post-meta-element"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_author() ); ?></span><?php } else { ?><span class="listmode-fslider-post-meta-author listmode-fslider-post-meta-element"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?><?php } ?>
            <?php if ( listmode_get_option('slide_date_type') == 'updated' ) { ?>
                <?php if ( !(listmode_get_option('hide_slide_date')) ) { ?><span class="listmode-fslider-post-meta-date listmode-fslider-post-meta-element"><span class="listmode-entry-meta-icon"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_modified_date($slider_dateformat) ); ?></span><?php } ?>
            <?php } else { ?>
                <?php if ( !(listmode_get_option('hide_slide_date')) ) { ?><span class="listmode-fslider-post-meta-date listmode-fslider-post-meta-element"><span class="listmode-entry-meta-icon"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;</span><?php echo esc_html( get_the_date($slider_dateformat) ); ?></span><?php } ?>
            <?php } ?>
            <?php if ( listmode_get_option('show_slide_comments') ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
            <span class="listmode-fslider-post-meta-comment listmode-fslider-post-meta-element"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comments<span class="listmode-sr-only"> on %s</span>', 'listmode' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
            <?php } ?><?php } ?>
            </div>
            <?php } ?>

            <?php if ( !(listmode_get_option('hide_post_snippet_slider')) ) { ?>
                <?php if ( !empty( $listmode_slider_post_content ) ) { ?>
                    <?php if(($snippet_type_slider === 'postexcerpt')) { ?>
                        <div class="listmode-fslider-post-snippet listmode-fpslider-post-snippet listmode-fslider-post-excerpt listmode-fpslider-post-excerpt"><?php the_excerpt(); ?></div>
                    <?php } else { ?>
                        <div class="listmode-fslider-post-snippet listmode-fpslider-post-snippet"><?php echo esc_html( wp_trim_words( get_the_content(), $snippet_length_slider, '...' ) ); ?></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

        </div>
        </div>
        </div>
        </div>

    <?php endwhile; ?>
    </div>
    </div>
    </div>

    <?php wp_reset_postdata();  // Restore global post data stomped by the_post().
    endif; ?>
</div>
</div>
</div>

<?php $listmode_hooks_instance->after_slider(); ?>

<?php }

endif;

/**
 * Display slider area based on settings
 */
function listmode_slider_area() {
    if ( listmode_is_slider_active() ) {
        if ( 'front-page' === listmode_get_option('slider_display') ) {
            if ( is_front_page() && is_home() && !is_paged() ) {
                listmode_slider();
            }
        } elseif ( 'front-page-static' === listmode_get_option('slider_display') ) {
            if ( is_front_page() && is_singular() ) {
                listmode_slider();
            }
        } elseif ( 'blog-posts-index' === listmode_get_option('slider_display') ) {
            if ( is_home() && !is_paged() ) {
                listmode_slider();
            }
        } else {
            if ( is_front_page() && is_home() && !is_paged() ) {
                listmode_slider();
            }
        }
    }
}