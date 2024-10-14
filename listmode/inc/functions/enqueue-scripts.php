<?php
/**
* Enqueue scripts and styles
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Enqueue {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'register_ie_scripts' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'register_block_editor_styles' ) );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'register_customizer_styles' ) );
    }

    /**
     * Register and enqueue main scripts and styles.
     */
    public function register_scripts() {
        $layout_instance = ListMode_Layout::get_instance();
        wp_enqueue_style('listmode-maincss', get_stylesheet_uri(), array(), null);
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), null );

        $listmode_font_subsets_array = listmode_get_option('font_subsets');
        if($listmode_font_subsets_array) {
            $listmode_font_subsets_list = rtrim(implode(',', $listmode_font_subsets_array), ',');
            $listmode_font_subsets_list = '&amp;subset='.$listmode_font_subsets_list;
        } else {
            $listmode_font_subsets_list = '';
        }
        if ( !listmode_get_option('disable_google_fonts') ) {
            wp_enqueue_style('listmode-webfont', '//fonts.googleapis.com/css?family=Oswald:400,700|Merriweather:400,400i,700,700i|Rubik:400,400i,700,700i&amp;display=swap'.$listmode_font_subsets_list, array(), null);
        }

        $listmode_sticky_header_active = false;
        $listmode_sticky_header_mobile_active = false;
        if ( $layout_instance->is_sticky_header_active() ) {
            $listmode_sticky_header_active = true;
        }
        if ( $layout_instance->is_sticky_mobile_header_active() ) {
            $listmode_sticky_header_mobile_active = true;
        }

        $listmode_primary_menu_active = false;
        if ( $layout_instance->is_primary_menu_active() ) {
            $listmode_primary_menu_active = true;
        }

        $listmode_sticky_sidebar_active = false;
        if ( $layout_instance->is_sticky_sidebar_active() ) {
            $listmode_sticky_sidebar_active = true;
        }
        if ( is_singular() ) {
            if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
               $listmode_sticky_sidebar_active = false;
            }
        } else {
            $listmode_sticky_sidebar_active = false;
        }
        if ( $listmode_sticky_sidebar_active ) {
            wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), null, true);
            wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), null, true);
        }

        $listmode_slider_active = false;
        if ( listmode_is_slider_active() ) {
            if ( 'front-page' === listmode_get_option('slider_display') ) {
                if ( is_front_page() && is_home() && !is_paged() ) {
                    $listmode_slider_active = true;
                }
            } elseif ( 'front-page-static' === listmode_get_option('slider_display') ) {
                if ( is_front_page() && is_singular() ) {
                    $listmode_slider_active = true;
                }
            } elseif ( 'blog-posts-index' === listmode_get_option('slider_display') ) {
                if ( is_home() && !is_paged() ) {
                    $listmode_slider_active = true;
                }
            } elseif ( 'everywhere' === listmode_get_option('slider_display') ) {
                    $listmode_slider_active = true;
            } else {
                if ( is_front_page() && is_home() && !is_paged() ) {
                    $listmode_slider_active = true;
                }
            }
        }
        if ( $listmode_slider_active ) {
            wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), null );
            wp_enqueue_script('owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array( 'jquery', 'imagesloaded' ), null, true);
        }

        $listmode_slider_autoplay = false;
        if ( listmode_get_option('slider_autoplay') ) {
            $listmode_slider_autoplay = true;
        }
        $listmode_slider_loop = false;
        if ( listmode_get_option('slider_loop') ) {
            $listmode_slider_loop = true;
        }
        $listmode_slider_autoplayhoverpause = false;
        if ( listmode_get_option('slider_autoplayhoverpause') ) {
            $listmode_slider_autoplayhoverpause = true;
        }
        $listmode_slider_autoplaytimeout = 1000;
        if ( listmode_get_option('slider_autoplaytimeout') ) {
            $listmode_slider_autoplaytimeout = listmode_get_option('slider_autoplaytimeout');
        }
        $listmode_slider_autoplayspeed = 200;
        if ( listmode_get_option('slider_autoplayspeed') ) {
            $listmode_slider_autoplayspeed = listmode_get_option('slider_autoplayspeed');
        }
        $listmode_show_dots_pagination = false;
        if ( listmode_get_option('show_dots_pagination') ) {
            $listmode_show_dots_pagination = true;
        }
        $listmode_show_next_prev_navigation = true;
        if ( listmode_get_option('hide_next_prev_navigation') ) {
            $listmode_show_next_prev_navigation = false;
        }

        $listmode_autoheight_active = false;
        if ( listmode_get_option('enable_autoheight') ) {
            $listmode_autoheight_active = true;
        }

        $listmode_slider_rtl = false;
        if ( is_rtl() ) {
            $listmode_slider_rtl = true;
        }

        $listmode_fitvids_active = false;
        if ( $layout_instance->is_fitvids_active() ) {
            $listmode_fitvids_active = true;
        }
        if ( $listmode_fitvids_active ) {
            wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), null, true);
        }

        $listmode_backtotop_active = false;
        if ( $layout_instance->is_backtotop_active() ) {
            $listmode_backtotop_active = true;
        }

        $listmode_posts_append_container = '.listmode-posts-container';

        wp_enqueue_script('listmode-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), null, true );
        wp_enqueue_script('listmode-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), null, true );
        wp_enqueue_script('listmode-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery', 'imagesloaded' ), null, true);
        wp_localize_script( 'listmode-customjs', 'listmode_ajax_object',
            array(
                'ajaxurl' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
                'primary_menu_active' => $listmode_primary_menu_active,
                'sticky_header_active' => $listmode_sticky_header_active,
                'sticky_header_mobile_active' => $listmode_sticky_header_mobile_active,
                'sticky_sidebar_active' => $listmode_sticky_sidebar_active,
                'slider_active' => $listmode_slider_active,
                'slider_autoplay' => $listmode_slider_autoplay,
                'slider_loop' => $listmode_slider_loop,
                'slider_autoplayhoverpause' => $listmode_slider_autoplayhoverpause,
                'slider_autoplaytimeout' => $listmode_slider_autoplaytimeout,
                'slider_autoplayspeed' => $listmode_slider_autoplayspeed,
                'show_dots_pagination' => $listmode_show_dots_pagination,
                'show_next_prev_navigation' => $listmode_show_next_prev_navigation,
                'autoheight_active' => $listmode_autoheight_active,
                'slider_rtl' => $listmode_slider_rtl,
                'fitvids_active' => $listmode_fitvids_active,
                'backtotop_active' => $listmode_backtotop_active,
            )
        );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script('listmode-html5shiv-js', get_template_directory_uri() .'/assets/js/html5shiv.js', array('jquery'), null, true);

        wp_localize_script('listmode-html5shiv-js','listmode_custom_script_vars',array(
            'elements_name' => esc_html__('abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video', 'listmode'),
        ));
    }

    /**
     * Register and enqueue IE specific scripts and styles.
     */
    public function register_ie_scripts() {
        // Add IE scripts and styles
        wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), null, false );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    }

    /**
     * Register and enqueue block editor styles.
     */
    public function register_block_editor_styles() {
        // Add block editor styles
        wp_enqueue_style( 'listmode-block-editor-style', get_template_directory_uri() . '/assets/css/editor-blocks.css', array(), null );
    }

    /**
     * Register and enqueue customizer styles.
     */
    public function register_customizer_styles() {
        // Add customizer styles and fontawesome
        wp_enqueue_style( 'listmode-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), null );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), null );
    }

}
new ListMode_Enqueue();