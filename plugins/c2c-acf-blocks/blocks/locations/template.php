<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$title = get_field("title");
$backgroundColor = get_field("background_color");
$backgroundOverlay = get_field("background_overlay");
$locations = get_field("locations");

$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'locations',
]);
?>
<section <?php echo $wrapper_attributes; ?> style=" background:url(<?php echo esc_url($backgroundOverlay)?>) <?php echo $backgroundColor?>;">
    <div class="container">
        <div class="row location-title-row">
            <div class="col-12">
                <p class="locations-title"><?php echo esc_html($title) ?></p>
            </div>
        </div>
            <?php
            if( $locations ) {
                echo '<div class="row locations-cards-row">';
                $count = count($locations);
                $col_width = 12 / $count;
                foreach( $locations as $location ) {
                    $location_img = $location['image'];
                    $location_name = $location['name'];
                    $location_adress = $location['adress'];
                    $location_link = $location['map_link'];

                    echo '<div class="col-'.$col_width.' col-location-single">';
                        echo '<div class="location-single-container">';
                            echo '<img src="'.$location_img.'">';
                            echo '<p class="location-single-name">'.esc_html($location_name).'</p>';
                            echo '<p class="location-single-adress">'.esc_html($location_adress).'</p>';
                            echo '<div class="location-single-button-container">';
                            echo '<a class="location-single-button" href="'.$location_link.'" target="_blank">Zobacz na mapie</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
    </div>
</section>
