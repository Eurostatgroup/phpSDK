<?php

namespace Eurostatgroup\Api\Resources;

class ProductCollection extends Collection
{

    public function getCollectionResourceName()
    {
        return 'products';
    }

    protected function createResourceObject()
    {
        return new Product($this->client);
    }
}