<?php

namespace Eurostatgroup\Api\Resources;

class Product extends Resource
{
    public $resource;
    public $id;
    public $isbn;
    public $product_name;
    public $price;
    public $price_ex;
    public $price_incl;
    public $reference;
    public $description;
    public $images;
    public $_links; //Image links
        /**
     * Get the line value objects
     *
     * @return ImageCollection
     */
    public function images()
    {
        return ResourceFactory::createBaseResourceCollection(
            $this->client,
            Image::class,
            $this->images
        );
    }
}