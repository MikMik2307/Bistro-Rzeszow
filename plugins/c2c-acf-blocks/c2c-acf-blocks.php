<?php
/**
 * Plugin Name:       C2C ACF Blocks
 * Plugin URI:        https://www.webdevdm.pl/
 * Description:       Plugin containing ACF Gutenberg blocks
 * Version:           2.0.0
 * Author:            Webdevdm
 * Author URI:        https://www.webdevdm.pl/
 * Text Domain:       c2c-acf-blocks
 */

namespace Webdevdm\C2C_ACF_Blocks;

if (!defined('CAB_PATH')) {
    define('CAB_PATH', plugin_dir_path(__FILE__));
}
if (!defined('CAB_URL')) {
    define('CAB_URL', plugin_dir_url(__FILE__));
}

//Import block files
require __DIR__ . '/index.php';

function register_scripts()
{
    wp_enqueue_style('CAB-bundle', CAB_URL . 'dist/css/bundle.css');
    wp_enqueue_script('CAB-bundle', CAB_URL . 'dist/js/bundle.js', ['jquery', 'acf']);
	wp_localize_script( 'CAB-bundle', 'CAB_loc',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	//if block is present
    $id = get_the_ID();
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\register_scripts');
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\register_scripts');

/* Loading texdomain */
function CAB_load_plugin_textdomain()
{
    load_plugin_textdomain('c2c-acf-blocks', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('init', __NAMESPACE__ . '\\CAB_load_plugin_textdomain');
