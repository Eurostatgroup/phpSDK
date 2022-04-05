<?php

namespace Eurostatgroup\Api\HttpAdapter;

interface HttpAdapterPickerInterface
{
    /**
     * @param  \GuzzleHttp\ClientInterface|\Eurostatgroup\Api\HttpAdapter\HttpAdapterPickerInterface  $httpClient
     *
     * @return \Eurostatgroup\Api\HttpAdapter\HttpAdapterPickerInterface
     */
    public function pickHttpAdapter($httpClient);
}