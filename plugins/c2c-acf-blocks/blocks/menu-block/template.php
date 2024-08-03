<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

$title = get_field("title");
$firstColumn = get_field("first_column");
$secondColumn = get_field("second_column");
$thirdColumn = get_field("third_column");
$backgroundColor = get_field("background_color");
$columns = ['first_column', 'second_column', 'third_column'];
$columnCount = count(array_filter([$firstColumn, $secondColumn, $thirdColumn]));
$columnWidth = 12 / $columnCount;
$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'menu-block',
]);
?>
<section <?php echo $wrapper_attributes; ?> style="background-color:<?php echo $backgroundColor;?>">
    <div class="container">
        <div class="row">
            <div class="menu-block-title">
                <h1 class="menu-block-title-txt"> <?php echo esc_html($title);?></h1>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($columns as $column) {
                if (have_rows($column)):
                    while (have_rows($column)): the_row();
                        if (have_rows('meal_category')):
                            echo '<div class="col-12 col-lg-' . $columnWidth . '">';
                            while (have_rows('meal_category')): the_row();
                                $categoryName = get_sub_field('category_name');
                                $categoryDescription = get_sub_field('category_description');
                                echo '<div class="menu-category-single">';
                                echo '<p class="menu-category-single-category-name">' . esc_html($categoryName) . '</p>';
                                echo '<p class="menu-category-single-category-description">' . esc_html($categoryDescription) . '</p>';
                                while (have_rows('menu_product')): the_row();
                                    $meal_name = get_sub_field('meal_name');
                                    $meal_price = get_sub_field('meal_price');
                                    echo '<div class="menu-product-single">';
                                    echo '<p class="menu-product-single-product-name">' . esc_html($meal_name) . '</p>';
                                    echo '<p class="menu-product-single-product-price">' . esc_html($meal_price) . ",-" . '</p>';
                                    echo '</div>';
                                endwhile;
                                echo '</div>';
                            endwhile;
                            echo '</div>';
                        endif;
                    endwhile;
                endif;
            }
           ?>
        </div>
    </div>
</section>











