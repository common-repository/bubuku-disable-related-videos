<?php
/**
 * Plugin Name: Bubuku disable related videos
 * Description: Plugin created by Bubuku to disable related YouTube videos that appear at the end of the video.
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Version:     1.0.2
 * Author:      Bubuku
 * Author URI:  https://www.bubuku.com/
 * Text Domain: bubuku-disable-related-videos
 * Domain Path: /languages
 * License:     EUPL v1.2
 * License URI: https://www.eupl.eu/1.2/en/
 *
 * @package     WordPress
 * @author      Bubuku
 * @copyright   2023 Bubuku
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      bbk
 */

if ( ! defined( 'ABSPATH' ) ) exit;


// We use the embed_oembed_html filter to modify the HTML of embedded YouTube videos.
add_filter( 'embed_oembed_html', 'bubuku_add_rel_to_youtube_embed', 10, 4 );
function bubuku_add_rel_to_youtube_embed( $html, $url, $attr, $post_id ) {
	if ( false !== strpos( $html, 'youtube.com' ) && false === strpos( $html, 'rel=0' ) ) {
		$html = str_replace( '?feature=oembed', '?feature=oembed&rel=0', $html );
	}
	return $html;
}