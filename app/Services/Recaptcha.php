<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Recaptcha
{
    static function check($captchareponse){
        $datas = [
            "secret" => env('RECAPTCHAV3_SECRET'),
            "response" => $captchareponse
        ];

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', $datas)->json();
        return $response['success'];
    }
}
