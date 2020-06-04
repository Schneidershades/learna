<?php

namespace App\Traits\ApiProvider\Payments;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use App\Models\User;
use Carbon\Carbon;

class Flutterwave
{
    public static function credentials($testing_api)
    {
        if ($testing_api == "test") {
            return [
                'public_key' => 'FLWPUBK_TEST-c4a138b24a98ba7c339d5f85cffcb4d0-X',
                'secret_key' => 'FLWSECK_TEST-571d558c3224cd770f6d7f90b29b4af8-X',
                'encryption_key' => 'FLWSECK_TEST50b1cc42cd68',
            ];
        }
        if ($testing_api == "live") {
            return [
                'public_key' => 'FLWPUBK-72e04b9d48100203d0feebf417fd01df-X',
                'secret_key' => 'FLWSECK-cde47246eeb1868f05a611673dfb1f8c-X',
                'encryption_key' => 'cde47246eeb10bb4609baec7',
            ];
        }
    }

    public static function verifyTransaction($reference, $transactionId=null)
    {
        $credentials = Flutterwave::credentials('test');
        
        $ref = $reference;
        $amount = "";
        $currency = "";

        $query = array(
            "SECKEY" => $credentials['secret_key'],
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        return $resp;
    }
}
