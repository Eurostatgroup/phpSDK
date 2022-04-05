<?php

namespace Eurostatgroup\Api\Resources;

class ImageCollection extends Collection
{
    public function getCollectionResourceName()
    {
        return null;
        // TODO: Implement getCollectionResourceName() method.
    }
    public function get($id){
        foreach ($this as $image){
            if($image->id == $id){
                return $image;
            }
        }
        return null;
    }
}