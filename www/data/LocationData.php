<?php

class LocationData
{
    public $ID;
    public $north;
    public $east;
    public $name;
    public $riddleName;
    public $riddle;
    public $points;
    public $difficulty;
    private $hint;
    private $hintId;
    private $cost;
    public $hintsList;
    public $visited = false;

    public function set($data)
    {
        foreach ($data as $key => $value) $this->{$key} = $value;

        $this->setHints();
    }

    private function setHints()
    {
        $explodeHints = explode(";", $this->hint);
        $explodeHintIds = explode(";", $this->hintId);
        $explodeCosts = explode(";", $this->cost);

        for ($i = 0; $i < sizeof($explodeHints); $i++) {
            $hintData = new HintData();
            $hintData->setHint($explodeHints[$i]);
            $hintData->setCost($explodeCosts[$i]);
            $hintData->setID($explodeHintIds[$i]);

            $this->hintsList[$i] = $hintData;
        }
    }
}