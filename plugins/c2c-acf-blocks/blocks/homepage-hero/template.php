<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//    $steps  = get_field( 'steps' );
//    $step_count = 0;
//    $first_step = get_field("step_one_group");


    $subtitle = get_field("subtitle");
    $title = get_field("title");
    $text = get_field("text");
    $img = get_field("image");
    $backgroundColor = get_field("background_color");
    $backgroundOverlay = get_field("background_overlay");
    $tiles = get_field("tiles");

//    $menus = $first_step['menu_list'];

    $wrapper_attributes = get_block_wrapper_attributes([
        'class' => 'HomepageHero',
    ]);
?>
<section <?php echo $wrapper_attributes; ?> style=" background:url(<?php echo esc_url($backgroundOverlay)?>) <?php echo $backgroundColor?>;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="homepage-hero-txt-area">
                    <p class="homepage-hero-subtitle"><?php echo esc_html($subtitle)?></p>
                    <h1 class="homepage-hero-title"> <?php echo esc_html($title)?></h1>
                    <p class="homepage-hero-text"> <?php echo esc_html($text)?></p>
                    <div class="homepage-hero-tiles">
                        <?php
                        if( $tiles ) {
                            foreach( $tiles as $tile ) {
                                $tile_title = $tile['tile_title'];
                                $tile_text= $tile['tile_text'];
                                $tile_color= $tile['tile_color'];
                                $tile_link = $tile['tile_link'];
                                echo '<div class="tile-single" href="'.$tile_link.'">';
                                echo '<div class="tile-single-txt-container">';
                                echo '<p class="tile-single-title">'.esc_html($tile_title).'</p>';
                                echo '<p class="tile-single-text">'.esc_html($tile_text).'</p>';
                                echo '</div>';
                                echo '<div class="tile-single-bottom-area">';
                                echo '<span class="tile-single-arrow"></span>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img class="homepage-hero-img" src="<?php echo esc_url($img)?>">
            </div>
        </div>
    </div>
</section>
