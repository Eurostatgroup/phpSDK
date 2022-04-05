<?php

namespace Eurostatgroup\Api\HttpAdapter;

use Eurostatgroup\Api\Exceptions\UnrecognizedClientException;

class EurostatHttpAdapterPicker implements HttpAdapterPickerInterface
{
    public function pickHttpAdapter($httpClient)
    {
        if (!$httpClient) {
            if ($this->guzzleIsDetected()) {
                $guzzleVersion = $this->guzzleMajorVersionNumber();

                if ($guzzleVersion && in_array($guzzleVersion, [6, 7])) {
                    return Guzzle6And7HttpAdapter::createDefault();
                }
            }

            return new CurlHttpAdapter;
        }

        if ($httpClient instanceof HttpAdapterInterface) {
            return $httpClient;
        }

        if ($httpClient instanceof \GuzzleHttp\ClientInterface) {
            return new Guzzle6And7HttpAdapter($httpClient);
        }

        throw new UnrecognizedClientException('The provided http client or adapter was not recognized.');
    }

    private function guzzleIsDetected()
    {
        return interface_exists("\GuzzleHttp\ClientInterface");
    }

    /**
     * @return int|null
     */
    private function guzzleMajorVersionNumber()
    {
        // Guzzle 7
        if (defined('\GuzzleHttp\ClientInterface::MAJOR_VERSION')) {
            return (int)\GuzzleHttp\ClientInterface::MAJOR_VERSION;
        }

        // Before Guzzle 7
        if (defined('\GuzzleHttp\ClientInterface::VERSION')) {
            return (int)\GuzzleHttp\ClientInterface::VERSION[0];
        }
        return null;
    }
}