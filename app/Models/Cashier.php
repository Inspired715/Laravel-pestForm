<?php

namespace App\Models;

use Laravel\Paddle\Cashier as PackageCashier;
use Illuminate\Support\Facades\Http;
use Laravel\Paddle\Exceptions\PaddleException;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class Cashier extends PackageCashier
{

    public static function vendorsUrl()
    {
        return 'https://'.(config('cashier.sandbox') ? 'sandbox-' : '').'api.paddle.com';
    }


    protected static function makeApiCall($method, $uri, array $payload = [])
    {
        $apiResponse = Http::withToken(config('cashier.vendor_auth_code'))->$method($uri, $payload);
        $response = $apiResponse->getBody()->getContents();
        $decodedResponse = json_decode($response, true);

        if (array_key_exists('error', $decodedResponse)) {
            throw new PaddleException($response, static::errorCode($decodedResponse['error']['code']));
        }

        return $decodedResponse;
    }


    protected static function errorCode($string)
    {
        switch ($string) {
            case 'not_found':
                $code = 404;
                break;
            case 'invalid_url':
                $code = 404;
                break;
            case 'authentication_missing':
                $code = 403;
                break;
            case 'authentication_malformed':
                $code = 403;
                break;
            case 'invalid_token':
                $code = 403;
                break;
            case 'paddle_billing_not_enabled':
                $code = 403;
                break;
            case 'forbidden':
                $code = 403;
                break;
            case 'bad_request':
                $code = 400;
                break;
            case 'internal_error':
                $code = 500;
                break;
            case 'service_unavailable':
                $code = 503;
                break;
            case 'method_not_allowed':
                $code = 405;
                break;
            case 'not_implemented':
                $code = 501;
                break;
            case 'bad_gateway':
                $code = 502;
                break;
            case 'too_many_requests':
                $code = 429;
                break;
            case 'entity_archived':
                $code = 400;
                break;
            case 'invalid_field':
                $code = 400;
                break;
            case 'entity_archived':
                $code = 400;
                break;
            case 'concurrent_modification':
                $code = 409;
                break;
            case 'conflict':
                $code = 409;
                break;
            case 'invalid_json':
                $code = 400;
                break;
            case 'invalid_time_query_parameter':
                $code = 400;
                break;
            case 'unsupported_media_type':
                $code = 415;
                break;

            default:
                $code = 500;
                break;
        }

        return $code;
    }


    public static function post($uri, array $payload = [])
    {
        return static::makeApiCall('post', static::vendorsUrl() . $uri, $payload);
    }


    public static function patch($uri, array $payload = [])
    {
        return static::makeApiCall('patch', static::vendorsUrl() . $uri, $payload);
    }


    public static function get($uri, array $payload = [])
    {
        return static::makeApiCall('get', static::vendorsUrl() . $uri, $payload);
    }
}
