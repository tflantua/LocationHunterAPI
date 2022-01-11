<?php

class LocationData
{
    public $north;
    public $east;
    public $name;
    public $riddleName;
    public $riddle;
    public $points;
    public $difficulty;
    public $hint;
    public $hintId;
    public $cost;

    public function set($data){
        var_dump($data);
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }


}