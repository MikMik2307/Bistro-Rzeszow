<?php
/**
 * Plugin Name:       C2C ACF Blocks
 * Plugin URI:        https://www.webdevdm.pl/
 * Description:       Plugin containing ACF Gutenberg blocks
 * Version:           2.0.0
 * Author:            Webdevdm
 * Author URI:        https://www.webdevdm.pl/
 * Text Domain:       c2c-acf-blocks
 */

namespace Webdevdm\C2C_ACF_Blocks;

// Define plugin path and URL constants
if (!defined('CAB_PATH')) {
    define('CAB_PATH', plugin_dir_path(__FILE__));
}
if (!defined('CAB_URL')) {
    define('CAB_URL', plugin_dir_url(__FILE__));
}

// Import block files
require __DIR__ . '/index.php';

// Register styles and scripts
function register_scripts() {
    wp_enqueue_style('CAB-bundle', CAB_URL . 'dist/css/bundle.css');
    wp_enqueue_script('CAB-bundle', CAB_URL . 'dist/js/bundle.js', ['jquery', 'acf'], null, true);

    wp_localize_script('CAB-bundle', 'CAB_loc', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800&display=swap');
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_scripts');
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\register_scripts');

// Load plugin textdomain for translations
function CAB_load_plugin_textdomain() {
    load_plugin_textdomain('c2c-acf-blocks', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('init', __NAMESPACE__ . '\\CAB_load_plugin_textdomain');

// Handle custom AJAX action
function handle_my_custom_action() {
    if (isset($_POST['selectedProduct'])) {
        $selectedProduct = sanitize_text_field($_POST['selectedProduct']);
        echo "Selected product received: " . esc_html($selectedProduct);
    } else {
        echo "No selected product received.";
    }
    wp_die(); // Required to terminate immediately and return a proper response
}
// Register AJAX actions
add_action('wp_ajax_my_custom_action', __NAMESPACE__ . '\\handle_my_custom_action');
add_action('wp_ajax_nopriv_my_custom_action', __NAMESPACE__ . '\\handle_my_custom_action');

// Handle AJAX request for rendering product attributes
function render_product_attributes_ajax() {
    ob_start();
    render_product_attributes_container(); // Render only product attributes
    $output = ob_get_clean();
    echo $output;
    wp_die();
}
add_action('wp_ajax_render_product_attributes', __NAMESPACE__ . '\\render_product_attributes_ajax');
add_action('wp_ajax_nopriv_render_product_attributes', __NAMESPACE__ . '\\render_product_attributes_ajax');

// Handle AJAX request for rendering checkout section
function ajax_render_checkout_section_container() {
    ob_start();
    render_checkout_section_container(); // Render only checkout section
    $output = ob_get_clean();
    echo $output;
    wp_die();
}
add_action('wp_ajax_load_checkout_section', __NAMESPACE__ . '\\ajax_render_checkout_section_container');
add_action('wp_ajax_nopriv_load_checkout_section', __NAMESPACE__ . '\\ajax_render_checkout_section_container');


// Function to get term name by variation ID and attribute taxonomy
function get_variation_term_name_by_id($variation_id, $taxonomy) {
    $variation = wc_get_product($variation_id);

    // Debugging information
    if (!$variation) {
        return 'Variation not found: ' . $variation_id;
    }

    if (!$variation->is_type('variation')) {
        return 'Not a variation type: ' . $variation_id;
    }

    $attributes = $variation->get_variation_attributes();

    // Debugging information
    if (empty($attributes)) {
        return 'No attributes found for variation: ' . $variation_id;
    }

    foreach ($attributes as $tax => $value) {
        if ($tax === 'attribute_' . $taxonomy) {
            $term = get_term_by('slug', $value, $taxonomy);

            // Debugging information
            if (!$term) {
                return 'Term not found for slug: ' . $value;
            }

            if (is_wp_error($term)) {
                return 'Error fetching term: ' . $term->get_error_message();
            }

            return $term->name;
        }
    }

    return 'Attribute not found for taxonomy: ' . $taxonomy;
}

// Function to render product attributes container
function render_product_attributes_container() {
    ?>
    <div class="product-attributes-container">
        <div class="row">
            <div class="col-12">
                <div class="single-product-attribute-container">
                    <?php
                    if (isset($_COOKIE['Selected_Product'])) {
                        $product_id = intval($_COOKIE['Selected_Product']);
                        $product = wc_get_product($product_id);

                        if ($product && $product->is_type('variable')) {
                            $variations = $product->get_available_variations();
                            ?>
                            <div id="product-variations">
                                <p class="diet-type-title">Czas</p>
                                <ul class="products-list">
                                    <?php foreach ($variations as $variation) :
                                        $variation_obj = wc_get_product($variation['variation_id']);
                                        ?>
                                        <li id="<?php echo esc_attr($variation_obj->get_ID()); ?>" class="product-time-variation">
                                            <div class="product-single-txt-container">
                                                <div class="product-single-txt-container-txt">
                                                    <p class="product-list-product-name"><?php echo esc_html($variation_obj->get_name()); ?></p>
                                                    <p class="product-list-product-description"><?php echo esc_html($variation_obj->get_description()); ?></p>
                                                    <p class="product-list-product-price"><?php echo wc_price($variation_obj->get_price()); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="date-attribute-section">
                                <p class="date-attribute-section-title">Pierwsza dostawa</p>
                                <div class="date-picker-section">
                                    <p class="date-picker-section-txt"> Kiedy ma zacząć się abonament?*</p>
                                    <div class="date-picker-container">
                                        <?php
                                        $date_img = esc_url(CAB_URL . 'img/calendar-icon.svg');
                                        ?>
                                        <div class="date-picker-container">
                                            <input id="date" class="date-input" value="<?php echo esc_attr($_COOKIE['Starting_Date']) ?>" placeholder="Wybierz date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                            <button type="button" id="custom-icon" class="custom-icon">
                                                <img src="<?php echo $date_img; ?>" alt="Calendar Icon" />
                                            </button>
                                        </div>
                                    </div>
                                    <p class="date-picker-section-txt-annotation">Pierwsza dostawa następuje w dniu następnym po dokonaniu zamówienia</p>
                                </div>
                                <?php
                                if (isset($_POST['set_weekend_attribute']) && isset($_POST['weekend_option'])) {
                                    $selected_weekend_option = sanitize_text_field($_POST['weekend_option']);
                                    echo '<p>Wybrano opcję Weekend: ' . esc_html($selected_weekend_option) . '</p>';
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            echo '<p>No variations found for the selected product.</p>';
                        }
                    } else {
                        echo '<p>No product selected.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-nav-btn-container">
                    <input type="button" name="back" class="back action-button" value="Wstecz" />
                    <button name="next" class="next action-button" value="Przejdź dalej" id="add-to-cart-button" data-product-id="<?php echo intval($_COOKIE['Selected_Product']) ?>" data-nonce="<?php echo esc_attr($nonce); ?>" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">Add to Cart 2</button>
                    <input type="button" name="next" class="next action-button" value="Przejdź dalej" id="add-to-cart-button" data-product-id="<?php echo intval($_COOKIE['Selected_Product']) ?>" data-nonce="<?php echo esc_attr($nonce); ?>" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"/>
                </div>
                <div class="form-nav-btn-container">
                    <input type="button" name="back" class="back action-button" value="Wstecz" />
                    <input type="button" name="next" id="render_orderSummaryFieldset" class="next action-button" value="Przejdź dalej" />
                </div>
            </div>
        </div>
    </div>
    <?php
}
function render_checkout_section_container(){
    ?>
    <div class="product-attributes-container">
        <div class="row">
            <div class="col-12">
                <div class="order-summary-container">
                    <p class="order-summary-title order-summary-subtitle">Podsumowanie</p>
                    <div class="order-summary-restaurant-location-container">
                        <p class="order-summary-restaurant-location order-summary-subtitle">Dostawa z lokalu</p>
                        <ul class="order-summary">
                            <li class="order-summary-restaurant-location-li">
                                <?php echo '<img src="' . plugin_dir_url( __FILE__ ) . 'img/logo-icon.svg' . '">';?>
                                <p class="order-summary-restaurant-location-city">Rzeszów</p>
                                <p class="order-summary-restaurant-location-street">ul.Krakowska 14</p>
                            </li>
                        </ul>
                    </div>
                    <div class="order-summary-delivery-container">
                        <p class="order-summary-subtitle">Adres Dostawy</p>
                        <ul class="order-summary">
                            <li class="order-summary-customer-location-li">
                                <p class="order-summary-customer-location-title">Dostawa na</p>
                                <p id="order-summary-customer-location" class="order-summary-customer-location-txt"></p>
                            </li>
                        </ul>
                    </div>
                    <div class="order-summary-diet-container">
                        <p class="order-summary-subtitle">Rodzaj Diety</p>
                        <ul class="products-list">
                            <?php
                            // Check if the cookie is set
                            if (isset($_COOKIE['Selected_Product'])) {
                                // Retrieve the product ID from the cookie
                                $product_id = intval($_COOKIE['Selected_Product']);

                                // Ensure WooCommerce functions are available
                                if (function_exists('wc_get_product')) {
                                    // Get the product object using the product ID
                                    $product = wc_get_product($product_id);

                                    // Check if the product object is valid
                                    if ($product) {
                                        // Get the product name
                                        $product_name = $product->get_name();

                                        // Get the product description
                                        $product_description = $product->get_description();

                                        // Display the product name inside a <p> tag
                                        echo '<li class="product-single selected-product-active selected-product-checkout" >';
                                        echo '<div class="product-single-txt-container">';
                                        echo '<div class="product-single-txt-container-txt">';
                                        echo '<p class="product-list-product-name">' . esc_html($product_name) . '</p>';

                                        // Display the product description inside a <p> tag
                                        echo '<p class="product-list-product-description">' . wp_kses_post($product_description) . '</p>';
                                        echo'</div>';
                                        echo'</div>';
                                        echo '</li>';
                                    } else {
                                        // If the product doesn't exist, display a message
                                        echo '<p>Product not found.</p>';
                                    }
                                } else {
                                    // WooCommerce is not active or available
                                    echo '<p>WooCommerce is not available.</p>';
                                }
                            } else {
                                // Cookie is not set
                                echo '<p>No product selected.</p>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div>
                        <p class="order-summary-subtitle"> Czas</p>
                        <?php
                        // Check if the required cookies are set
                        if (isset($_COOKIE['Selected_Product']) && isset($_COOKIE['Selected_Product_Time'])) {
                            // Retrieve the product ID and variation ID from the cookies
                            $product_id = intval($_COOKIE['Selected_Product']);
                            $selected_variation_id = intval($_COOKIE['Selected_Product_Time']);

                            // Get the product object using the product ID
                            $product = wc_get_product($product_id);

                            // Ensure WooCommerce functions are available and the product is a variable product
                            if ($product && $product->is_type('variable')) {
                                // Get all available variations for the product
                                $variations = $product->get_available_variations();
                                $variation_found = false;

                                ?>
                                <div id="product-variations">
                                    <ul class="products-list">
                                        <?php foreach ($variations as $variation) :
                                            // Get variation object using the variation ID from the available variations
                                            $variation_obj = wc_get_product($variation['variation_id']);
                                            if ($variation_obj->get_id() == $selected_variation_id) {
                                                $variation_found = true;

                                                // Get the attributes for the variation
                                                $attributes = $variation_obj->get_attributes();
                                                ?>
                                                <li id="<?php echo esc_attr($variation_obj->get_id()); ?>" class="product-time-variation product-time-variation-active product-time-variation-checkout">
                                                    <div class="product-single-txt-container">
                                                        <div class="product-single-txt-container-txt">
                                                            <?php
                                                            // Display attribute values only
                                                            foreach ($attributes as $taxonomy => $value) {
                                                                // Display the attribute value if it is not empty
                                                                if (!empty($value)) {
                                                                    // Replace hyphens with spaces in the attribute value
                                                                    echo '<p class="product-list-product-name">' . esc_html(str_replace('-', ' ', $value)) . '</p>';
                                                                }
                                                            }
                                                            ?>
                                                            <p class="product-list-product-description"><?php echo esc_html($variation_obj->get_description()); ?></p>
                                                            <p class="product-list-product-price"><?php echo wp_kses_post(wc_price($variation_obj->get_price())); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        endforeach; ?>

                                    </ul>
                                </div>

                                <div class="date-attribute-section">
                                </div>
                                <?php
                                if (!$variation_found) {
                                    echo '<p>Selected variation not found for the selected product.</p>';
                                }
                            } else {
                                echo '<p>No variations found for the selected product.</p>';
                            }
                        } else {
                            echo '<p>No product or variation selected.</p>';
                        }
                        ?>
                    </div>
                    <div>
                        <p class="order-summary-subtitle">Okres trwania</p>
                        <?php
                        // Function to calculate end date, including the starting day and skipping weekends
                        function calculate_end_date($start_date, $days_to_add) {
                            // Convert the starting date to a timestamp (assuming $start_date is in 'Y-m-d' format)
                            $end_date = strtotime($start_date);
                            $days_added = 0;

                            // Check if the starting date itself is a weekday
                            if (date('N', $end_date) < 6) {
                                $days_added++; // Include the starting day if it's a weekday
                            }

                            // Continue adding days until we reach the total number of days needed
                            while ($days_added < $days_to_add) {
                                $end_date = strtotime('+1 day', $end_date); // Add one day
                                // If the new day is not Saturday (6) or Sunday (0), count it as a valid day
                                if (date('N', $end_date) < 6) {
                                    $days_added++;
                                }
                            }

                            return date('Y-m-d', $end_date); // Return the end date in 'Y-m-d' format
                        }

                        // Function to format date to dd.mm.yyyy
                        function format_date($date) {
                            return date('d.m.Y', strtotime($date)); // Convert to desired format
                        }

                        // Check if the cookie 'Starting_Date' is set
                        if (isset($_COOKIE['Starting_Date'])) {
                            // Retrieve the value of the cookie and replace periods with hyphens
                            $starting_date = str_replace('.', '-', $_COOKIE['Starting_Date']);
                        } else {
                            echo '<p>Starting Date is not set.</p>';
                            exit; // Stop execution if starting date is not set
                        }

                        // Check if the cookie 'Selected_Product_Time' is set
                        if (isset($_COOKIE['Selected_Product_Time'])) {
                            // Retrieve the variation ID from the cookie
                            $variation_id = intval($_COOKIE['Selected_Product_Time']);
                            // Get the variation product object using the variation ID
                            $variation_obj = wc_get_product($variation_id);

                            if ($variation_obj && $variation_obj->is_type('variation')) {
                                // Get the attributes for the variation
                                $attributes = $variation_obj->get_attributes();

                                // Assume there is an attribute that contains the number of days (you need to adjust this based on your variation structure)
                                foreach ($attributes as $attribute_name => $attribute_value) {
                                    // Extract only the numbers from the attribute value (assuming it represents the number of days)
                                    $days_to_add = intval(preg_replace('/[^0-9]/', '', $attribute_value));

                                    if ($days_to_add > 0 && isset($starting_date)) {
                                        // Calculate the end date by skipping weekends
                                        $end_date = calculate_end_date($starting_date, $days_to_add);

                                        // Format both dates to dd.mm.yyyy
                                        $formatted_start_date = format_date($starting_date);
                                        $formatted_end_date = format_date($end_date);

                                        // Display the combined date range
                                        echo '<p class="checkout-final-dates-txt">' . htmlspecialchars($formatted_start_date) . ' - ' . htmlspecialchars($formatted_end_date) . '</p>';
                                    }
                                }
                            } else {
                                echo '<p>Invalid product variation.</p>';
                            }
                        } else {
                            echo '<p>No variation selected in the cookie.</p>';
                        }
                        ?>
                    </div>
                    <div>
                        <p class="order-summary-subtitle"> Cena Końcowa</p>
                    </div>
                    <?php
                        echo do_shortcode( '[woocommerce_checkout]' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-nav-btn-container">
                <button class="clear-cart-button">Clear Cart</button>
                <input type="button" name="back" id="clear-cart-button" class="back action-button" value="Wstecz" />
                <input type="button" name="next" class="next action-button" value="Zamawiam i płace" />
            </div>
        </div>
    </div>
<?php
}

