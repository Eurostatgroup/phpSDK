<?php

namespace Eurostatgroup\Api\Resources;

use Eurostatgroup\Api\EurostatgroupClient;


abstract class Collection extends \ArrayObject
{
    /**
     * Total number of retrieved items
     * @var int
     */
    public $count;
    public $_links;

    public function __construct($count, $_links)
    {
        $this->count = $count;
        $this->_links = $_links;
        parent::__construct();
    }

    abstract public function getCollectionResourceName();
}