<?php
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $buttonTxt = get_field('button_txt');
    $buttonLink = get_field('button_link');
    $sectionImage = get_field('section_image');
    $wrapper_attributes = get_block_wrapper_attributes([]);
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row cab-two-column-with-image-and-text__row">
            <div class="col-12 col-lg-6 col-xl-6">
                <div class="cab-two-column-with-image-and-text__images">
                    <img src="<?php echo esc_url($sectionImage); ?>">
                </div>
            </div>
            <div class=" col-12 col-lg-6 col-xl-6">
                <p class="cab-text-with-image-subtitle"><?php echo wp_kses($subtitle, array(
                        'a' => array(
                            'href'  => true,
                            'title' => true,
                        ),
                        'div'       => array(),
                        'p'         => array(),
                        'br'        => array(),
                    ))
                    ?></p>
                <p class="cab-text-with-image-title">
                    <?php echo wp_kses($title, array(
                            'a' => array(
                                'href'  => true,
                                'title' => true,
                            ),
                            'div'       => array(),
                            'p'         => array(),
                            'br'        => array(),
                    ))
                    ?>
                </p>
                <a href="<?php echo esc_url($buttonLink); ?>" class="cab-btn">
                    <p><?php echo $buttonTxt ?></p>
                </a>
            </div>
        </div>

    </div>
</section>
