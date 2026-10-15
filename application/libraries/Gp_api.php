<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gp_api {
    private $api_url;
    private $username;
    private $password;
    private $apicode;
    private $countrycode;
    private $cli;
    private $messagetype;
    private $tran_type;
    private $request_type;
    private $rn_code;

    public function __construct() {
        $CI = &get_instance();
        $CI->config->load('gp_api', TRUE);
        $config = $CI->config->item('gp_api');
        
        $this->load_config($config['option_1']);
    }

    public function load_config($config) {
        $this->api_url = isset($config['api_url']) ? $config['api_url'] : 'https://gpcmp.grameenphone.com/gp/ecmapigw/webresources/ecmapigw.v3';
        $this->username = isset($config['username']) ? $config['username'] : 'GPICTadmin123';
        $this->password = isset($config['password']) ? $config['password'] : '@Test123';
        $this->apicode = isset($config['apicode']) ? $config['apicode'] : '1';
        $this->countrycode = isset($config['countrycode']) ? $config['countrycode'] : '880';
        $this->cli = isset($config['cli']) ? $config['cli'] : 'GP ICT';
        $this->messagetype = isset($config['messagetype']) ? $config['messagetype'] : '1';
        $this->tran_type = isset($config['tran_type']) ? $config['tran_type'] : 'P';
        $this->request_type = isset($config['request_type']) ? $config['request_type'] : 'S';
        $this->rn_code = isset($config['rn_code']) ? $config['rn_code'] : '71';
        
        log_message('debug', 'GP API Loaded with Username: ' . $this->username);
        return $this;
    }

    public function send_single_message() {

   

        // if (empty($clienttransid)) {
        //     $clienttransid = $this->generate_client_trans_id();
        // }

        // if (!is_array($msisdn)) {
        //     $msisdn = [$msisdn];
        // }

        $payload = [
            'username' => 'GPICTadmin123',
            'password' => '@Test123',
            'apicode' => '1',
            'msisdn' =>  "01711086791",
            'countrycode' => '880',
            'cli' => 'GP ICT',
            'messagetype' => '1',
            'message' => 'Test msg',
            'clienttransid' => '1311161161642679986567566',
            'bill_msisdn' => '01533436831',
            'tran_type' => 'p',
            'request_type' => 's',
            'rn_code' => '71'
        ];

        return $this->send_request($payload);
    }

    private function send_request($payload) {
        $ch = curl_init('https://gpcmp.grameenphone.com/gp/ecmapigw/webresources/ecmapigw.v3');
        $json_payload = json_encode($payload);
        
        // echo $api_url;
        // exit;
        log_message('debug', '========== GP API REQUEST ==========');
        log_message('debug', 'URL: ' . $this->api_url);
        log_message('debug', 'Username: ' . $this->username);
        log_message('debug', 'Payload: ' . $json_payload);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Content-Length: ' . strlen($json_payload)
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        $info = curl_getinfo($ch);
        
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $response_headers = substr($response, 0, $header_size);
        $response_body = substr($response, $header_size);
        
        curl_close($ch);

        log_message('debug', '========== GP API RESPONSE ==========');
        log_message('debug', 'HTTP Code: ' . $http_code);
        log_message('debug', 'Headers: ' . $response_headers);
        log_message('debug', 'Body: ' . $response_body);
        log_message('debug', 'cURL Info: ' . print_r($info, true));

        if ($curl_error) {
            log_message('error', 'GP API cURL Error: ' . $curl_error);
            return false;
        }

        if ($http_code != 200 && $http_code != 201) {
            log_message('error', 'GP API HTTP Error: ' . $http_code . ' - Response: ' . $response_body);
            return false;
        }

        $response_data = json_decode($response_body, true);
        
        if ($response_data === null) {
            log_message('error', 'GP API Invalid JSON Response: ' . $response_body);
            return false;
        }

        if (isset($response_data['statusInfo'])) {
            $statusCode = $response_data['statusInfo']['statusCode'];
            $errorDescription = $response_data['statusInfo']['errordescription'] ?? 'Unknown error';
            
            if ($statusCode == '1000') {
                log_message('info', ' SMS sent successfully! Server Ref: ' . ($response_data['statusInfo']['serverReferenceCode'] ?? 'N/A'));
                return $response_data;
            } else {
                log_message('error', ' GP API Error Code: ' . $statusCode);
                log_message('error', ' GP API Error Description: ' . $errorDescription);
                
                $error_messages = [
                    '1000' => 'Success',
                    '1001' => 'System error',
                    '1002' => 'Invalid Username - Please check your username',
                    '1003' => 'Invalid Password - Please check your password',
                    '1004' => 'Invalid API Code - Check your API code',
                    '1005' => 'Invalid MSISDN - Check the phone number format',
                    '1006' => 'Invalid Message - Message may be too long or invalid',
                    '1007' => 'Insufficient Balance - Not enough SMS credits',
                    '1008' => 'Invalid CLI - Sender ID not approved',
                    '1009' => 'Duplicate Transaction ID',
                    '1010' => 'Invalid Country Code',
                    '1011' => 'Invalid Transaction Type',
                    '1012' => 'Invalid Request Type',
                    '1013' => 'Invalid RN Code'
                ];
                
                $human_readable = $error_messages[$statusCode] ?? 'Unknown error code: ' . $statusCode;
                log_message('error', '→ ' . $human_readable);
                
                return false;
            }
        }

        return $response_data;
    }

    private function generate_client_trans_id() {
        return time() . rand(100000, 999999) . rand(100000, 999999);
    }

    public function set_api_url($url) {
        $this->api_url = $url;
        return $this;
    }

    public function set_credentials($username, $password) {
        $this->username = $username;
        $this->password = $password;
        return $this;
    }
    
    public function test_credentials($option = 'option_1') {
        $CI = &get_instance();
        $CI->config->load('gp_api', TRUE);
        $config = $CI->config->item('gp_api');
        
        if (isset($config[$option])) {
            $this->load_config($config[$option]);
        }
        
        $test_payload = [
            'username' => $this->username,
            'password' => $this->password,
            'apicode' => $this->apicode,
            'msisdn' => ['01949990312'],
            'countrycode' => $this->countrycode,
            'cli' => $this->cli,
            'messagetype' => $this->messagetype,
            'message' => 'Test credentials - ' . date('Y-m-d H:i:s'),
            'clienttransid' => $this->generate_client_trans_id(),
            'bill_msisdn' => '01533436831',
            'tran_type' => $this->tran_type,
            'request_type' => $this->request_type,
            'rn_code' => $this->rn_code
        ];
        
        return $this->send_request($test_payload);
    }
}