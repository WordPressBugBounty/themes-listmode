<?php
/**
* Upgrade to pro options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_upgrade_to_pro($wp_customize) {
    $section_id = 'listmode_section_upgrade';
    $priority = 400;

    $wp_customize->add_section(
        $section_id,
        array(
            'title'    => esc_html__('Upgrade to Pro Version', 'listmode'),
            'priority' => $priority,
        )
    );

    $wp_customize->add_setting(
        'listmode_options[upgrade_text]',
        array(
            'default'           => '',
            'sanitize_callback' => '__return_false',
        )
    );

    $pro_features = array(
        esc_html__('Color Options', 'listmode'),
        esc_html__('Font Options', 'listmode'),
        esc_html__('1/2/3/4/5 Columns for Posts Summaries', 'listmode'),
        esc_html__('Thumbnail Sizes Options for Posts Summaries', 'listmode'),
        esc_html__('Featured Posts Slider with More Options', 'listmode'),
        esc_html__('Layout Options for Posts/Pages', 'listmode'),
        esc_html__('Layout Options for Non-Singular Pages', 'listmode'),
        esc_html__('Width Change Options for Header/Secondary Menu/Slider/News Ticker/Footer/Main Area/Content/Sidebar', 'listmode'),
        esc_html__('Ajax Powered Featured Posts Widgets (Recent/Categories/Tags/PostIDs based)', 'listmode'),
        esc_html__('Ajax Powered Tabbed Widget (Recent/Categories/Tags/PostIDs based)', 'listmode'),
        esc_html__('Custom Page Templates', 'listmode'),
        esc_html__('Custom Post Templates', 'listmode'),
        esc_html__('Settings Panel to Control Options in Each Post', 'listmode'),
        esc_html__('Settings Panel to Control Options in Each Page', 'listmode'),
        esc_html__('Ability to Control Layout Style/Widths/Header Style/Footer Style of each Post/Page', 'listmode'),
        esc_html__('Capability to Add Different Header Images for Each Post/Page with Unique Link, Title and Description', 'listmode'),
        esc_html__('About and Social Widget - 60+ Social Buttons', 'listmode'),
        esc_html__('News Ticker (Recent/Categories/Tags/PostIDs based) - It can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'listmode'),
        esc_html__('Header Styles with Width Options - (Logo + Primary Menu + Social Buttons) / (Logo + Header Banner) / (Full Width Header)', 'listmode'),
        esc_html__('Footer Layout Styles (1/2/3/4/5/6 Columns) with Width Options', 'listmode'),
        esc_html__('Built-in Posts Views Counter', 'listmode'),
        esc_html__('Built-in Posts Likes System', 'listmode'),
        esc_html__('Built-in Infinite Scroll and Load More Button', 'listmode'),
        esc_html__('Post Share Buttons with Options - 25+ Social Networks are Supported', 'listmode'),
        esc_html__('Related Posts (Categories/Tags/Author/PostIDs based) with Options', 'listmode'),
        esc_html__('Author Bio Box with Social Buttons - 60+ Social Buttons', 'listmode'),
        esc_html__('Ability to add Ads under Post Title and under Post Content', 'listmode'),
        esc_html__('Ability to Enable/Disable Mobile View from Primary and Secondary Menus', 'listmode'),
        esc_html__('Ability to Disable Google Fonts - for faster loading', 'listmode'),
        esc_html__('Sticky Header/Sticky Sidebar with enable/disable capability', 'listmode'),
        esc_html__('Post Navigation with Thumbnails', 'listmode'),
        esc_html__('More Widget Areas', 'listmode'),
        esc_html__('Built-in Contact Form', 'listmode'),
        esc_html__('WooCommerce Compatible', 'listmode'),
        esc_html__('Yoast SEO Breadcrumbs Support', 'listmode'),
        esc_html__('Search Engine Optimized', 'listmode'),
        esc_html__('Full RTL Language Support', 'listmode'),
        esc_html__('Random Posts Button in Header', 'listmode'),
        esc_html__('Many Useful Customizer Theme options', 'listmode'),
        esc_html__('More Features...', 'listmode'),
    );

    $features_list = '<ul class="listmode-customizer-pro-features">';
    foreach ($pro_features as $feature) {
        $features_list .= '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html($feature) . '</li>';
    }
    $features_list .= '</ul>';

    $wp_customize->add_control(
        new ListMode_Customize_Static_Text_Control(
            $wp_customize,
            'listmode_upgrade_text_control',
            array(
                'label'       => esc_html__('ListMode Pro', 'listmode'),
                'section'     => $section_id,
                'settings'    => 'listmode_options[upgrade_text]',
                'description' => esc_html__('Do you enjoy ListMode? Upgrade to ListMode Pro now and get:', 'listmode') . $features_list . '<strong><a href="' . LISTMODE_PROURL . '" class="button button-primary" target="_blank"><i class="fas fa-shopping-cart" aria-hidden="true"></i> ' . esc_html__('Upgrade To ListMode PRO', 'listmode') . '</a></strong>',
            )
        )
    );
}