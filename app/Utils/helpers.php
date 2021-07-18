<?php

if (!function_exists('isNotNullOrBlank')) {
    function isNotNullOrBlank($value)
    {
        if ($value === null) {
            return false;
        } else if (is_bool($value)) {
            return true;
        } else if (trim($value) === '') {
            return false;
        } else {
            return true;
        }
    }
}
