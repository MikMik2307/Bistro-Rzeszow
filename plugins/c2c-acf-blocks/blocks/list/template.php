<?php
    $wrapper_attributes = get_block_wrapper_attributes([
			'class' => 'mt-5',
	]);
    $rows = get_field('stats' );
    $icon = OAB_URL . 'img/Rectangle 21.png';
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container-xxl">
        <div class="row justify-content-center">

                <?php if( $rows ) { ?>


                       <?php foreach($rows as $row) {
                            $value = $row['value'];
                            $desc = $row['description'];
                       ?>
						<div class="col-md-4 col-lg-4 col-xl-4 col-12">
                           <div class="oab-stats-with-text__stats-item">
                               <?php if ($value) { ?>
                                   <p><?php echo esc_html($value); ?></p>
                               <?php } ?>

                               <span><?php if ($desc) { ?>
								   <?php echo wp_kses($desc, array(
										   'br'        => array(),
								   ))
								   ?>
								   <?php }?></span>
                           </div>
						</div>
                       <?php } ?>
                <?php } ?>


		</div>
        </div>

    </div>
</section>
