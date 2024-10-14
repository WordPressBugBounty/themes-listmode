<?php
/**
* Navigation options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_navigation_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 185;

    $wp_customize->add_section(
        'listmode_section_navigation',
        array(
            'title'    => esc_html__('Post/Posts Navigation Options', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'hide_post_navigation' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Post Navigation from Single Posts', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'hide_posts_navigation' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Posts Navigation from Home/Archive/Search Pages', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'posts_navigation_type' => array(
            'default'           => 'numberednavi',
            'sanitize_callback' => 'listmode_sanitize_posts_navigation_type',
            'control_label'     => esc_html__('Posts Navigation Type', 'listmode'),
            'control_description' => esc_html__('Select posts navigation type you need. If you activate WP-PageNavi plugin, this navigation will be replaced by WP-PageNavi navigation.', 'listmode'),
            'control_type'      => 'select',
            'choices'           => array(
                'normalnavi'    => esc_html__('Link Navigation', 'listmode'),
                'numberednavi'  => esc_html__('Numbered Navigation', 'listmode'),
            ),
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
                'section'     => 'listmode_section_navigation',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}