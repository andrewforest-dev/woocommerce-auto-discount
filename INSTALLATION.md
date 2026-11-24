
# Installation Guide

## Requirements

- WordPress
- WooCommerce
- PHP 7.4 or higher
- WordPress administrator access
- Local or staging environment

## Manual Installation

1. Download the repository as a ZIP file.
2. Extract the downloaded file.
3. Upload the plugin folder to the WordPress plugins directory.
4. Open the WordPress administration dashboard.
5. Navigate to Plugins > Installed Plugins.
6. Activate WooCommerce Auto Discount.

## Default Configuration

| Parameter | Value |
|---|---|
| Promotion day | 15 |
| Discount percentage | 15% |
| Timezone | America/Bogota |

## Custom Configuration

The promotion settings can be modified through
the constants defined in the PHP source file:

- PROMOTION_DAY
- DISCOUNT_PERCENTAGE
- TIMEZONE

## Expected Behavior

- The promotional discount activates on the 15th
  of every month.
- Regular pricing behavior resumes on other days.
- Coupons are disabled during the promotion.
- Original product prices remain unchanged in
  the database.

## Important Notice

This project is a development prototype.
Test compatibility, variable products, pricing
cache and coupon behavior before production use.

## Author

Andrés Devia - Andrew Forest

https://andrewforest.com
