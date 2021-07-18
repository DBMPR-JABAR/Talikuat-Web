<?php

use GuzzleHttp\Client;

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
    function pushNotification($title, $descrition, $token)
    {
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
                "to" => $token
            ]
        ]);
    }
}
