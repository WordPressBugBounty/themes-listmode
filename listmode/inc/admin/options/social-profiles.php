<?php
/**
* Social profiles options
*
* @package ListMode WordPress Theme
* @copyright Copyright (C) 2024 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function listmode_social_profiles($wp_customize) {
    $panel_id = 'listmode_main_options_panel';
    $priority = 240;

    $wp_customize->add_section(
        'listmode_section_social',
        array(
            'title'    => esc_html__('Social Links Options', 'listmode'),
            'panel'    => $panel_id,
            'priority' => $priority,
        )
    );

    $listmode_options = array(
        'twitterlink' => array( 'control_label' => esc_html__('X URL', 'listmode') ),
        'facebooklink' => array( 'control_label' => esc_html__('Facebook URL', 'listmode') ),
        'threadslink' => array( 'control_label' => esc_html__('Threads URL', 'listmode') ),
        'pinterestlink' => array( 'control_label' => esc_html__('Pinterest URL', 'listmode') ),
        'linkedinlink' => array( 'control_label' => esc_html__('Linkedin URL', 'listmode') ),
        'instagramlink' => array( 'control_label' => esc_html__('Instagram URL', 'listmode') ),
        'vklink' => array( 'control_label' => esc_html__('VK URL', 'listmode') ),
        'flickrlink' => array( 'control_label' => esc_html__('Flickr URL', 'listmode') ),
        'youtubelink' => array( 'control_label' => esc_html__('Youtube URL', 'listmode') ),
        'vimeolink' => array( 'control_label' => esc_html__('Vimeo URL', 'listmode') ),
        'soundcloudlink' => array( 'control_label' => esc_html__('Soundcloud URL', 'listmode') ),
        'messengerlink' => array( 'control_label' => esc_html__('Messenger URL', 'listmode') ),
        'whatsapplink' => array( 'control_label' => esc_html__('WhatsApp URL', 'listmode') ),
        'tiktoklink' => array( 'control_label' => esc_html__('TikTok URL', 'listmode') ),
        'lastfmlink' => array( 'control_label' => esc_html__('Lastfm URL', 'listmode') ),
        'mediumlink' => array( 'control_label' => esc_html__('Medium URL', 'listmode') ),
        'githublink' => array( 'control_label' => esc_html__('Github URL', 'listmode') ),
        'bitbucketlink' => array( 'control_label' => esc_html__('Bitbucket URL', 'listmode') ),
        'tumblrlink' => array( 'control_label' => esc_html__('Tumblr URL', 'listmode') ),
        'digglink' => array( 'control_label' => esc_html__('Digg URL', 'listmode') ),
        'deliciouslink' => array( 'control_label' => esc_html__('Delicious URL', 'listmode') ),
        'stumblelink' => array( 'control_label' => esc_html__('Stumbleupon URL', 'listmode') ),
        'mixlink' => array( 'control_label' => esc_html__('Mix URL', 'listmode') ),
        'redditlink' => array( 'control_label' => esc_html__('Reddit URL', 'listmode') ),
        'dribbblelink' => array( 'control_label' => esc_html__('Dribbble URL', 'listmode') ),
        'flipboardlink' => array( 'control_label' => esc_html__('Flipboard URL', 'listmode') ),
        'bloggerlink' => array( 'control_label' => esc_html__('Blogger URL', 'listmode') ),
        'etsylink' => array( 'control_label' => esc_html__('Etsy URL', 'listmode') ),
        'behancelink' => array( 'control_label' => esc_html__('Behance URL', 'listmode') ),
        'amazonlink' => array( 'control_label' => esc_html__('Amazon URL', 'listmode') ),
        'meetuplink' => array( 'control_label' => esc_html__('Meetup URL', 'listmode') ),
        'mixcloudlink' => array( 'control_label' => esc_html__('Mixcloud URL', 'listmode') ),
        'slacklink' => array( 'control_label' => esc_html__('Slack URL', 'listmode') ),
        'snapchatlink' => array( 'control_label' => esc_html__('Snapchat URL', 'listmode') ),
        'spotifylink' => array( 'control_label' => esc_html__('Spotify URL', 'listmode') ),
        'yelplink' => array( 'control_label' => esc_html__('Yelp URL', 'listmode') ),
        'wordpresslink' => array( 'control_label' => esc_html__('WordPress URL', 'listmode') ),
        'twitchlink' => array( 'control_label' => esc_html__('Twitch URL', 'listmode') ),
        'telegramlink' => array( 'control_label' => esc_html__('Telegram URL', 'listmode') ),
        'bandcamplink' => array( 'control_label' => esc_html__('Bandcamp URL', 'listmode') ),
        'quoralink' => array( 'control_label' => esc_html__('Quora URL', 'listmode') ),
        'foursquarelink' => array( 'control_label' => esc_html__('Foursquare URL', 'listmode') ),
        'deviantartlink' => array( 'control_label' => esc_html__('DeviantArt URL', 'listmode') ),
        'imdblink' => array( 'control_label' => esc_html__('IMDB URL', 'listmode') ),
        'codepenlink' => array( 'control_label' => esc_html__('Codepen URL', 'listmode') ),
        'jsfiddlelink' => array( 'control_label' => esc_html__('JSFiddle URL', 'listmode') ),
        'stackoverflowlink' => array( 'control_label' => esc_html__('Stack Overflow URL', 'listmode') ),
        'stackexchangelink' => array( 'control_label' => esc_html__('Stack Exchange URL', 'listmode') ),
        'bsalink' => array( 'control_label' => esc_html__('BuySellAds URL', 'listmode') ),
        'web500pxlink' => array( 'control_label' => esc_html__('500px URL', 'listmode') ),
        'ellolink' => array( 'control_label' => esc_html__('Ello URL', 'listmode') ),
        'discordlink' => array( 'control_label' => esc_html__('Discord URL', 'listmode') ),
        'goodreadslink' => array( 'control_label' => esc_html__('Goodreads URL', 'listmode') ),
        'odnoklassnikilink' => array( 'control_label' => esc_html__('Odnoklassniki URL', 'listmode') ),
        'houzzlink' => array( 'control_label' => esc_html__('Houzz URL', 'listmode') ),
        'pocketlink' => array( 'control_label' => esc_html__('Pocket URL', 'listmode') ),
        'xinglink' => array( 'control_label' => esc_html__('XING URL', 'listmode') ),
        'mastodonlink' => array( 'control_label' => esc_html__('Mastodon URL', 'listmode') ),
        'googleplaylink' => array( 'control_label' => esc_html__('Google Play URL', 'listmode') ),
        'slidesharelink' => array( 'control_label' => esc_html__('SlideShare URL', 'listmode') ),
        'dropboxlink' => array( 'control_label' => esc_html__('Dropbox URL', 'listmode') ),
        'paypallink' => array( 'control_label' => esc_html__('PayPal URL', 'listmode') ),
        'viadeolink' => array( 'control_label' => esc_html__('Viadeo URL', 'listmode') ),
        'wikipedialink' => array( 'control_label' => esc_html__('Wikipedia URL', 'listmode') ),
        'skypeusername' => array( 'sanitize_callback' => 'sanitize_text_field', 'control_label' => esc_html__('Skype Username', 'listmode') ),
        'emailaddress' => array( 'sanitize_callback' => 'listmode_sanitize_email', 'control_label' => esc_html__('Email Address', 'listmode') ),
        'rsslink' => array( 'control_label' => esc_html__('RSS Feed URL', 'listmode') ),
    );

    foreach ($listmode_options as $option_name => $option_args) {
        $wp_customize->add_setting("listmode_options[{$option_name}]",
            array(
                'default'     => isset($option_args['default']) ? $option_args['default'] : '',
                'type'        => isset($option_args['type']) ? $option_args['type'] : 'option',
                'capability'  => isset($option_args['capability']) ? $option_args['capability'] : 'edit_theme_options',
                'sanitize_callback'  => isset($option_args['sanitize_callback']) ? $option_args['sanitize_callback'] : 'esc_url_raw',
            )
        );

        $wp_customize->add_control("listmode_{$option_name}_control",
            array(
                'label'       => isset($option_args['control_label']) ? $option_args['control_label'] : '',
                'section'     => 'listmode_section_social',
                'settings'    => "listmode_options[{$option_name}]",
                'type'        => isset($option_args['control_type']) ? $option_args['control_type'] : 'text',
                'description' => isset($option_args['control_description']) ? $option_args['control_description'] : '',
                'choices'     => (isset($option_args['choices']) ? $option_args['choices'] : array()),
                'priority'    => isset($option_args['control_priority']) ? $option_args['control_priority'] : 10,
            )
        );
    }
}