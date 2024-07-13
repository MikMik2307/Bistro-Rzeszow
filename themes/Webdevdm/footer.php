<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<footer class="footer">
		<div class="container-xl">
			<div class="row">
                <div class="col-12 col-lg-6">
                    <div class="footer__logo">
                        <img class="footer__logo__img" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/MAD-HATTERS-FOOTER.svg">
                        <p class="footer__desc">Be better, be cooler, be a Mad <br> Hatter and sustainably matter.</p>
                        <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/Decoration.svg">
                        <p class="footer__copy copy__mobile">Copyright 2012 Mad Hatters, Inc. Terms & Privacy</p>
                    </div>
                </div>
                <div class="col-12 col-lg-2"></div>
				<div class="col-12 col-lg-2">
                    <p class="footer__nav__title shop__here_title" style="position:relative;">Shop here</p>
					<nav class="footer__nav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'Footer-Shop-here',
								'menu_class'     => 'footer-menu d-flex flex-column flex-lg-col',
								'fallback_cb'    => '',
								'menu_id'        => 'Footer-Shop-here',
								'depth'          => 2,
							)
						);
						?>
					</nav>
				</div>
                <div class="col-12 col-lg-2">
                    <nav class="footer__nav">
                        <p class="footer__nav__title the__legals_title">The legals</p>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'Footer-The-legals',
                                'menu_class'     => 'footer-menu d-flex flex-column flex-lg-col',
                                'fallback_cb'    => '',
                                'menu_id'        => 'footer-the-legals',
                                'depth'          => 2,
                            )
                        );
                        ?>
                    </nav>
                </div>
			</div>
            <div class="row">
                <div class="col-12">
                    <p class="footer__copy copy__desktop">Copyright 2012 Mad Hatters, Inc. Terms & Privacy</p>
                </div>
            </div>
		</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>
