<?php
/**
* Other options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_other_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 600;

    $wp_customize->add_section(
        'listmode_section_other_options',
        array(
            'title'    => esc_html__('Other Options', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'enable_widgets_block_editor' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Enable Gutenberg Widget Block Editor', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'disable_loading_animation' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Disable Site Loading Animation', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'disable_sticky_sidebar' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Disable Sticky Feature from Sidebar', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'disable_fitvids' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Disable FitVids.JS', 'listmode'),
            'control_description' => esc_html__('You can disable fitvids.js script if you are not using videos on your website or if you do not want fluid width videos in your post content.', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'disable_backtotop' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Disable Back to Top Button', 'listmode'),
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
                'section'     => 'listmode_section_other_options',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}