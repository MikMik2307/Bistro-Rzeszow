<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
	function thetalk_breadcrumb()
	{
		if (get_post_type() !== 'talkers') {
			yoast_breadcrumb('<div class="yoast-breadcrumbs">', '</div>');
		} else {
			$breadcrumbs = yoast_breadcrumb('<div class="yoast-breadcrumbs">', '</div>', false);

			global $post;
			$thisEvent = getTalkersEvent($post->ID);

			if($thisEvent == 0) {
				echo $breadcrumbs;
			}

			$replacement = '<span><a href="' . get_permalink($thisEvent->ID) . '">' . $thisEvent->post_title . '</a></span>';
			$replacement .= ' » <span><a href="#talkers">Talkers</a></span>';

			$breadcrumbs = preg_replace('#<span><a href="([^"]*)">Talkers</a></span>#', $replacement, $breadcrumbs);

			echo $breadcrumbs;
			return 1;
		}
	}
	thetalk_breadcrumb();
}
?>
<main class="site-main" id="main">
	<?php
	while (have_posts()) {
		the_post();
		get_template_part('loop-templates/content', 'single');
		if (get_post_type() === 'events') {
			understrap_post_nav();
		}
		if (get_post_type() === 'talkers') {
			understrap_talkers_year();
		}
		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) {
			comments_template();
		}
	}
	?>

</main>

<?php
get_footer();
