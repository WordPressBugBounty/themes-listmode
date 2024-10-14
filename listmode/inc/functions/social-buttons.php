<?php
/**
* Social buttons
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

class ListMode_Social {

    private $socialLinks;
    private static $instance;

    public function __construct() {
        $this->socialLinks = [
            'twitterlink' => ['class' => 'listmode-sticky-social-icon-twitter', 'aria-label' => esc_attr__('X Button', 'listmode'), 'title' => esc_attr__('X', 'listmode'), 'icon' => 'fab fa-x-twitter'],
            'facebooklink' => ['class' => 'listmode-sticky-social-icon-facebook', 'aria-label' => esc_attr__('Facebook Button', 'listmode'), 'title' => esc_attr__('Facebook', 'listmode'), 'icon' => 'fab fa-facebook-f'],
            'threadslink' => ['class' => 'listmode-sticky-social-icon-threads', 'aria-label' => esc_attr__('Threads Button', 'listmode'), 'title' => esc_attr__('Threads', 'listmode'), 'icon' => 'fab fa-threads'],
            'pinterestlink' => ['class' => 'listmode-sticky-social-icon-pinterest', 'aria-label' => esc_attr__('Pinterest Button', 'listmode'), 'title' => esc_attr__('Pinterest', 'listmode'), 'icon' => 'fab fa-pinterest'],
            'linkedinlink' => ['class' => 'listmode-sticky-social-icon-linkedin', 'aria-label' => esc_attr__('LinkedIn Button', 'listmode'), 'title' => esc_attr__('LinkedIn', 'listmode'), 'icon' => 'fab fa-linkedin-in'],
            'instagramlink' => ['class' => 'listmode-sticky-social-icon-instagram', 'aria-label' => esc_attr__('Instagram Button', 'listmode'), 'title' => esc_attr__('Instagram', 'listmode'), 'icon' => 'fab fa-instagram'],
            'flickrlink' => ['class' => 'listmode-sticky-social-icon-flickr', 'aria-label' => esc_attr__('Flickr Button', 'listmode'), 'title' => esc_attr__('Flickr', 'listmode'), 'icon' => 'fab fa-flickr'],
            'youtubelink' => ['class' => 'listmode-sticky-social-icon-youtube', 'aria-label' => esc_attr__('YouTube Button', 'listmode'), 'title' => esc_attr__('YouTube', 'listmode'), 'icon' => 'fab fa-youtube'],
            'vimeolink' => ['class' => 'listmode-sticky-social-icon-vimeo', 'aria-label' => esc_attr__('Vimeo Button', 'listmode'), 'title' => esc_attr__('Vimeo', 'listmode'), 'icon' => 'fab fa-vimeo-v'],
            'soundcloudlink' => ['class' => 'listmode-sticky-social-icon-soundcloud', 'aria-label' => esc_attr__('SoundCloud Button', 'listmode'), 'title' => esc_attr__('SoundCloud', 'listmode'), 'icon' => 'fab fa-soundcloud'],
            'messengerlink' => ['class' => 'listmode-sticky-social-icon-messenger', 'aria-label' => esc_attr__('Messenger Button', 'listmode'), 'title' => esc_attr__('Messenger', 'listmode'), 'icon' => 'fab fa-facebook-messenger'],
            'whatsapplink' => ['class' => 'listmode-sticky-social-icon-whatsapp', 'aria-label' => esc_attr__('WhatsApp Button', 'listmode'), 'title' => esc_attr__('WhatsApp', 'listmode'), 'icon' => 'fab fa-whatsapp'],
            'tiktoklink' => ['class' => 'listmode-sticky-social-icon-tiktok', 'aria-label' => esc_attr__('TikTok Button', 'listmode'), 'title' => esc_attr__('TikTok', 'listmode'), 'icon' => 'fab fa-tiktok'],
            'lastfmlink' => ['class' => 'listmode-sticky-social-icon-lastfm', 'aria-label' => esc_attr__('Last.fm Button', 'listmode'), 'title' => esc_attr__('Last.fm', 'listmode'), 'icon' => 'fab fa-lastfm'],
            'mediumlink' => ['class' => 'listmode-sticky-social-icon-medium', 'aria-label' => esc_attr__('Medium Button', 'listmode'), 'title' => esc_attr__('Medium', 'listmode'), 'icon' => 'fab fa-medium-m'],
            'githublink' => ['class' => 'listmode-sticky-social-icon-github', 'aria-label' => esc_attr__('GitHub Button', 'listmode'), 'title' => esc_attr__('GitHub', 'listmode'), 'icon' => 'fab fa-github'],
            'bitbucketlink' => ['class' => 'listmode-sticky-social-icon-bitbucket', 'aria-label' => esc_attr__('Bitbucket Button', 'listmode'), 'title' => esc_attr__('Bitbucket', 'listmode'), 'icon' => 'fab fa-bitbucket'],
            'tumblrlink' => ['class' => 'listmode-sticky-social-icon-tumblr', 'aria-label' => esc_attr__('Tumblr Button', 'listmode'), 'title' => esc_attr__('Tumblr', 'listmode'), 'icon' => 'fab fa-tumblr'],
            'digglink' => ['class' => 'listmode-sticky-social-icon-digg', 'aria-label' => esc_attr__('Digg Button', 'listmode'), 'title' => esc_attr__('Digg', 'listmode'), 'icon' => 'fab fa-digg'],
            'deliciouslink' => ['class' => 'listmode-sticky-social-icon-delicious', 'aria-label' => esc_attr__('Delicious Button', 'listmode'), 'title' => esc_attr__('Delicious', 'listmode'), 'icon' => 'fab fa-delicious'],
            'stumblelink' => ['class' => 'listmode-sticky-social-icon-stumble-upon', 'aria-label' => esc_attr__('StumbleUpon Button', 'listmode'), 'title' => esc_attr__('StumbleUpon', 'listmode'), 'icon' => 'fab fa-stumbleupon'],
            'mixlink' => ['class' => 'listmode-sticky-social-icon-mix', 'aria-label' => esc_attr__('Mix Button', 'listmode'), 'title' => esc_attr__('Mix', 'listmode'), 'icon' => 'fab fa-mix'],
            'redditlink' => ['class' => 'listmode-sticky-social-icon-reddit', 'aria-label' => esc_attr__('Reddit Button', 'listmode'), 'title' => esc_attr__('Reddit', 'listmode'), 'icon' => 'fab fa-reddit-alien'],
            'dribbblelink' => ['class' => 'listmode-sticky-social-icon-dribbble', 'aria-label' => esc_attr__('Dribbble Button', 'listmode'), 'title' => esc_attr__('Dribbble', 'listmode'), 'icon' => 'fab fa-dribbble'],
            'flipboardlink' => ['class' => 'listmode-sticky-social-icon-flipboard', 'aria-label' => esc_attr__('Flipboard Button', 'listmode'), 'title' => esc_attr__('Flipboard', 'listmode'), 'icon' => 'fab fa-flipboard'],
            'bloggerlink' => ['class' => 'listmode-sticky-social-icon-blogger', 'aria-label' => esc_attr__('Blogger Button', 'listmode'), 'title' => esc_attr__('Blogger', 'listmode'), 'icon' => 'fab fa-blogger-b'],
            'etsylink' => ['class' => 'listmode-sticky-social-icon-etsy', 'aria-label' => esc_attr__('Etsy Button', 'listmode'), 'title' => esc_attr__('Etsy', 'listmode'), 'icon' => 'fab fa-etsy'],
            'behancelink' => ['class' => 'listmode-sticky-social-icon-behance', 'aria-label' => esc_attr__('Behance Button', 'listmode'), 'title' => esc_attr__('Behance', 'listmode'), 'icon' => 'fab fa-behance'],
            'amazonlink' => ['class' => 'listmode-sticky-social-icon-amazon', 'aria-label' => esc_attr__('Amazon Button', 'listmode'), 'title' => esc_attr__('Amazon', 'listmode'), 'icon' => 'fab fa-amazon'],
            'meetuplink' => ['class' => 'listmode-sticky-social-icon-meetup', 'aria-label' => esc_attr__('Meetup Button', 'listmode'), 'title' => esc_attr__('Meetup', 'listmode'), 'icon' => 'fab fa-meetup'],
            'mixcloudlink' => ['class' => 'listmode-sticky-social-icon-mixcloud', 'aria-label' => esc_attr__('Mixcloud Button', 'listmode'), 'title' => esc_attr__('Mixcloud', 'listmode'), 'icon' => 'fab fa-mixcloud'],
            'slacklink' => ['class' => 'listmode-sticky-social-icon-slack', 'aria-label' => esc_attr__('Slack Button', 'listmode'), 'title' => esc_attr__('Slack', 'listmode'), 'icon' => 'fab fa-slack'],
            'snapchatlink' => ['class' => 'listmode-sticky-social-icon-snapchat', 'aria-label' => esc_attr__('Snapchat Button', 'listmode'), 'title' => esc_attr__('Snapchat', 'listmode'), 'icon' => 'fab fa-snapchat-ghost'],
            'spotifylink' => ['class' => 'listmode-sticky-social-icon-spotify', 'aria-label' => esc_attr__('Spotify Button', 'listmode'), 'title' => esc_attr__('Spotify', 'listmode'), 'icon' => 'fab fa-spotify'],
            'yelplink' => ['class' => 'listmode-sticky-social-icon-yelp', 'aria-label' => esc_attr__('Yelp Button', 'listmode'), 'title' => esc_attr__('Yelp', 'listmode'), 'icon' => 'fab fa-yelp'],
            'wordpresslink' => ['class' => 'listmode-sticky-social-icon-wordpress', 'aria-label' => esc_attr__('WordPress Button', 'listmode'), 'title' => esc_attr__('WordPress', 'listmode'), 'icon' => 'fab fa-wordpress'],
            'twitchlink' => ['class' => 'listmode-sticky-social-icon-twitch', 'aria-label' => esc_attr__('Twitch Button', 'listmode'), 'title' => esc_attr__('Twitch', 'listmode'), 'icon' => 'fab fa-twitch'],
            'telegramlink' => ['class' => 'listmode-sticky-social-icon-telegram', 'aria-label' => esc_attr__('Telegram Button', 'listmode'), 'title' => esc_attr__('Telegram', 'listmode'), 'icon' => 'fab fa-telegram'],
            'bandcamplink' => ['class' => 'listmode-sticky-social-icon-bandcamp', 'aria-label' => esc_attr__('Bandcamp Button', 'listmode'), 'title' => esc_attr__('Bandcamp', 'listmode'), 'icon' => 'fab fa-bandcamp'],
            'quoralink' => ['class' => 'listmode-sticky-social-icon-quora', 'aria-label' => esc_attr__('Quora Button', 'listmode'), 'title' => esc_attr__('Quora', 'listmode'), 'icon' => 'fab fa-quora'],
            'foursquarelink' => ['class' => 'listmode-sticky-social-icon-foursquare', 'aria-label' => esc_attr__('Foursquare Button', 'listmode'), 'title' => esc_attr__('Foursquare', 'listmode'), 'icon' => 'fab fa-foursquare'],
            'deviantartlink' => ['class' => 'listmode-sticky-social-icon-deviantart', 'aria-label' => esc_attr__('DeviantArt Button', 'listmode'), 'title' => esc_attr__('DeviantArt', 'listmode'), 'icon' => 'fab fa-deviantart'],
            'imdblink' => ['class' => 'listmode-sticky-social-icon-imdb', 'aria-label' => esc_attr__('IMDb Button', 'listmode'), 'title' => esc_attr__('IMDb', 'listmode'), 'icon' => 'fab fa-imdb'],
            'vklink' => ['class' => 'listmode-sticky-social-icon-vk', 'aria-label' => esc_attr__('VKontakte Button', 'listmode'), 'title' => esc_attr__('VKontakte', 'listmode'), 'icon' => 'fab fa-vk'],
            'codepenlink' => ['class' => 'listmode-sticky-social-icon-codepen', 'aria-label' => esc_attr__('CodePen Button', 'listmode'), 'title' => esc_attr__('CodePen', 'listmode'), 'icon' => 'fab fa-codepen'],
            'jsfiddlelink' => ['class' => 'listmode-sticky-social-icon-jsfiddle', 'aria-label' => esc_attr__('JSFiddle Button', 'listmode'), 'title' => esc_attr__('JSFiddle', 'listmode'), 'icon' => 'fab fa-jsfiddle'],
            'stackoverflowlink' => ['class' => 'listmode-sticky-social-icon-stack-overflow', 'aria-label' => esc_attr__('Stack Overflow Button', 'listmode'), 'title' => esc_attr__('Stack Overflow', 'listmode'), 'icon' => 'fab fa-stack-overflow'],
            'stackexchangelink' => ['class' => 'listmode-sticky-social-icon-stack-exchange', 'aria-label' => esc_attr__('Stack Exchange Button', 'listmode'), 'title' => esc_attr__('Stack Exchange', 'listmode'), 'icon' => 'fab fa-stack-exchange'],
            'bsalink' => ['class' => 'listmode-sticky-social-icon-bootstrap', 'aria-label' => esc_attr__('Bootstrap Button', 'listmode'), 'title' => esc_attr__('Bootstrap', 'listmode'), 'icon' => 'fab fa-bootstrap'],
            'web500pxlink' => ['class' => 'listmode-sticky-social-icon-500px', 'aria-label' => esc_attr__('500px Button', 'listmode'), 'title' => esc_attr__('500px', 'listmode'), 'icon' => 'fab fa-500px'],
            'ellolink' => ['class' => 'listmode-sticky-social-icon-ello', 'aria-label' => esc_attr__('Ello Button', 'listmode'), 'title' => esc_attr__('Ello', 'listmode'), 'icon' => 'fab fa-ello'],
            'discordlink' => ['class' => 'listmode-sticky-social-icon-discord', 'aria-label' => esc_attr__('Discord Button', 'listmode'), 'title' => esc_attr__('Discord', 'listmode'), 'icon' => 'fab fa-discord'],
            'goodreadslink' => ['class' => 'listmode-sticky-social-icon-goodreads', 'aria-label' => esc_attr__('Goodreads Button', 'listmode'), 'title' => esc_attr__('Goodreads', 'listmode'), 'icon' => 'fab fa-goodreads'],
            'odnoklassnikilink' => ['class' => 'listmode-sticky-social-icon-odnoklassniki', 'aria-label' => esc_attr__('Odnoklassniki Button', 'listmode'), 'title' => esc_attr__('Odnoklassniki', 'listmode'), 'icon' => 'fab fa-odnoklassniki'],
            'houzzlink' => ['class' => 'listmode-sticky-social-icon-houzz', 'aria-label' => esc_attr__('Houzz Button', 'listmode'), 'title' => esc_attr__('Houzz', 'listmode'), 'icon' => 'fab fa-houzz'],
            'pocketlink' => ['class' => 'listmode-sticky-social-icon-get-pocket', 'aria-label' => esc_attr__('Pocket Button', 'listmode'), 'title' => esc_attr__('Pocket', 'listmode'), 'icon' => 'fab fa-get-pocket'],
            'xinglink' => ['class' => 'listmode-sticky-social-icon-xing', 'aria-label' => esc_attr__('Xing Button', 'listmode'), 'title' => esc_attr__('Xing', 'listmode'), 'icon' => 'fab fa-xing'],
            'mastodonlink' => ['class' => 'listmode-sticky-social-icon-mastodon', 'aria-label' => esc_attr__('Mastodon Button', 'listmode'), 'title' => esc_attr__('Mastodon', 'listmode'), 'icon' => 'fab fa-mastodon'],
            'googleplaylink' => ['class' => 'listmode-sticky-social-icon-google-play', 'aria-label' => esc_attr__('Google Play Button', 'listmode'), 'title' => esc_attr__('Google Play', 'listmode'), 'icon' => 'fab fa-google-play'],
            'slidesharelink' => ['class' => 'listmode-sticky-social-icon-slideshare', 'aria-label' => esc_attr__('SlideShare Button', 'listmode'), 'title' => esc_attr__('SlideShare', 'listmode'), 'icon' => 'fab fa-slideshare'],
            'dropboxlink' => ['class' => 'listmode-sticky-social-icon-dropbox', 'aria-label' => esc_attr__('Dropbox Button', 'listmode'), 'title' => esc_attr__('Dropbox', 'listmode'), 'icon' => 'fab fa-dropbox'],
            'paypallink' => ['class' => 'listmode-sticky-social-icon-paypal', 'aria-label' => esc_attr__('PayPal Button', 'listmode'), 'title' => esc_attr__('PayPal', 'listmode'), 'icon' => 'fab fa-paypal'],
            'viadeolink' => ['class' => 'listmode-sticky-social-icon-viadeo', 'aria-label' => esc_attr__('Viadeo Button', 'listmode'), 'title' => esc_attr__('Viadeo', 'listmode'), 'icon' => 'fab fa-viadeo'],
            'wikipedialink' => ['class' => 'listmode-sticky-social-icon-wikipedia-w', 'aria-label' => esc_attr__('Wikipedia Button', 'listmode'), 'title' => esc_attr__('Wikipedia', 'listmode'), 'icon' => 'fab fa-wikipedia-w'],
        ];
    }

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function generate_social_link($link, $data) {
        return "<a href='" . esc_url($link) . "' target='_blank' rel='nofollow' class='" . esc_attr($data['class']) . "' aria-label='" . esc_attr($data['aria-label']) . "'><i class='" . esc_attr($data['icon']) . "' aria-hidden='true' title='" . esc_attr($data['title']) . "'></i></a>";
    }

    private function generate_login_button() {
        if (is_user_logged_in()) {
            return "<a href='" . esc_url(wp_logout_url(get_permalink())) . "' aria-label='" . esc_attr__('Logout Button', 'listmode') . "' class='listmode-sticky-social-icon-login'><i class='fas fa-sign-out-alt' aria-hidden='true' title='" . esc_attr__('Logout', 'listmode') . "'></i></a>";
        } else {
            return "<a href='" . esc_url(wp_login_url(get_permalink())) . "' aria-label='" . esc_attr__('Login / Register Button', 'listmode') . "' class='listmode-sticky-social-icon-login'><i class='fas fa-sign-in-alt' aria-hidden='true' title='" . esc_attr__('Login / Register', 'listmode') . "'></i></a>";
        }
    }

    private function generate_search_button() {
        return "<a href='" . esc_url('#') . "' aria-label='" . esc_attr__('Search Button', 'listmode') . "' class='listmode-sticky-social-icon-search'><i class='fas fa-search' aria-hidden='true' title='" . esc_attr__('Search', 'listmode') . "'></i></a>";
    }

    public function display_social_buttons() {
        $output = '';

        foreach ($this->socialLinks as $linkOption => $data) {
            $link = listmode_get_option($linkOption);
            if ($link) {
                $output .= $this->generate_social_link($link, $data);
            }
        }

        if (listmode_get_option('skypeusername')) {
            $output .= '<a href="skype:' . esc_attr(listmode_get_option('skypeusername')) . '?chat" class="listmode-sticky-social-icon-skype" aria-label="' . esc_attr__('Skype Button', 'listmode') . '"><i class="fab fa-skype" aria-hidden="true" title="' . esc_attr__('Skype', 'listmode') . '"></i></a>';
        }

        if (listmode_get_option('emailaddress')) {
            $output .= '<a href="mailto:' . esc_attr(listmode_get_option('emailaddress')) . '" class="listmode-sticky-social-icon-email" aria-label="' . esc_attr__('Email Us Button', 'listmode') . '"><i class="far fa-envelope" aria-hidden="true" title="' . esc_attr__('Email Us', 'listmode') . '"></i></a>';
        }

        if (listmode_get_option('rsslink')) {
            $output .= '<a href="' . esc_url(listmode_get_option('rsslink')) . '" target="_blank" rel="nofollow" class="listmode-sticky-social-icon-rss" aria-label="' . esc_attr__('RSS Button', 'listmode') . '"><i class="fas fa-rss" aria-hidden="true" title="' . esc_attr__('RSS', 'listmode') . '"></i></a>';
        }

        if (listmode_get_option('show_login_button')) {
            $output .= $this->generate_login_button();
        }

        if (!(listmode_get_option('hide_search_button'))) {
            $output .= $this->generate_search_button();
        }

        echo "<div class='listmode-sticky-social-icons'>" . $output . "</div>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

}
ListMode_Social::get_instance();