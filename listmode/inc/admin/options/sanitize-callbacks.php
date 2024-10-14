<?php
/**
* Sanitize callback functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && ( true == $input ) ) ? true : false );
}

function listmode_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function listmode_sanitize_date_type( $input, $setting ) {
    $valid = array('published','updated');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_logo_location( $input, $setting ) {
    $valid = array('beside-title','above-title');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_thumbnail_link( $input, $setting ) {
    $valid = array('yes','no');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_posts_navigation_type( $input, $setting ) {
    $valid = array('normalnavi','numberednavi');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_email( $input, $setting ) {
    if ( '' != $input && is_email( $input ) ) {
        $input = sanitize_email( $input );
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_snippet_type( $input, $setting ) {
    $valid = array('postexcerpt','postcontent');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_slider_display( $input, $setting ) {
    $valid = array(
            'front-page' => esc_html__( 'Home Page', 'listmode' ),
            'front-page-static' => esc_html__( 'Static Home Page', 'listmode' ),
            'blog-posts-index' => esc_html__( 'Blog Posts Index Page', 'listmode' ),
            'everywhere' => esc_html__( 'Everywhere', 'listmode' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_slider_post_type( $input, $setting ) {
    $valid = array('recentposts','catposts','tagposts');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_slider_post_orderby( $input, $setting ) {
    $valid = array('date','modified','comment_count');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_slider_post_order( $input, $setting ) {
    $valid = array('ASC','DESC');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function listmode_sanitize_positive_integer( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}