<?php

namespace RAE;

class HttpInterface
{
    public $debug;
    public $truncatedDebug;

    public function setDebug(
        $bool)
    {
        $this->debug = $bool;
    }

    public function setTruncatedDebug(
        $bool)
    {
        $this->truncatedDebug = $bool;
    }

    public function sendRequest(
        $endpoint)
    {
        $url = Constants::BASE_URL.$endpoint;

        $headers =
        [
            'User-Agent'        => 'Diccionario/2 CFNetwork/808.2.16 Darwin/16.3.0',
            'Content-Type'      => 'application/x-www-form-urlencoded',
            'Authorization'     => Constants::AUTH,
        ];

        $options =
        [
            'headers'   => $headers,
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, $options);
        $body = str_replace("\n", '', $response->getBody()->getContents());
        $body = str_replace("\t", '', $body);

        if (strpos($body, 'json(') !== false) {
            $body = substr($body, 5, -1);
        } elseif (strpos($body, 'jsonp123(') !== false) {
            $body = substr($body, 9, -1);
        } elseif ($body != strip_tags($body)) {
            $body = Utils::get_definitions($body);
        }

        if (is_array($body)) {
            $body = json_encode($body);
        }

        if ($this->debug) {
            Debug::printRequest('GET', Constants::BASE_URL.$endpoint);
            $bytes = Utils::formatBytes($response->getHeader('Content-Length')[0]);
            Debug::printHttpCode($response->getStatusCode(), $bytes);
            Debug::printResponse($body, $this->truncatedDebug);
        }

        if ($response->getStatusCode() != 200) {
            throw new Exception\RAEException('Llamada no disponible en este momento.');
            return;
        }

        return json_decode($body, true);
    }
}
