<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Msg extends CI_Controller
{
    public function test()
    {
        $payload = [
            'username' => 'GPICTadmin123',
            'password' => 'Sbcl24@1971',
            'apicode' => '1',
            'msisdn' => ['01711086791'],
            'countrycode' => '880',
            'cli' => 'GP ICT',
            'messagetype' => '1',
            'message' => 'Test SMS',
            'clienttransid' => time() . rand(1000,9999),
            'bill_msisdn' => '01313704545',
            'tran_type' => 'T',
            'request_type' => 'S',
            'rn_code' => '71'
        ];

        $ch = curl_init('https://gpcmp.grameenphone.com/gp/ecmapigw/webresources/ecmapigw.v3');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            echo curl_error($ch);
        } else {
            echo "<pre>";
            print_r(json_decode($response, true));
        }

        curl_close($ch);
    }
}