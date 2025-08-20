<?php

// Create a helper for money formatting.
if (!function_exists('money')) {
    function money($amount, $currency = 'USD') {
        return number_format($amount, 2) . ' ' . $currency;
    }
}
