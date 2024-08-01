<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

    $subtitle = get_field("subtitle");
    $title = get_field("title");
    $text = get_field("text");
    $backgroundColor = get_field("background_color");
    $backgroundOverlay = get_field("background_overlay");
    $wrapper_attributes = get_block_wrapper_attributes([
        'class' => 'text-section',
    ]);
?>
<section <?php echo $wrapper_attributes; ?> style=" background:url(<?php echo esc_url($backgroundOverlay)?>) <?php echo $backgroundColor?>;">
    <div class="container">
        <div class="row text-section-row">
            <div class="col-12 col-lg-8">
                <div class="text-section-area">
                    <p class="text-section-subtitle"><?php echo esc_html($subtitle)?></p>
                    <h1 class="text-section-title"> <?php echo wp_kses_post($title)?></h1>
                    <p class="text-section-text"> <?php echo esc_html($text)?></p>
                </div>
            </div>
        </div>
    </div>
</section>
