<?php
    $subtitle  = get_field( 'newsletter_subtitle' );
    $title = get_field('newsletter_title');
    $form = get_field('form_name');
    foreach ($form as $key => $form) {
        if ($key >= 0) {
            $form_id = $form->ID;
        }
    }
    $wrapper_attributes = get_block_wrapper_attributes([
    ]);
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="cab-newsletter-subtitle-txt">
                    <?php echo $subtitle ?>
                </p>
                <p class="cab-newsletter-title-txt">
                    <?php echo $title; ?>
                </p>
                [contact-form-7 id="<?php echo $form_id; ?>"]
            </div>
        </div>
</section>

