<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

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


if (!function_exists('pushNotification')) {
    function pushNotification($title, $descrition, $username)
    {
        $result = DB::table('fcm_token')->where('username', '=', $username)->first();

        if ($result == null) {
            DB::table('queue_fcm_notification')->insert([
                "title" => $title,
                "description" => $descrition,
                "username" => $username
            ]);
        } else {
            $client = new Client([
                'base_uri' => 'https://fcm.googleapis.com/fcm/',
                'headers' => [
                    'Authorization' => 'key=' . env('FCM_API_KEY'),
                    'Accept' => 'application/json',
                ],
            ]);

            $client->post('send', [
                "json" => [
                    "data" => [
                        "title" => $title,
                        "description" => $descrition
                    ],
                    "to" => $result->device_mobile_token
                ]
            ]);
        }
    }
}

if (!function_exists('moneyFormat')) {
    /**
     * moneyFormat
     *
     * @param mixed $str
     * @return void
     */
    function moneyFormat($str)
    {
        return 'Rp. ' . number_format($str, '0', '', '.');
    }
}

if (!function_exists('dateID')) {
    /**
     * dateID
     *
     * @param mixed $tanggal
     * @return void
     */
    function dateID($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('l, d F Y');
    }
}
