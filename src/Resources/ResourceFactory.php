<?php

namespace Eurostatgroup\Api\Resources;

use Eurostatgroup\Api\EurostatgroupClient;

class ResourceFactory
{
    /**
     * Create resource object from Api result
     *
     * @param  object  $apiResult
     * @param  Resource  $resource
     *
     * @return Resource
     */
    public static function createFromApiResult($apiResult, Resource $resource)
    {
        foreach ($apiResult as $property => $value) {
            $resource->{$property} = $value;
        }

        return $resource;
    }

    /**
     * @param  EurostatgroupClient  $client
     * @param  string  $resourceClass
     * @param  array  $data
     * @param  null  $_links
     * @param  null  $resourceCollectionClass
     * @return mixed
     */
    public static function createBaseResourceCollection(
        EurostatgroupClient $client,
        $resourceClass,
        $data,
        $_links = null,
        $resourceCollectionClass = null
    ) {
        $resourceCollectionClass = $resourceCollectionClass ?: $resourceClass.'Collection';
        $data = $data ?: [];

        $result = new $resourceCollectionClass(count($data), $_links);
        foreach ($data as $item) {
            $result[] = static::createFromApiResult($item, new $resourceClass($client));
        }

        return $result;
    }

    /**
     * @param  EurostatgroupClient  $client
     * @param  array  $input
     * @param  string  $resourceClass
     * @param  null  $_links
     * @param  null  $resourceCollectionClass
     * @return mixed
     */
    public static function createCursorResourceCollection(
        $client,
        array $input,
        $resourceClass,
        $_links = null,
        $resourceCollectionClass = null
    ) {
        if (null === $resourceCollectionClass) {
            $resourceCollectionClass = $resourceClass.'Collection';
        }

        $data = new $resourceCollectionClass($client, count($input), $_links);
        foreach ($input as $item) {
            $data[] = static::createFromApiResult($item, new $resourceClass($client));
        }

        return $data;
    }
}