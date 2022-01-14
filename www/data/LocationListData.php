<?php

class LocationListData
{
    private $locationList;

    public function set($data)
    {
        foreach ($data as $key => $value) $this->{$key} = $value;
    }
}