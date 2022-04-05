<?php

namespace Eurostatgroup\Api;

/**
 * Eurostatgroup API client.
 * @package Eurostatgroup\Api
 * @author  Eurostatgroup
 * @since 05/04/2022
 */
class EurostatgroupClient
{
    /**
     * Version of our client.
     */
    const CLIENT_VERSION = "1.0.1";
    /**
     * Endpoint of the remote API.
     */
    const API_ENDPOINT = "https://api.eurostatgroup.com";
    /**
     * HTTP Methods
     */
    const HTTP_GET = "GET";
    const HTTP_POST = "POST";
    const HTTP_DELETE = "DELETE";
    const HTTP_PUT = "PUT";

    protected $httpClient;
    /**
     * @var string
     */
    protected $apiEndpoint = self::API_ENDPOINT;
    /**
     * @var string
     */
    protected $apiKey;
    /**
     * True if an OAuth access token is set as API key.
     *
     * @var bool
     */
    protected $oauthAccess;

    /**
     * @var array
     */
    protected $versionStrings = [];

    /**
     * RESTful Client resource.
     *
     * @var ClientEndpoint
     */
    public $clients;

    public function __construct($httpClient = null, $httpAdapterPicker = null)
    {
        $httpAdapterPicker = $httpAdapterPicker ?: new EurostatHttpAdapterPicker;
        $this->httpClient = $httpAdapterPicker->pickHttpAdapter($httpClient);

        $compatibilityChecker = new CompatibilityChecker;
        $compatibilityChecker->checkCompatibility();

        $this->initializeEndpoints();

        $this->addVersionString("Mollie/".self::CLIENT_VERSION);
        $this->addVersionString("PHP/".phpversion());

        $httpClientVersionString = $this->httpClient->versionString();
        if ($httpClientVersionString) {
            $this->addVersionString($httpClientVersionString);
        }
    }
}