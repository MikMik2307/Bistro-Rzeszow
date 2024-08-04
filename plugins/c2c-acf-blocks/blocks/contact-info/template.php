<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$title = get_field("title");
$backgroundColor = get_field("background_color");
$backgroundOverlay = get_field("background_overlay");
$locations = get_field("locations");
$count = count($locations) + 1;
$col_width = 12 / $count;
$nip = get_field("nip");
$regon = get_field("regon");
$krs = get_field("krs");
$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'contact-info',
]);

?>
<section <?php echo $wrapper_attributes; ?> style=" background:url(<?php echo esc_url($backgroundOverlay)?>) <?php echo $backgroundColor?>;">
    <div class="container">
        <div class="row">
            <div class="contact-info-title">
                <h1 class="contact-info-title-txt"> <?php echo esc_html($title);?></h1>
            </div>
        </div>
        <div class="row">
                <?php
                if( $locations ) {
                    foreach( $locations as $location ) {
                        $location_name = $location['name'];
                        $location_adress = $location['street'];
                        $location_phone = $location['phone_number'];
                        $location_email = $location['e-mail_address'];
                        echo '<div class="col-'.$col_width.' col-location-single">';
                        echo '<div class="contact-info-location-single-container">';
                        echo '<p class="contact-info-location-single-name">'.esc_html($location_name).'</p>';
                        echo '<p class="contact-info-location-single-adress">'.esc_html($location_adress).'</p>';
                        echo '<p class="contact-info-location-single-phone">'.esc_html($location_phone).'</p>';
                        echo '<p class="contact-info-location-single-email">'.esc_html($location_email).'</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
                <div class="col-12 col-lg-<?php echo $col_width;?> col-contact-info-additional-info">
                    <div class="contact-info-additional-info">
                        <p class="contact-info-title-nip">NIP: <?php echo esc_html($nip)?></p>
                        <p class="contact-info-title-regon">REGON: <?php echo esc_html($regon)?></p>
                        <p class="contact-info-title-krs">KRS:<?php echo esc_html($krs)?></p>
                    </div>
                </div>
        </div>
</section>











