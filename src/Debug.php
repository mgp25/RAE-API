<?php

namespace RAE;

class Debug
{
    public static function printRequest(
        $method,
        $endpoint)
    {
        if (php_sapi_name() == 'cli') {
            $method = Utils::colouredString("{$method}:  ", 'light_blue');
        } else {
            $method = $method.':  ';
        }
        echo $method.$endpoint."\n";
    }

    public static function printUpload(
        $uploadBytes)
    {
        if (php_sapi_name() == 'cli') {
            $dat = Utils::colouredString('→ '.$uploadBytes, 'yellow');
        } else {
            $dat = '→ '.$uploadBytes;
        }
        echo $dat."\n";
    }

    public static function printHttpCode(
        $httpCode,
        $bytes)
    {
        if (php_sapi_name() == 'cli') {
            echo Utils::colouredString("← {$httpCode} \t {$bytes}", 'green')."\n";
        } else {
            echo "← {$httpCode} \t {$bytes}\n";
        }
    }

    public static function printResponse(
        $response,
        $truncated = false)
    {
        if (php_sapi_name() == 'cli') {
            $res = Utils::colouredString('RESPONSE: ', 'cyan');
        } else {
            $res = 'RESPONSE: ';
        }
        if ($truncated && strlen($response) > 1000) {
            $response = substr($response, 0, 1000).'...';
        }
        echo $res.$response."\n\n";
    }

    public static function printPostData(
        $post)
    {
        if (php_sapi_name() == 'cli') {
            $dat = Utils::colouredString('DATA: ', 'yellow');
        } else {
            $dat = 'DATA: ';
        }
        echo $dat.urldecode($post)."\n";
    }
}
