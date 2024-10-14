<?php
/**
* Search and 404 Page options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_search_404_options($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 340;

    $wp_customize->add_section(
        'listmode_section_search_404',
        array(
            'title'    => esc_html__('Search and 404 Pages Options', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'hide_search_results_heading' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Search Results Heading', 'listmode'),
            'control_type'      => 'checkbox',
        ),
        'search_results_heading' => array(
            'default'           => esc_html__('Search Results for:', 'listmode'),
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('Search Results Heading', 'listmode'),
            'control_description' => esc_html__('Enter a sentence to display before the search query.', 'listmode'),
            'control_type'      => 'text',
        ),
        'no_search_heading' => array(
            'default'           => esc_html__('Nothing Found', 'listmode'),
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('No Search Results Heading', 'listmode'),
            'control_description' => esc_html__('Enter a heading to display when no search results are found.', 'listmode'),
            'control_type'      => 'text',
        ),
        'no_search_results' => array(
            'default'           => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'listmode'),
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('No Search Results Message', 'listmode'),
            'control_description' => esc_html__('Enter a message to display when no search results are found.', 'listmode'),
            'control_type'      => 'textarea',
        ),
        'error_404_heading' => array(
            'default'           => esc_html__('Oops! That page can not be found.', 'listmode'),
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('404 Error Page Heading', 'listmode'),
            'control_description' => esc_html__('Enter the heading for the 404 error page.', 'listmode'),
            'control_type'      => 'text',
        ),
        'error_404_message' => array(
            'default'           => esc_html__('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'listmode'),
            'sanitize_callback' => 'listmode_sanitize_html',
            'control_label'     => esc_html__('Error 404 Message', 'listmode'),
            'control_description' => esc_html__('Enter a message to display on the 404 error page.', 'listmode'),
            'control_type'      => 'textarea',
        ),
        'hide_404_search' => array(
            'default'           => false,
            'sanitize_callback' => 'listmode_sanitize_checkbox',
            'control_label'     => esc_html__('Hide Search Box from 404 Page', 'listmode'),
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
                'section'     => 'listmode_section_search_404',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}