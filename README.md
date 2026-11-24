
# WooCommerce Auto Discount

[![PHP Code Validation](https://github.com/andrewforest-dev/woocommerce-auto-discount/actions/workflows/php-validation.yml/badge.svg?branch=main)](https://github.com/andrewforest-dev/woocommerce-auto-discount/actions/workflows/php-validation.yml)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![WordPress](https://img.shields.io/badge/WordPress-21759B?style=flat-square&logo=wordpress&logoColor=white)
![WooCommerce](https://img.shields.io/badge/WooCommerce-96588A?style=flat-square&logo=woocommerce&logoColor=white)
![Unit Tests](https://img.shields.io/badge/Unit_Tests-9_Passed-brightgreen)
![Status](https://img.shields.io/badge/Status-Prototype-orange)


## Project Overview

An automated discount system for WooCommerce, designed to apply scheduled promotional discounts without manually modifying product prices.

This project is inspired by a real e-commerce solution implemented for Libre Arte Accesorios, a Colombian accessories brand.

## Business Problem

Manually activating and deactivating promotional discounts can lead to operational errors and unnecessary administrative work.

This project aims to automate recurring promotional campaigns using PHP and WooCommerce hooks.

## Planned Features

- Automatic monthly discount activation.
- 15% discount on the 15th of every month.
- Automatic restoration of normal prices.
- Prevention of cumulative coupon discounts.
- Colombia timezone support.
- Preservation of original product prices.
- Configurable promotional conditions.

## Technologies

- PHP
- WordPress
- WooCommerce
- WooCommerce Hooks
- Conditional Logic
- Date and Time Management

## Business Logic

| Day of the month | Discount | Coupons |
|---|---|---|
| 1 - 14 | Regular prices | Enabled |
| 15 | 15% discount | Disabled |
| 16 - 31 | Regular prices | Enabled |

## Planned Project Structure

    woocommerce-auto-discount/
    ├── README.md
    └── woocommerce-auto-discount.php

## Development Status

In development. The standalone PHP implementation and testing documentation will be added to this repository.

## Learning Objectives

- Apply programming logic to real business requirements.
- Understand WordPress and WooCommerce hooks.
- Implement conditional structures in PHP.
- Automate recurring commercial processes.
- Document software development projects.
- Practice Git and version control.

## Author

Andrés Devia | Andrew Forest

Web Developer | Software Development Student | UX/UI Designer

- Portfolio: https://andrewforest.com
- GitHub: https://github.com/andrewforest-dev
- Agency: https://nexxoagencia.com
