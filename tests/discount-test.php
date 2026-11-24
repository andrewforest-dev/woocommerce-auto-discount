
<?php

// Simulate WordPress and WooCommerce dependencies.
define('ABSPATH', __DIR__);

function add_action(...$args) {}
function add_filter(...$args) {}

function wc_get_price_decimals() {
    return 2;
}

require_once __DIR__ . '/../woocommerce-auto-discount.php';

// Simulate a WooCommerce product.
class MockProduct {

    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function get_regular_price() {
        return $this->price;
    }
}

// Control the promotion status during testing.
class TestDiscount extends AndrewForest_Auto_Discount {

    private $active;

    public function __construct($active) {
        $this->active = $active;
    }

    public function is_promotion_active() {
        return $this->active;
    }
}

function checkResult($name, $expected, $actual) {

    if ($expected !== $actual) {
        echo "FAIL: $name\n";
        echo "Expected: " . var_export($expected, true) . "\n";
        echo "Actual: " . var_export($actual, true) . "\n";
        exit(1);
    }

    echo "PASS: $name\n";
}

$active = new TestDiscount(true);
$inactive = new TestDiscount(false);

// Test promotional prices.
checkResult(
    '15% discount on 10000',
    8500.0,
    $active->apply_discount(10000, new MockProduct(10000))
);

checkResult(
    '15% discount on 50000',
    42500.0,
    $active->apply_discount(50000, new MockProduct(50000))
);

checkResult(
    '15% discount on 100000',
    85000.0,
    $active->apply_discount(100000, new MockProduct(100000))
);

// Test inactive promotion.
checkResult(
    'Regular price outside promotion',
    50000,
    $inactive->apply_discount(50000, new MockProduct(50000))
);

// Test existing lower sale price.
checkResult(
    'Preserve lower sale price',
    7000.0,
    $active->apply_discount(7000, new MockProduct(10000))
);

// Test invalid regular price.
checkResult(
    'Preserve price when regular price is invalid',
    5000,
    $active->apply_discount(5000, new MockProduct(''))
);

// Test coupon restrictions.
checkResult(
    'Disable coupons during promotion',
    false,
    $active->validate_coupons(true)
);

checkResult(
    'Allow coupons outside promotion',
    true,
    $inactive->validate_coupons(true)
);

checkResult(
    'Preserve disabled coupon configuration',
    false,
    $inactive->validate_coupons(false)
);

echo "\nAll 9 tests passed successfully.\n";
