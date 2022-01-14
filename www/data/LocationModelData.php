<?php

class LocationModelData
{
    public $north;
    public $east;
    public $name;

    /**
     * @param $north
     * @param $east
     * @param $name
     */
    public function __construct($north, $east, $name)
    {
        $this->north = $north;
        $this->east = $east;
        $this->name = $name;
    }


}