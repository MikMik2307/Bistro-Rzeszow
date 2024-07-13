<?php
/**
 * Template Name: Page Home Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('', $args = array('mode' => 'navy'));

$container = get_theme_mod('understrap_container_type');

while (have_posts()) {
	the_post();
	get_template_part('loop-templates/content', 'blank');
}

get_footer();
