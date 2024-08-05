<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

function ile_remove_version()
{
	return '';
}

function mab_disable_header_info()
{
	add_filter('the_generator', 'mab_remove_version');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('rest_api_init', 'wp_oembed_register_route');
	add_filter('embed_oembed_discover', '__return_false');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	add_filter('tiny_mce_plugins', 'mab_disable_embeds_tiny_mce_plugin');
	add_filter('rewrite_rules_array', 'mab_disable_embeds_rewrites');
	remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
}

add_action('init', 'mab_disable_header_info', 9999);

function mab_disable_embeds_tiny_mce_plugin($plugins)
{
	return array_diff($plugins, array('wpembed'));
}

function mab_disable_embeds_rewrites($rules)
{
	foreach ($rules as $rule => $rewrite) {
		if (false !== strpos($rewrite, 'embed=true')) {
			unset($rules[$rule]);
		}
	}
	return $rules;
}

function mab_disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'mab_disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'mab_disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'mab_disable_emojis');

function mab_disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

function mab_disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

//Function to remove REST API output in header
function mab_remove_api()
{
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
}

add_action('after_setup_theme', 'mab_remove_api');

// remove the unwanted <meta> links
remove_action('wp_head', 'wp_generator');

// Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links_extra', 3);

// Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links', 2);

// Block WP author enum scans
if (!is_admin()) {
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) {
		die("Shame on you...");
	}
	add_filter('redirect_canonical', 'mab_check_enum', 10, 2);
}
function mab_check_enum($redirect, $request)
{
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) {
		die("Shame on you...");
	} else
		return $redirect;
}

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',
	// Initialize theme default settings.
	'/setup.php',
	// Theme setup and custom theme supports.
	'/widgets.php',
	// Register widget area.
	'/enqueue.php',
	// Enqueue scripts and styles.
	'/template-tags.php',
	// Custom template tags for this theme.
	'/pagination.php',
	// Custom pagination for this theme.
	'/extras.php',
	// Custom functions that act independently of the theme templates.
	'/customizer.php',
	// Customizer additions.
	'/custom-comments.php',
	// Custom Comments file.
	'/editor.php',
	// Load Editor functions.
	'/block-editor.php',
	// Load Block Editor functions.
	'/deprecated.php',
	// Load deprecated functions.
	'/class-wp-bootstrap-navwalker.php', // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
);

// Include files.
foreach ($understrap_includes as $file) {
	require_once get_theme_file_path($understrap_inc_dir . $file);
}
function setUpFeaturedImage()
{
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setUpFeaturedImage');

require __DIR__ . '/custom-post-types/range.php';
require __DIR__ . '/custom-post-types/acf-fields/range-fields.php';


add_action('init', 'create_range_post_type');



//Register menu
function register_menus()
{
	register_nav_menus(
		[
            'Footer-Menu' => __('Footer Menu'),
		]
	);
}

add_action('after_setup_theme', __NAMESPACE__ . '\register_menus', 10, 1);

/*
 * Hide the ACF Admin UI
 */
//add_filter( 'acf/settings/show_admin', '__return_false' );



//add the ability to load svg
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



function enqueue_custom_script() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
    wp_enqueue_style('lightbox-style', get_template_directory_uri() . '/css/lightbox.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

add_filter('wpcf7_autop_or_not', '__return_false');