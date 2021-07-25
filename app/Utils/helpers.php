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

if (! function_exists('moneyFormat')) {    
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function moneyFormat($str) {
        return 'Rp. ' . number_format($str, '0', '', '.');
    }
}

if (! function_exists('dateID')) {         
    /**
     * dateID
     *
     * @param  mixed $tanggal
     * @return void
     */
    function dateID($tanggal) {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('l, d F Y');
    }
}
