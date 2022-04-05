<?php

namespace Eurostatgroup\Api\Resources;

use Eurostatgroup\Api\EurostatgroupClient;

/**
 * Class Resource
 * @package Eurostatgroup\Api\Resources
 * @author Eurostatgroup Developers
 * @version 1.0.0
 * @property string $resource
 * @property int $id
 * $property string $mode
 *
 */
abstract class Resource
{
    protected $client;
    public function __construct(EurostatgroupClient $client)
    {
        $this->client = $client;
    }
}