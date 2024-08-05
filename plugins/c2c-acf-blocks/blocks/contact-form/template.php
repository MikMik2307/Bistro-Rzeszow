<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$title = get_field("title");
$backgroundColor = get_field("background_color");

$contactForm = get_field("contact_form");

$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'contact-form',
]);

?>
<section <?php echo $wrapper_attributes; ?> style="background-color:<?php echo $backgroundColor?>;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="contact-form-title">
                    <h1 class="contact-form-title-txt"> <?php echo esc_html($title);?></h1>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <?php echo do_shortcode('[contact-form-7 id="'. $contactForm .'"]'); ?>
            </div>
        </div>
</section>











