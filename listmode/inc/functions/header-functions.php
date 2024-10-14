<?php
/**
* Header Functions
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Header {

    private static $instance;

    /**
     * Constructor to add actions for initializing the header functionalities.
     */
    public function __construct() {
        add_action('wp_head', array($this, 'pingback_header'));
    }

    /**
     * Get the singleton instance of the class.
     *
     * @return ListMode_Header The instance of the class.
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Add a pingback URL auto-discovery header for single posts, pages, or attachments.
     */
    public function pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
    }

    /**
     * Get the custom logo URL.
     *
     * @return string URL of the custom logo.
     */
    public function custom_logo() {
        if ( ! has_custom_logo() ) {return;}
        $listmode_custom_logo_id = get_theme_mod( 'custom_logo' );
        $listmode_logo = wp_get_attachment_image_src( $listmode_custom_logo_id , 'full' );
        $listmode_logo_src = $listmode_logo[0];
        return apply_filters( 'listmode_custom_logo', $listmode_logo_src );
    }

    /**
     * Display the site title and description based on the context.
     */
    public function site_title() {
        if ( is_front_page() && is_home() ) { ?>
                <h1 class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_home() ) { ?>
                <h1 class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_singular() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_category() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_tag() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_author() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_search() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } elseif ( is_404() ) { ?>
                <p class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php } else { ?>
                <h1 class="listmode-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php if ( !(listmode_get_option('hide_tagline')) ) { ?><p class="listmode-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
        <?php }
    }

    /**
     * Get the destination URL for the header image.
     *
     * @return string URL of the header image destination.
     */
    public function header_image_destination() {
        $url = home_url( '/' );

        if ( listmode_get_option('header_image_destination') ) {
            $url = listmode_get_option('header_image_destination');
        }

        return apply_filters( 'listmode_header_image_destination', $url );
    }

    /**
     * Get the alt text for the header image.
     *
     * @return string Alt text for the header image.
     */
    public function header_image_alt_text() {
        $header_image_alt_text = get_bloginfo( 'name' );

        if ( listmode_get_option('header_image_alt_text') ) {
            $header_image_alt_text = listmode_get_option('header_image_alt_text');
        }

        return apply_filters( 'listmode_header_image_alt_text', $header_image_alt_text );
    }

    /**
     * Generate the HTML markup for the header image.
     */
    public function header_image_markup() {
        if ( get_header_image() ) {
            if ( listmode_get_option('remove_header_image_link') ) {
                the_header_image_tag( array( 'class' => 'listmode-header-img', 'alt' => esc_attr( $this->header_image_alt_text() ) ) );
            } else { ?>
                <a href="<?php echo esc_url( $this->header_image_destination() ); ?>" rel="home" class="listmode-header-img-link"><?php the_header_image_tag( array( 'class' => 'listmode-header-img', 'alt' => esc_attr( $this->header_image_alt_text() ) ) ); ?></a>
            <?php }
        }
    }

    /**
     * Display the details of the header image, including title and description.
     */
    public function header_image_details() {
        $header_image_custom_title = '';
        if ( listmode_get_option('header_image_custom_title') ) {
            $header_image_custom_title = listmode_get_option('header_image_custom_title');
        }

        $header_image_custom_description = '';
        if ( listmode_get_option('header_image_custom_description') ) {
            $header_image_custom_description = listmode_get_option('header_image_custom_description');
        }

        if ( !(listmode_get_option('hide_header_image_details')) ) {
        if ( listmode_get_option('header_image_custom_text') ) {
            if ( $header_image_custom_title || $header_image_custom_description ) { ?>
                <div class="listmode-header-image-info">
                <div class="listmode-header-image-info-inside">
                    <?php if ( !(listmode_get_option('hide_header_image_title')) ) { ?><?php if ( $header_image_custom_title ) { ?><p class="listmode-header-image-site-title listmode-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_title) ) ); ?></p><?php } ?><?php } ?>
                    <?php if ( !(listmode_get_option('hide_header_image_description')) ) { ?><?php if ( $header_image_custom_description ) { ?><p class="listmode-header-image-site-description listmode-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_description) ) ); ?></p><?php } ?><?php } ?>
                </div>
                </div>
            <?php }
        } else { ?>
            <div class="listmode-header-image-info">
            <div class="listmode-header-image-info-inside">
                <?php if ( !(listmode_get_option('hide_header_image_title')) ) { ?><p class="listmode-header-image-site-title listmode-header-image-block"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p><?php } ?>
                <?php if ( !(listmode_get_option('hide_header_image_description')) ) { ?><p class="listmode-header-image-site-description listmode-header-image-block"><?php bloginfo( 'description' ); ?></p><?php } ?>
            </div>
            </div>
        <?php }
        }
    }

    /**
     * Wrapper function to display the header image along with its details.
     */
    public function header_image_wrapper() { ?>
        <div class="listmode-header-image listmode-clearfix">
        <?php $this->header_image_markup(); ?>
        <?php $this->header_image_details(); ?>
        </div>
        <?php
    }

    /**
     * Display the header image based on the context and settings.
     */
    public function header_image() {
        if ( listmode_get_option('hide_header_image') ) { return; }
        if ( get_header_image() ) {
            $this->header_image_wrapper();
        }
    }

    /**
     * Get the maximum width for the logo.
     *
     * @return string Maximum width for the logo.
     */
    public function logo_max_width() {
        $logo_max_width = '320px';

        if ( listmode_get_option('logo_max_width') ) {
            $logo_max_width = listmode_get_option('logo_max_width');
        }

        return apply_filters( 'listmode_logo_max_width', $logo_max_width );
    }

}
// Initialize the instance
ListMode_Header::get_instance();