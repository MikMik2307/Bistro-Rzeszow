<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// $bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
// $navbar_type = get_theme_mod('understrap_navbar_type', 'collapse');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<header id="wrapper-navbar" class="header__desktop">
		<div class="container-header justify-content-between align-items-center">
            <div class="row">
                <div class="col-12">
                    <div class="menu-top-area">
                        <div class="menu-top-area-phone"><a href="tel:+48236834424" target="_blank"><p class="menu-top-area-contact-txt contact-phone-icon">+48 23 683 44 24</p></a></div>
                        <div class="menu-top-area-email"><a href="mailto:kontakt@bistrodziendobry.pl" target="_blank"><p class="menu-top-area-contact-txt contact-mail-icon">kontakt@bistrodziendobry.pl</p></a></div>
                        <div class="menu-top-area-social-fb"><a href="https://www.facebook.com/DzienDobryBistro" target="_blank"><img class="menu-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/facebook-icon.svg"></a></div>
                        <div class="menu-top-area-social-ig"><a href="https://www.instagram.com/bistrodziendobryrzeszow/" target="_blank"><img class="menu-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/instagram-icon.svg"></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="main-menu">
                    <div class="col-3">
                        <div class="menu-main-logo">
                            <a href="/"><img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/logo.svg"></a>
                        </div>
                    </div>
                    <div style="height: 100%;" class="col-9">
                        <div class="menu-main-menu-list">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'Main-Menu-Home',
                                    'menu_class'      => 'menu-list-desktop',
                                    'menu_id'         => 'Main-menu',
                                    'walker'         => new Walker_Nav_Menu_Custom(),
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
			<nav id="main-nav" class="header__navbar navbar navbar-expand-xl" aria-labelledby="main-nav-label">
				<button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
					aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'Main-Menu',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav header__nav m-0 p-lg-0 align-items-lg-center',
						'fallback_cb'     => '',
						'menu_id'         => 'Main-Menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</nav>
		</div>
	</header>
    <header id="wrapper-navbar" class="header__mobile">
        <div class="container-header justify-content-between align-items-center">
            <nav id="main-nav" class="header__navbar navbar navbar-expand-xl"
                 aria-labelledby="main-nav-label">
                <div class="header__logo">
                    <a href="<?php echo esc_url(get_home_url() . '/'); ?>">
                        <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/logo.svg">
                    </a>
                </div>
                <button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'Main-Menu-Home',
                        'container_class' => 'collapse navbar-collapse justify-content-lg-end',
                        'container_id'    => 'navbarNavDropdown',
                        'menu_class'      => 'navbar-nav header__nav m-0 p-lg-0 align-items-lg-center',
                        'fallback_cb'     => '',
                        'menu_id'         => 'Main-Menu',
                        'depth'           => 2,
                        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                );
                ?>
            </nav>
        </div>
    </header>
    <div class="popup-overlay">
        <div class="popup-content">
            <button class="popup-close"><img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/popup-close.svg"></button>
            <h2 class="popup-title">Wybierz lokal</h2>
            <ul class="pop-up-locals">
                <a href="https://www.pyszne.pl/menu/bistro-dzie-dobry-pigonia-rzeszw" target="_blank">
                    <li class="pop-up-locals-single">
                        <div class="pop-up-locals-single-top-area">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/popup-logo.svg">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/arrow-popup.svg">
                        </div>
                        <div class="pop-up-locals-single-content">
                            <p  class="pop-up-locals-single-content-name">Rzeszów (Biblioteka UR)</p>
                            <p  class="pop-up-locals-single-content-address">ul.Pigonia 8</p>
                        </div>
                    </li>
                </a>
                <a href="https://www.pyszne.pl/menu/bistro-dzien-dobry-krakowska" target="_blank">
                    <li class="pop-up-locals-single">
                        <div class="pop-up-locals-single-top-area">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/popup-logo.svg">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/arrow-popup.svg">
                        </div>
                        <div class="pop-up-locals-single-content">
                            <p  class="pop-up-locals-single-content-name">Rzeszów</p>
                            <p  class="pop-up-locals-single-content-address">ul.Krakowska 14</p>
                        </div>
                    </li>
                </a>
                <a href="https://www.pyszne.pl/menu/bistro-dzie-dobry-mielec" target="_blank">
                    <li class="pop-up-locals-single">
                        <div class="pop-up-locals-single-top-area">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/popup-logo.svg">
                            <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/arrow-popup.svg">
                        </div>
                        <div class="pop-up-locals-single-content">
                            <p  class="pop-up-locals-single-content-name">Mielec</p>
                            <p  class="pop-up-locals-single-content-address">ul.Mickiewicza 13</p>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
    </div>