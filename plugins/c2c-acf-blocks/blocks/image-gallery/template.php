<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$gallery = get_field("images_gallery");
$fullwidth = get_field("full_width");
if($fullwidth = true){
    $gallerywidth = 'fullwidth';
}
else{
    $gallerywidth = 'normal-width';
}
$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'image-gallery',
]);
?>
<section <?php echo $wrapper_attributes; ?> >
    <div class="container container-gallery-<?php echo esc_html($gallerywidth) ?>">
        <?php
        if ($gallery):
            $count = count($gallery);
            $col_width = 12 / min($count, 4); // Calculate column width, max 4 columns per row
            $images_per_row = 4;

            echo '<div class="row gallery-row">';
            foreach ($gallery as $index => $image):
                // Start a new row for every group of four images
                if ($index > 0 && $index % $images_per_row == 0) {
                    echo '</div><div class="row gallery-row">';
                }
                echo '<div class="col-12 col-lg-' . $col_width . ' image-gallery-single-img">';
                echo '<img src="' . $image . '" style="width: 100%;">';
                echo '</div>';
            endforeach;
            echo '</div>';
        endif;
        ?>
    </div>
</section>
