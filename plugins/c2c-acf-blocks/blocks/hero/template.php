<?php
    $subtitle  = get_field( 'subtitle' );
    $title = get_field('title');
    $button_txt = get_field('button_txt');
    $button_link = get_field('button_link');
    $img_top = get_field('img_top');
    $img_bottom = get_field('img_bottom');
    $wrapper_attributes = get_block_wrapper_attributes([
        'class' => 'HeroSection',
    ]);
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container cab-hero-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 order-lg-1 order-md-1 order-2 cab-col-hero-content">
                <p class="cab-hero-subtitle-txt">
                    <?php echo $subtitle ?>
                </p>
                <h1 class="cab-hero-title-txt">
                    <?php echo $title; ?>
                </h1>
                <a href="<?php echo esc_url($button_link); ?>" class="cab-btn">
                    <p><?php echo $button_txt ?></p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 order-lg-2 order-md-2 order-1">
                <div class="cab-hero-img-top">
                    <img src="<?php echo esc_url($img_top); ?>">
                </div>
                <div class="cab-hero-img-bottom">
                    <img src="<?php echo esc_url($img_bottom); ?>">
                </div>
            </div>
        </div>
</section>
