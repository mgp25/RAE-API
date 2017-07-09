<?php

namespace RAE;

use RAE\Exception;
use GuzzleHttp\Client as GuzzleClient;

class HttpInterface
{
    protected $debug;
    protected $truncatedDebug;

    public function setDebug($bool)
    {
        $this->debug = $bool;
    }

    public function setTruncatedDebug($bool)
    {
        $this->truncatedDebug = $bool;
    }


    public function sendRequest(
        $endpoint,
        $class)
    {
        $url = Constants::BASE_URL . $endpoint;

        $headers =
        [
            'User-Agent'        => null,
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

        if ($this->debug) {
            Debug::printRequest('GET', $endpoint);
            $bytes = Utils::formatBytes($response->getHeader('Content-Length')[0]);
            Debug::printHttpCode($response->getStatusCode(), $bytes);
            Debug::printResponse($body, $this->truncatedDebug);
        }

        if ($response->getStatusCode() != 200) {
            throw new Exception\RAEException('Llamada no disponible en este momento.');
            return;
        }

        $mapper = new \JsonMapper();
        return $mapper->map(self::api_body_decode($body), $class);
    }

    public static function api_body_decode(
        $json,
        $assoc = false)
    {
        return json_decode($json, $assoc, 512, JSON_BIGINT_AS_STRING);
    }
}
