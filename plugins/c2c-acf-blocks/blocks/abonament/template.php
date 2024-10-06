<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
    $steps  = get_field( 'steps' );
    $step_count = 0;
    $step_count_line = 1;
    $first_step = get_field("step_one_group");
    $second_step = get_field("step_two_group");

    $menus = $first_step['menu_list'];

    $wrapper_attributes = get_block_wrapper_attributes([
        'class' => 'AbonamentSection',
    ]);
?>
<section <?php echo $wrapper_attributes; ?>>
    <form id="abonament-form">
        <div class="container cab-abonament-container">
            <div class="row">
                <div class="col-12">
                    <div class="progress-bar-section">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        <?php
                        if( $steps ) {
                            echo '<ul class="steps-table">';
                            foreach( $steps as $step ) {
                                $step_txt = $step['step_txt'];
                                $step_count ++;
                                $step_count_line ++;
                                echo '<li class="step-txt-single step '."step-$step_count".'">';
                                echo esc_html( $step_txt );
                                echo '</li>';
                                echo '<span class="step-line step '."step-$step_count_line".'">';
                                echo '</span>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="field-set-container">
                <fieldset class="field-set-introduction fieldset-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="introduction-container">
                                <div class="introduction-title-container">
                                    <p class="introduction-title"><?php echo esc_html($first_step['first_step_title']); ?></p>
                                    <p class="introduction-title-additional-info"><?php echo esc_html($first_step['first_step_text']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="introduction-menu-container">
                                    <?php
                                    if( $menus ) {
                                        foreach( $menus as $menu ) {
                                            $menu_name = $menu['menu_name'];
                                            $menu_link = $menu['menu_link'];
                                            echo '<a class="menu-single" href="'.$menu_link.'">';
                                            echo esc_html( $menu_name );
                                            echo '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="introduction-delivery-container">
                                    <p class="introduction-delivery-title"><?php echo esc_html($first_step['first_step_delivery_title']); ?></p>
                                    <p class="introduction-delivery-annotation"><?php echo esc_html($first_step['first_step_form_annotation']); ?></p>
                                    <div class="introduction-deliver-form">
                                        <p class="introduction-deliver-form-title">Podaj dane</p>
                                        <div id="form-deliver-details">
                                            <div class="form-row">
                                                <div class="form-input-single">
                                                    <label for="UserName">Imię i Nazwisko <span class="delivery-form-required">*</span></label>
                                                    <input type="text" id="UserName" name="UserName" placeholder="Podaj Imię" required>
                                                </div>
                                                <div class="form-input-single">
                                                    <label for="UserCity">Miasto<span class="delivery-form-required">*</span></label>
                                                    <select id="UserCity" name="UserCity" required>
                                                        <option value="" disabled selected>Wybierz</option>
                                                        <option value="Rzeszow">Rzeszów</option>
                                                        <option value="Mielec">Mielec</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-input-single">
                                                    <label for="UserAdres">Adres<span class="delivery-form-required">*</span></label>
                                                    <input type="text" id="UserAdres" name="UserAdres" placeholder="Podaj Adres" class="required" required>
                                                </div>
                                                <div class="form-input-single">
                                                    <label for="UserHomeNumer">Nr Domu<span class="delivery-form-required">*</span></label>
                                                    <input type="text" id="UserHomeNumber" name="UserHomeNumber" placeholder="Podaj nr domu" class="required" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-input-single">
                                                    <label for="UserPostCode">Kod Pocztowy<span class="delivery-form-required">*</span></label>
                                                    <input type="phone" id="UserPostCode" name="UserPostCode" placeholder="Podaj kod pocztowy" class="required" required>
                                                </div>
                                                <div class="form-input-single">
                                                    <label for="UserPhone">Telefon<span class="delivery-form-required">*</span></label>
                                                    <input type="phone" id="UserPhone" name="UserPhone" placeholder="Podaj nr telefonu" class="required" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-input-single">
                                                    <label for="UserEmail">E-mail<span class="delivery-form-required">*</span></label>
                                                    <input type="email" id="UserEmail" name="UserEmail" placeholder="Podaj adres e-mail" class="required" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-nav-btn-container first-step-btn">
                                    <input  id="btn-customer-details-section" type="button" name="next" class="next action-button" value="Przejdź dalej" />
                                </div>
                            </div>
                        </div>
                </fieldset>
                <fieldset class="fieldset-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="diet-type-container">
                                <p class="diet-type-title"><?php echo esc_html($second_step['step_two_title']); ?></p>
                                <?php
                                if ($second_step) {
                                    $product_list = $second_step['abonamenty_list'];
                                    if ($product_list) {
                                        echo '<ul id="products-list" class="products-list">';
                                        if (is_array($product_list)) {
                                            foreach ($product_list as $product) {
                                                if ($product) {
                                                    $product_id = is_object($product) ? $product->ID : $product;
                                                    $wc_product = wc_get_product($product_id);
                                                    if ($wc_product) {
                                                        $product_title = $wc_product->get_name();
                                                        $product_description = $wc_product->get_description();

                                                        echo '<li id="' . $product_id . '" class="product-single product-' . $product_id . '">';
                                                        echo '<div class="product-single-txt-container">';
                                                        echo '<div class="product-single-txt-container-txt">';
                                                        echo '<p class="product-list-product-name">' . esc_html($product_title) . '</p>';
                                                        echo '<p class="product-list-product-description">' . wp_kses_post($product_description) . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
//                                                        echo '<div class="product-single-icon-container">';
//                                                        echo '<img src="' . plugin_dir_url(dirname(__FILE__, 2)) . 'img/icon-add.png' . '">';
//                                                        echo '</div>';
                                                        echo '</li>';
                                                    }
                                                }
                                            }
                                        }
                                        echo '</ul>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-nav-btn-container">
                                <input type="button" name="back" class="back action-button" value="Wstecz" />
                                <input type="button" name="next" id="render-product-attributes" class="next action-button" value="Przejdź dalej" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="productVariationsFieldset" class="fieldset-3">
                    <!-- This content will be loaded dynamically via AJAX -->
                </fieldset>
                <fieldset id="orderSummaryFieldset" class="fieldset-4">
                    <!-- This content will be loaded dynamically via AJAX -->
                </fieldset>
            </div>
        </div>
    </form>
</section>
