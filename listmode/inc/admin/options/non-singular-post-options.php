<?php
/**
* Post Summaries options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_post_summaries_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 175;

    $wp_customize->add_section(
        'listmode_section_posts_summaries',
        array(
            'title'    => esc_html__('Posts Summaries Options', 'listmode'),
            'description'    => esc_html__('To display your latest posts on your homepage, please set the "Your homepage displays" option to "Your latest posts." You can find this setting in your WordPress Dashboard by navigating to "Settings" -> "Reading" -> "Your homepage displays."', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'hide_posts_heading' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide HomePage Posts Heading', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'posts_heading' => array(
            'default'           => esc_html__('Recent Posts', 'listmode'),
            'sanitize_callback' => 'sanitize_text_field',
            'control_label'     => esc_html__('HomePage Posts Heading', 'listmode'),
            'control_type'      => 'text',
        ),
        'hide_thumbnail_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Thumbnails from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_default_thumbnail_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Default Images from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_thumbnail_home_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Thumbnails of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_title_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Titles from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_post_title_home_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Post Titles of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'limit_post_titles_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Limit the Length of Post Titles of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'post_title_home_length' => array(
            'default'           => 6,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label'     => esc_html__('Maximum Length of Post Titles of Posts Summaries', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Enter the maximum length of post titles for post summaries on the homepage.', 'listmode'),
        ),
        'hide_post_author_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Authors from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_post_author_home_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Post Authors of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_date_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Dates from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'post_date_home_type' => array(
            'default'           => 'published',
            'sanitize_callback' => 'listmode_sanitize_date_type',
            'control_label'     => esc_html__('Post Date Type of Posts Summaries', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Select the type of post date to display in post summaries on the homepage.', 'listmode'),
        ),
        'show_comments_link_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Show Comment Links from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'show_post_categories_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Show Post Categories on Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_post_categories_home_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Post Categories of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'cat_links_text' => array(
            'default'           => '',
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('Post Categories Pre Text', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Enter the pre-text for post categories in post summaries on the homepage.', 'listmode'),
        ),
        'show_post_tags_home' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Show Post Tags on Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_post_tags_home_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Post Tags of Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'tag_links_text' => array(
            'default'           => '',
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('Post Tags Pre Text', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Enter the pre-text for post tags in post summaries on the homepage.', 'listmode'),
        ),
        'hide_post_snippet' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Snippets from Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'read_more_length' => array(
            'default'           => 15,
            'sanitize_callback' => 'listmode_sanitize_positive_integer',
            'control_label'     => esc_html__('Post Snippets Length of Posts Summaries', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Enter the length of post snippets for post summaries on the homepage.', 'listmode'),
        ),
        'show_read_more_button' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Show Read More Buttons on Posts Summaries', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'read_more_text' => array(
            'default'           => esc_html__('Continue Reading', 'listmode'),
            'sanitize_callback' => 'sanitize_text_field',
            'control_label'     => esc_html__('Read More Text', 'listmode'),
            'control_type'      => 'text',
        ),
        'mini_post_padding' => array(
            'default'           => '8px',
            'sanitize_callback' => 'sanitize_text_field',
            'control_label'     => esc_html__('Posts Summaries Padding', 'listmode'),
            'control_type'      => 'text',
            'control_description'       => esc_html__('Enter the padding for post summaries on the homepage.', 'listmode'),
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
                'section'     => 'listmode_section_posts_summaries',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            ));
    }
}