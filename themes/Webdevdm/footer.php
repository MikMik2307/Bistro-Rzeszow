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
                <div class="col-12 col-lg-3">
                    <div class="footer-logo">
                        <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/logo.svg">
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-business-info-txt">
                                <p class="footer-business-info-txt-title"> Adres firmy</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="footer-business-info-details">
                                <p class="footer-business-info-details-txt">SPÓŁDZIELNIA SOCJALNA MAGIA SMAKÓW</p>
                                <p class="footer-business-info-details-txt">ul.Dębowa 3,</p>
                                <p class="footer-business-info-details-txt">39-432 Trześń</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="footer-business-info-details">
                                <p class="footer-business-info-details-txt no-detect">REGON: 521578483</p>
                                <p class="footer-business-info-details-txt no-detect">NIP: 8672254722</p>
                                <p class="footer-business-info-details-txt no-detect">KRS: 0000962821</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 footer-contact-container">
                    <div class="row">
                        <div class="footer-contact-details-container-area" >
                            <div class="col-12 col-lg-6 footer-contact-details-container">
                                <div class="footer-contact-details footer-email"><a href="mailto:kontakt@bistrodziendobry.pl" target="_blank">kontakt@bistrodziendobry.pl</a></div>
                            </div>
                            <div class="col-12 col-lg-6 footer-contact-details-container">
                                <div class="footer-contact-details footer-phone"><a href="tel:+48236834424" target="_blank">+48 23 683 44 24</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-footer-social-icons">
                        <div class="col-12">
                            <div class="footer-social-icons">
                                <a href="https://www.facebook.com/DzienDobryBistro" target="_blank"><img class="footer-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/Facebook-icon-footer.svg"></a>
                                <a href="https://www.instagram.com/bistrodziendobryrzeszow/" target="_blank"><img class="footer-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/instagram-icon-footer.svg"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer-bottom-area">
                    <div class="footer-bottom-area-content">
                        <div class="row no-margin footer-bottom-row">
                            <div class="col-12 col-lg-10 no-margin no-padding">
                                <div class="footer-bottom-menu ">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'Footer-Menu',
                                            'menu_class'     => 'footer-menu d-flex flex-row flex-lg-col no-margin no-padding',
                                            'fallback_cb'    => '',
                                            'menu_id'        => 'Footer-Menu',
                                            'depth'          => 2,
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2">
                                <div class="footer-bottom-implementation">
                                    <a href="#" target="_blank">Realizacja: <img class="footer-bottom-implementation-img" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/implementation-logo.svg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>
