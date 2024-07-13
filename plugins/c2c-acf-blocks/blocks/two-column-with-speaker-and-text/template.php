<?php
    $text_position = get_field('text_position');
    $wrapper_attributes = get_block_wrapper_attributes([
			'class' => 'mt-2 mb-4',
	]);
    $icon = OAB_URL . 'img/Rectangle 21.png';
    $linkedin_icon = OAB_URL . 'img/linkedin.svg';
    $arrow = OAB_URL . 'img/Union-right.svg';

    global $post;
	$post_id                = $post->ID;
	$speaker_name           = get_the_title( $post_id );
	$speaker_position       = get_field( 'position',  $post_id );
	$speaker_video          = get_field( 'video', $post_id);
	$speaker_company        = get_field(  'company', $post_id );
	$speaker_linkedin       = get_field(  'linkedin', $post_id );
	$speaker_description    = get_field( 'description', $post_id );
    $speech_title           = get_field('speech_title', $post_id);

	$speaker_img_id            = get_post_thumbnail_id( $post_id);
	if($speaker_img_id) {
		$speaker_img_url = wp_get_attachment_image_src($speaker_img_id, 'full')[0];
		$speaker_img_alt = get_post_meta($speaker_img_id, '_wp_attachment_image_alt', TRUE);
		$speaker_img_title = get_the_title($speaker_img_id);
	}
    $speaker_logo_navy_id      = get_field( 'logo_navy', $post_id );
	if($speaker_logo_navy_id ) {
		$speaker_logo_navy_url = wp_get_attachment_image_src($speaker_logo_navy_id, 'medium')[0];
		$speaker_logo_navy_alt = get_post_meta($speaker_logo_navy_id, '_wp_attachment_image_alt', TRUE);
		$speaker_logo_navy_title = get_the_title($speaker_logo_navy_id);
	}
?>

<section <?php echo $wrapper_attributes; ?>>
    <div class="container-xxl">
        <div class="row justify-content-between">
            <div class="col-md-12 col-lg-7 col-xl-7 <?php echo ($text_position === 'Right') ? 'order-2' : 'order-lg-1 order-sm-2 order-2' ?> oab-two-column-with-speaker-and-text__content-container">
                <h1 class="oab-two-column-with-speaker-and-text__title"><?php echo esc_html($speech_title); ?></h1>
                <div class="oab-two-column-with-speaker-and-text__description">
                    <?php echo wp_kses($speaker_description, array(
                            'br'        => array(),
                    ))
                    ?>
                </div>
<!--				<div class="oab-two-column-with-speaker-and-text__btn --><?//= $speaker_video ? '' : 'oab-two-column-with-speaker-and-text__btn-hidden'?><!--">--><?php //echo esc_html__( 'Regardez la vidéo', 'odigo-acf-blocks' ) ?><!--<img class="oab-two-column-with-speaker-and-text__icon" src="--><?php //echo esc_url($arrow); ?><!--" alt="icon" title="icon"></div>-->
<!--				--><?php //if($speaker_video) { ?>
<!--					<div class="oab-two-column-with-speaker-and-text__video">-->
<!--						<div class="oab-two-column-with-speaker-and-text__mask"></div>-->
<!--						<div class="oab-two-column-with-speaker-and-text__item">-->
<!---->
<!--								--><?php
//								$iframe = str_replace( 'src="', 'data-cookieblock-src="', $speaker_video );
//								$iframe = str_replace( '<iframe', '<iframe class="oab-two-column-with-speaker-and-text__video-iframe" data-cookieconsent="marketing" frameborder="0" allowfullscreen ', $iframe);
//								$iframe = str_replace( '</iframe>', '</iframe><div class="cookieconsent-optout-marketing">
//                                                            <div class="cookieconsent-wrapper">
//                                                              <div>Veuillez <a>accepter les cookies marketing</a> pour regarder la vidéo.</div>
//                                                            </div>
//                                                          </div>', $iframe );
//								echo $iframe;
//								?>
<!--							</div>-->
<!--					</div>-->
<!--				--><?php //} ?>
            </div>



            <div class="col-md-12 col-lg-4 col-xl-4 <?php echo ($text_position === 'Right') ? 'order-1' : 'order-lg-2 order-sm-1 order-1' ?>">
                <div class="oab-two-column-with-speaker-and-text__images">
					<div class="oab-two-column-with-speaker-and-text__bg"></div>
					<div class="oab-two-column-with-speaker-and-text__img-container">
						<?php if($speaker_img_id) { ?>
							<img class="oab-two-column-with-speaker-and-text__img" src="<?php echo esc_url($speaker_img_url); ?>" alt="<?php echo esc_attr($speaker_img_alt); ?>" title="<?php echo esc_attr($speaker_img_title); ?>">
						<?php } ?>
						<h2 class="oab-two-column-with-speaker-and-text__speaker-name"><?php echo esc_html($speaker_name); ?></h2>
						<div class="oab-two-column-with-speaker-and-text__speaker-position"><?php echo esc_html($speaker_position); ?></div>

						<?php if($speaker_logo_navy_id) { ?>
							<div class="oab-two-column-with-speaker-and-text__logo"><img src="<?php echo esc_url($speaker_logo_navy_url); ?>" alt="<?php echo esc_attr($speaker_logo_navy_alt); ?>" title="<?php echo esc_attr($speaker_logo_navy_title); ?>"></div>
						<?php } ?>

						<div class="oab-two-column-with-speaker-and-text__social-media">
							<?php if($speaker_linkedin) {?>
								<div class="oab-two-column-with-speaker-and-text__linkedin-icon"><a href="<?php echo esc_url($speaker_linkedin); ?>" target="_blank"><img src="<?php echo esc_url($linkedin_icon); ?>" alt="Linkedin icon" title="Linkedin icon"></a></div>
							<?php } ?>
						</div>
					</div>
					<img class="oab-two-column-with-speaker-and-text__icon <?php if ( $text_position == 'Right' ) : ?>right<?php endif; ?>" src="<?php echo esc_url($icon); ?>" alt="Pink rectangle" title="Pink rectangle">
                </div>
            </div>

        </div>

    </div>
</section>




