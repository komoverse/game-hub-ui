<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    protected $komo_endpoint;
    protected $komo_api_key;

    public function __construct() {
        $this->komo_endpoint = config('komo_api.endpoint');
        $this->komo_api_key = config('komo_api.api_key');
    }

    public function komoAPI_V2($method, $url, $data = null) {
        $curl = curl_init($this->komo_endpoint.$url);
        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
        } else {
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        }
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $send_header = array('Content-Type: application/json', 'x-api-key: '.$this->komo_api_key);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $send_header);

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);
        return $result;
    }
}
