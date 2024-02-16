<?php

class ApiRequest
{
    private $url;
    private $jsonx;

    public function __construct($url)
    {
        $this->url = $url;
        $this->jsonx = new danharper\JSONx\JSONx;
    }

    public function prepareData($data)
    {
        $timestamp = time();
        $signature = sha1($timestamp . 'credy');
        $data['timestamp'] = $timestamp;
        $data['signature'] = $signature;
        return $data;
    }

    public function sendRequest($data)
    {
        $payload = $this->jsonx->toJSONx($this->prepareData($data));

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
