<?php
/**
* Custom Hooks
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Hooks {

    private static $instance;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function before_header() {
        do_action('listmode_before_header');
    }

    public function after_header() {
        do_action('listmode_after_header');
    }

    public function before_slider() {
        do_action('listmode_before_slider');
    }

    public function after_slider() {
        do_action('listmode_after_slider');
    }

    public function before_main_wrapper() {
        do_action('listmode_before_main_wrapper');
    }

    public function after_main_wrapper() {
        do_action('listmode_after_main_wrapper');
    }

    public function before_main_content() {
        do_action('listmode_before_main_content');
    }

    public function after_main_content() {
        do_action('listmode_after_main_content');
    }

    public function after_404_main_content() {
        do_action('listmode_after_404_main_content');
    }

    public function sidebar_one() {
        do_action('listmode_sidebar_one');
    }

    public function before_single_post() {
        do_action('listmode_before_single_post');
    }

    public function before_single_post_title() {
        do_action('listmode_before_single_post_title');
    }

    public function after_single_post_title() {
        do_action('listmode_after_single_post_title');
    }

    public function after_single_post_content() {
        do_action('listmode_after_single_post_content');
    }

    public function before_single_comment_form() {
        do_action('listmode_before_single_comment_form');
    }

    public function after_single_post() {
        do_action('listmode_after_single_post');
    }

    public function before_single_page() {
        do_action('listmode_before_single_page');
    }

    public function before_single_page_title() {
        do_action('listmode_before_single_page_title');
    }

    public function after_single_page_title() {
        do_action('listmode_after_single_page_title');
    }

    public function after_single_page_content() {
        do_action('listmode_after_single_page_content');
    }

    public function before_page_comment_form() {
        do_action('listmode_before_page_comment_form');
    }

    public function after_single_page() {
        do_action('listmode_after_single_page');
    }

    public function before_comments() {
        do_action('listmode_before_comments');
    }

    public function after_comments() {
        do_action('listmode_after_comments');
    }

    public function before_footer() {
        do_action('listmode_before_footer');
    }

    public function after_footer() {
        do_action('listmode_after_footer');
    }

}
// Initialize the instance
ListMode_Hooks::get_instance();