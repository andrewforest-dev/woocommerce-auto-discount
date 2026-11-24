
# Software Testing Plan

## Objective

Validate the functionality, reliability and business
logic of the WooCommerce Auto Discount plugin.

## Testing Environment

- WordPress
- WooCommerce
- PHP 7.4 or higher
- Local or staging environment
- Timezone: America/Bogota
- Currency: COP

## Functional Test Cases

| ID | Test Scenario | Expected Result | Status |
|---|---|---|---|
| TC-001 | Access store on day 14 | Normal prices | Pending |
| TC-002 | Access store on day 15 | 15% discount | Pending |
| TC-003 | Access store on day 16 | Normal prices restored | Pending |
| TC-004 | Apply coupon on day 15 | Coupon rejected | Pending |
| TC-005 | Apply valid coupon on day 16 | Coupon accepted | Pending |
| TC-006 | Product with invalid price | Original price preserved | Pending |
| TC-007 | Variable product | Correct promotional price | Pending |
| TC-008 | Existing lower sale price | Lower price preserved | Pending |
| TC-009 | WooCommerce inactive | No fatal errors | Pending |
| TC-010 | Verify database prices | Original values unchanged | Pending |
| TC-011 | Previously applied coupon | Coupon removed or rejected | Pending |
| TC-012 | Cached prices | Correct price after date changes | Pending |
| TC-013 | Checkout calculation | Correct promotional total | Pending |

## Discount Calculation

Formula:

Final Price = Regular Price * (1 - Discount / 100)

### Expected Calculation Results

| Original Price | Discount | Expected Price |
|---|---|---|
| 10000 COP | 15% | 8500 COP |
| 20000 COP | 15% | 17000 COP |
| 50000 COP | 15% | 42500 COP |
| 100000 COP | 15% | 85000 COP |
| 200000 COP | 15% | 170000 COP |

## Testing Methodology

- Functional testing
- Boundary value analysis
- Business logic validation
- Integration testing
- Regression testing
- Manual testing

## Acceptance Criteria

- Discounts are applied on the configured day.
- Original product prices are not modified.
- Coupons cannot be combined with the promotion.
- Normal pricing behavior resumes automatically.
- The plugin does not generate fatal errors.

## Test Execution Status

All functional tests are pending execution in a
controlled WordPress and WooCommerce environment.

The project must not be considered production-ready
until the required tests have been completed.

## Author

Andrés Devia - Andrew Forest

Software Development Student - UNAD

https://andrewforest.com
