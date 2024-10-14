<?php
/**
* Slider options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_slider_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 145;

    $wp_customize->add_section(
        'listmode_section_slider',
        array(
            'title' => esc_html__('Slider Options', 'listmode'),
            'panel' => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'enable_slider' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Enable Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'show_slider_heading' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Show Slider Heading', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slider_heading' => array(
            'default' => esc_html__('Featured Posts Slider', 'listmode'),
            'sanitize_callback' => 'sanitize_text_field',
            'control_label' => esc_html__('Slider Heading', 'listmode'),
            'control_type' => 'text',
        ),
        'slider_display' => array(
            'default' => 'front-page',
            'sanitize_callback' => 'listmode_sanitize_slider_display',
            'control_label' => esc_html__('Slider Display Location', 'listmode'),
            'control_description' => esc_html__('Select the slider display location.', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'front-page' => esc_html__('Home Page', 'listmode'),
                'front-page-static' => esc_html__('Static Home Page', 'listmode'),
                'blog-posts-index' => esc_html__('Blog Posts Index Page', 'listmode'),
                'everywhere' => esc_html__('Everywhere', 'listmode'),
            ),
        ),
        'slider_length' => array(
            'default' => 10,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label' => esc_html__('Number of Posts on Slider', 'listmode'),
            'control_description' => esc_html__('Enter the number of posts you need to display in the slider area. Default is 10 posts.', 'listmode'),
            'control_type' => 'text',
        ),
        'slider_post_type' => array(
            'default' => 'recentposts',
            'sanitize_callback' => 'listmode_sanitize_slider_post_type',
            'control_label' => esc_html__('Slider Posts Type', 'listmode'),
            'control_description' => esc_html__('Select a post type to display in the slider.', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'recentposts' => esc_html__('Recent Posts', 'listmode'),
                'catposts' => esc_html__('Category Posts', 'listmode'),
                'tagposts' => esc_html__('Tag Posts', 'listmode'),
            ),
        ),
        'slider_cat' => array(
            'default' => 0,
            'sanitize_callback' => 'absint',
            'control_label' => esc_html__('Slider Posts Category', 'listmode'),
            'control_description' => esc_html__('Select a category if "Slider Posts Type" option is Category Posts', 'listmode'),
            'control_type' => 'listmode_customize_category',
        ),
        'slider_tag' => array(
            'default' => 0,
            'sanitize_callback' => 'absint',
            'control_label' => esc_html__('Slider Posts Tag', 'listmode'),
            'control_description' => esc_html__('Select a tag if "Slider Posts Type" option is Tag Posts', 'listmode'),
            'control_type' => 'listmode_customize_category',
        ),
        'slider_post_orderby' => array(
            'default' => 'date',
            'sanitize_callback' => 'listmode_sanitize_slider_post_orderby',
            'control_label' => esc_html__('Slider Posts Orderby', 'listmode'),
            'control_description' => esc_html__('Select a posts orderby value for slider.', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'date' => esc_html__('Published Date', 'listmode'),
                'modified' => esc_html__('Modified Date', 'listmode'),
                'comment_count' => esc_html__('Number of Comments', 'listmode'),
            ),
        ),
        'slider_post_order' => array(
            'default' => 'DESC',
            'sanitize_callback' => 'listmode_sanitize_slider_post_order',
            'control_label' => esc_html__('Slider Posts Order', 'listmode'),
            'control_description' => esc_html__('Select a posts order value for slider.', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'ASC' => esc_html__('Ascending order', 'listmode'),
                'DESC' => esc_html__('Descending order', 'listmode'),
            ),
        ),
        'hide_thumbnail_slider' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Featured Images from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'hide_default_thumbnail_slider' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Default Featured Image from Slider', 'listmode'),
            'control_description' => esc_html__('The default thumbnail image is shown when there is no featured image is set.', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'remove_thumbnail_slider_link' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Remove Links from Slider Featured Images', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'hide_post_title_slider' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Post Titles from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'remove_post_title_slider_link' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Remove Links from Slider Post Titles', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'limit_slider_post_titles' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Limit the Length of Slider Post Titles', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'post_title_length_slider' => array(
            'default' => 6,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label' => esc_html__('Maximum Length of Slider Post Titles', 'listmode'),
            'control_description' => esc_html__('Enter the maximum number of words need to display in slider post titles. Default is 6 words. This option only work if you have checked the option "Limit the Length of Slider Post Titles".', 'listmode'),
            'control_type' => 'text',
        ),
        'hide_slide_author' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Post Authors from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'remove_slide_author_link' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Remove Links from Slider Post Authors', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'hide_slide_date' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Posted Dates from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slider_dateformat' => array(
            'default' => 'F j, Y',
            'sanitize_callback' => 'sanitize_text_field',
            'control_label' => esc_html__('Slider Date Format', 'listmode'),
            'control_description' => esc_html__('Default value: F j, Y', 'listmode'),
            'control_type' => 'text',
        ),
        'slide_date_type' => array(
            'default' => 'published',
            'sanitize_callback' => 'listmode_sanitize_date_type',
            'control_label' => esc_html__('Slider Post Date Type', 'listmode'),
            'control_description' => esc_html__('You can choose to display published or updated date of your post.', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'published' => esc_html__('Published', 'listmode'),
                'updated' => esc_html__('Updated', 'listmode'),
            ),
        ),
        'show_slide_comments' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Show Post Comments on Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'show_slide_cats' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Show Post Categories on Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'remove_slide_cats_link' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Remove Links from Slider Post Categories', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slide_cat_links_text' => array(
            'default' => '',
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label' => esc_html__('Slider Post Categories Pre Text', 'listmode'),
            'control_description' => esc_html__('Enter a text to display before post categories. For example, you can add the text "Posted in:".', 'listmode'),
            'control_type' => 'text',
        ),
        'show_slide_tags' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Show Post Tags on Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'remove_slide_tags_link' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Remove Links from Slider Post Tags', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slide_tag_links_text' => array(
            'default' => '',
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label' => esc_html__('Slider Post Tags Pre Text', 'listmode'),
            'control_description' => esc_html__('Enter a text to display before post tags. For example, you can add the text "Tagged:".', 'listmode'),
            'control_type' => 'text',
        ),
        'hide_post_snippet_slider' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide Post Snippets from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'snippet_type_slider' => array(
            'default' => 'postexcerpt',
            'sanitize_callback' => 'listmode_sanitize_snippet_type',
            'control_label' => esc_html__('Post Snippets Type of Slider', 'listmode'),
            'control_type' => 'select',
            'choices' => array(
                'postexcerpt' => esc_html__('Post Excerpt', 'listmode'),
                'postcontent' => esc_html__('Post Content', 'listmode'),
            ),
        ),
        'snippet_length_slider' => array(
            'default' => 20,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label' => esc_html__('Post Snippets Length of Slider', 'listmode'),
            'control_description' => esc_html__('Enter the number of words need to display in slider post summaries. Default is 20 words. This option only work if you have selected "Post Content" value for "Post Snippets Type of Slider" option. To change "Post Excerpt" length, go to Appearance : Customize : Theme Options : Posts Summaries Options : Post Snippets Length of Posts Summaries.', 'listmode'),
            'control_type' => 'text',
        ),
        'slider_autoplay' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Enable Autoplay for Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slider_autoplayhoverpause' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Enable "Pause on Mouse Hover" Feature for Slider', 'listmode'),
            'control_description' => esc_html__('When you enable this feature, slides will pause on mouse hover. This option has no effect until you check the option "Enable Autoplay for Slider".', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'slider_autoplaytimeout' => array(
            'default' => 1000,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label' => esc_html__('Slider "Autoplay Interval Timeout"', 'listmode'),
            'control_description' => esc_html__('Enter the slider autoplay interval timeout in milliseconds. Default is 1000. This option has no effect until you check the option "Enable Autoplay for Slider".', 'listmode'),
            'control_type' => 'text',
        ),
        'slider_autoplayspeed' => array(
            'default' => 200,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label' => esc_html__('Slider "Autoplay Speed"', 'listmode'),
            'control_description' => esc_html__('Enter the slider autoplay speed in milliseconds. Default is 200. This option has no effect until you check the option "Enable Autoplay for Slider".', 'listmode'),
            'control_type' => 'text',
        ),
        'slider_loop' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Enable "Loop" Feature for Slider', 'listmode'),
            'control_description' => esc_html__('When you enable this feature, it will duplicate last and first slide items to get loop illusion.', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'show_dots_pagination' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Show Dots Navigation(Pagination) on Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'hide_next_prev_navigation' => array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Hide next/prev Buttons(Navigation) from Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
        'enable_autoheight' => array(
            'default' => false,


            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label' => esc_html__('Enable "Auto Height" Feature on Slider', 'listmode'),
            'control_type' => 'checkbox',
        ),
    );

    foreach ($listmode_options as $option_name => $option_args) {
        $wp_customize->add_setting("listmode_options[{$option_name}]",
            array(
                'default'     => isset($option_args['default']) ? $option_args['default'] : '',
                'type'        => isset($option_args['type']) ? $option_args['type'] : 'option',
                'capability'  => isset($option_args['capability']) ? $option_args['capability'] : 'edit_theme_options',
                'sanitize_callback'  => isset($option_args['sanitize_callback']) ? $option_args['sanitize_callback'] : '',
            )
        );

        $wp_customize->add_control("listmode_{$option_name}_control",
            array(
                'label'       => isset($option_args['control_label']) ? $option_args['control_label'] : '',
                'section'     => 'listmode_section_slider',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}