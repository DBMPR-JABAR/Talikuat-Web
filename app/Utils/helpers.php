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

        if ($result != null) {

            $client = new Client([
                'base_uri' => 'https://fcm.googleapis.com/fcm/',
                'headers' => [
                    'Authorization' => 'key=' . env('FCM_API_KEY'),
                    'Accept' => 'application/json',
                ],
            ]);

            $response = $client->post('send', [
                "json" => [
                    "data" => [
                        "title" => $title,
                        "description" => $descrition
                    ],
                    "to" => "cHcIRX14QXqfUOL80nbVpr:APA91bG2kdJwR-1j0hKFbOejNSD9Ugbqb217KlaKVW7lrAoMJzDiup34ufBJXsDXKSs3nttJm7HOy_CMi7PCkhFNuO9ytkOo46i9Ajjfz7uGPfs03L-FJKubhMvAYP7IMqoTQ6UQwykV"
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
