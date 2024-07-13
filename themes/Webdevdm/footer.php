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
                <div class="col-3">
                    <div class="footer-logo">
                        <img src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/logo.png">
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-business-info-txt">
                                <p class="footer-business-info-txt-title"> Adres firmy</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="footer-business-info-details">
                                <p class="footer-business-info-details-txt">Bistro Dzień Dobry</p>
                                <p class="footer-business-info-details-txt">ul.Kwiatowa 2,</p>
                                <p class="footer-business-info-details-txt">35-206 Rzeszów</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="footer-business-info-details">
                                <p class="footer-business-info-details-txt">REGON: 941233967</p>
                                <p class="footer-business-info-details-txt">NIP: 247 035 9230</p>
                                <p class="footer-business-info-details-txt">KRS: 0000927321</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="footer-contact-details footer-email"><a href="#" target="_blank">kontakt@bistrodziendobry.pl</a></div>
                        </div>
                        <div class="col-6">
                            <div class="footer-contact-details footer-phone"><a href="#" target="_blank">+48 23 683 44 24</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-social-icons">
                                <a href="#" target="_blank"><img class="footer-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/Facebook-icon-footer.png"></a>
                                <a href="#" target="_blank"><img class="footer-top-area-social-icon" src="<?= get_stylesheet_directory_uri() ?>/src/assets/img/instagram-icon-footer.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer-bottom-area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'Footer-Menu',
                                        'menu_class'     => 'footer-menu d-flex flex-column flex-lg-col',
                                        'fallback_cb'    => '',
                                        'menu_id'        => 'Footer-Menu',
                                        'depth'          => 2,
                                    )
                                );
                                ?>
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
