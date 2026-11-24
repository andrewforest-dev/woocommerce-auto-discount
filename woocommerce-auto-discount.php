
<?php
/**
 * Plugin Name: WooCommerce Auto Discount
 * Description: Automated monthly promotional discounts for WooCommerce.
 * Version: 1.0.0
 * Author: Andrés Devia - Andrew Forest
 * Author URI: https://andrewforest.com
 * Requires PHP: 7.4
 */

defined('ABSPATH') || exit;

class AndrewForest_Auto_Discount {

    const PROMOTION_DAY = 15;
    const DISCOUNT_PERCENTAGE = 15;
    const TIMEZONE = 'America/Bogota';

    /**
     * Register WooCommerce hooks.
     */
    public function __construct() {

        add_filter(
            'woocommerce_product_get_price',
            array($this, 'apply_discount'),
            99,
            2
        );

        add_filter(
            'woocommerce_product_variation_get_price',
            array($this, 'apply_discount'),
            99,
            2
        );

        add_filter(
            'woocommerce_coupons_enabled',
            array($this, 'validate_coupons')
        );
    }

    /**
     * Check if the monthly promotion is active.
     */
    public function is_promotion_active() {

        $timezone = new DateTimeZone(self::TIMEZONE);
        $date = new DateTimeImmutable('now', $timezone);

        return (int) $date->format('j')
            === self::PROMOTION_DAY;
    }

    /**
     * Calculate the promotional product price.
     */
    public function apply_discount($price, $product) {

        if (!$this->is_promotion_active()) {
            return $price;
        }

        $regular_price = $product->get_regular_price();

        if (!is_numeric($regular_price)
            || (float) $regular_price <= 0) {
            return $price;
        }

        $discount = self::DISCOUNT_PERCENTAGE / 100;

        $discounted_price = (float) $regular_price
            * (1 - $discount);

        // Preserve an existing lower promotional price.
        if (is_numeric($price)) {
            $discounted_price = min(
                (float) $price,
                $discounted_price
            );
        }

        return round(
            $discounted_price,
            wc_get_price_decimals()
        );
    }

    /**
     * Disable coupons during the promotion.
     */
    public function validate_coupons($enabled) {

        if ($this->is_promotion_active()) {
            return false;
        }

        return $enabled;
    }
}

/**
 * Initialize only when WooCommerce is available.
 */
add_action('plugins_loaded', function () {

    if (class_exists('WooCommerce')) {
        new AndrewForest_Auto_Discount();
    }
});
