<?php


namespace Eurostatgroup\Api\HttpAdapter;

use Eurostatgroup\Api\Exceptions\ApiException;

interface HttpAdapterInterface
{
    /**
     * Send a request to the specified Mollie api url.
     *
     * @param  string  $httpMethod
     * @param  string  $url
     * @param  string  $headers
     * @param  string  $httpBody
     * @return \stdClass|null
     * @throws ApiException
     */
    public function send($httpMethod, $url, $headers, $httpBody);

    /**
     * The version number for the underlying http client, if available.
     * @return string|null
     * @example Guzzle/6.3
     *
     */
    public function versionString();
}