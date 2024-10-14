<?php
/**
* Singular Post options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_post_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 180;

    $wp_customize->add_section(
        'listmode_section_posts',
        array(
            'title'    => esc_html__('Singular Post Options', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'thumbnail_link' => array(
            'default'           => 'yes',
            'sanitize_callback' => 'listmode_sanitize_thumbnail_link',
            'control_label'     => esc_html__('Featured Image Link', 'listmode'),
            'control_description' => esc_html__('Do you want single post thumbnail to be linked to their post?', 'listmode'),
            'control_type'      => 'select',
            'choices'           => array('yes' => esc_html__('Yes', 'listmode'), 'no' => esc_html__('No', 'listmode')),
        ),
        'hide_thumbnail_single' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Featured Image from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'full_thumbnail_single' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Activate Full Width Featured Image for Single Posts', 'listmode'),
            'control_description' => esc_html__('If your full post featured image width is smaller than its post content, clicking this option it will display as full width image.', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_title' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Header from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'remove_post_title_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Remove Links from Single Post Titles', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_date' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Date from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'post_date_type' => array(
            'default'           => 'published',
            'sanitize_callback' => 'listmode_sanitize_date_type',
            'control_label'     => esc_html__('Post Date Type', 'listmode'),
            'control_description' => esc_html__('You can choose to display published or updated date on your post.', 'listmode'),
            'control_type'      => 'select',
            'choices'           => array('published' => esc_html__('Published', 'listmode'), 'updated' => esc_html__('Updated', 'listmode')),
        ),
        'hide_post_author' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Author from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_categories' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Categories from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_post_tags' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Tags from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_comments_link' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Comment Link from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_comment_form' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Comments/Comment Form from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'show_post_edit' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Show Post Edit Link on Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_author_bio_box' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Author Bio Box from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'no_underline_content_links' =>  array(
            'default' => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Do not Underline the Links within the Content', 'listmode'),
            'control_type'      => 'checkbox',
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
                'section'     => 'listmode_section_posts',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}