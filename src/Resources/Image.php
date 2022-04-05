<?php

namespace Eurostatgroup\Api\Resources;

class Image extends Resource
{
    /**
     * Always 'image'
     * @var string
     */
    public $resource;
    public $id;
    public $file;
    public $file_name;
    public $file_size;
    public $name;
    public $description;
}