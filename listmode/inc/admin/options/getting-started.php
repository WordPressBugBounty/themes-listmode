<?php
/**
* Getting started options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_getting_started($wp_customize) {
    $panel_id  = 'listmode_main_options_panel';
    $priority  = 5;

    $wp_customize->add_section(
        'listmode_section_getting_started',
        array(
            'title'       => esc_html__('Getting Started', 'listmode'),
            'description' => esc_html__('Thanks for your interest in ListMode! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'listmode'),
            'panel'       => $panel_id,
            'priority'    => $priority,
        )
    );

    $listmode_options = array(
        'documentation' => array(
            'default'           => '',
            'sanitize_callback' => '__return_false',
            'control_label'     => esc_html__('Documentation', 'listmode'),
            'control_button_href'     => esc_url( 'https://themesdna.com/listmode-wordpress-theme/' ),
        ),
        'contact' => array(
            'default'           => '',
            'sanitize_callback' => '__return_false',
            'control_label'     => esc_html__('Contact Us', 'listmode'),
            'control_button_href'     => esc_url( 'https://themesdna.com/contact/' ),
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

        $wp_customize->add_control(
            new ListMode_Customize_Button_Control(
                $wp_customize,
                "listmode_{$option_name}_control",
                array(
                    'label'         => isset($option_args['control_label']) ? $option_args['control_label'] : '',
                    'section'       => 'listmode_section_getting_started',
                    'settings'      => "listmode_options[{$option_name}]",
                    'type'          => 'button',
                    'button_tag'    => 'a',
                    'button_class'  => 'button button-primary',
                    'button_href'   => isset($option_args['control_button_href']) ? $option_args['control_button_href'] : '#',
                    'button_target' => '_blank',
                )
            )
        );
    }
}