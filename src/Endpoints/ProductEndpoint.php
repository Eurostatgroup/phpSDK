<?php

namespace Eurostatgroup\Api\Endpoints;

use Eurostatgroup\Api\Exceptions\ApiException;
use Eurostatgroup\Api\Resources\Collection;
use Eurostatgroup\Api\Resources\Product;
use Eurostatgroup\Api\Resources\ProductCollection;
use Eurostatgroup\Api\Resources\Resource;

class ProductEndpoint extends CollectionEndpointAbstract
{
    protected $resourcePath = "products";

    protected function getResourceObject()
    {
        return new Product($this->client);
    }

    protected function getResourceCollectionObject($count, $_links)
    {
        return new ProductCollection($this->client, $count, $_links);
    }

    /**
     * Retrieve a single product from Eurostatgroup.
     *
     * Will throw a ApiException if the order id is invalid or the resource cannot
     * be found.
     *
     * @param  array  $parameters
     * @return Resource
     * @throws ApiException
     */
    public function get($productId, array $parameters = [])
    {
        if (empty($productId) !== 0) {
            throw new ApiException("Invalid order ID: '{$productId}''.");
        }

        return parent::rest_read($productId, $parameters);
    }

    /**
     * Retrieves a collection of Orders from Mollie.
     *
     * @param  string  $from  The first order ID you want to include in your list.
     * @param  int  $limit
     * @param  array  $parameters
     *
     * @return Collection
     * @throws ApiException
     */
    public function page($from = null, $limit = null, array $parameters = [])
    {
        return $this->rest_list($from, $limit, $parameters);
    }
}