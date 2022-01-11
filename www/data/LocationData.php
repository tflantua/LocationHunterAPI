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

    /**
     * @return mixed
     */
    public function getNorth()
    {
        return $this->north;
    }

    /**
     * @param mixed $north
     */
    public function setNorth($north)
    {
        $this->north = $north;
    }

    /**
     * @return mixed
     */
    public function getEast()
    {
        return $this->east;
    }

    /**
     * @param mixed $east
     */
    public function setEast($east)
    {
        $this->east = $east;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRiddleName()
    {
        return $this->riddleName;
    }

    /**
     * @param mixed $riddleName
     */
    public function setRiddleName($riddleName)
    {
        $this->riddleName = $riddleName;
    }

    /**
     * @return mixed
     */
    public function getRiddle()
    {
        return $this->riddle;
    }

    /**
     * @param mixed $riddle
     */
    public function setRiddle($riddle)
    {
        $this->riddle = $riddle;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getHint()
    {
        return $this->hint;
    }

    /**
     * @param mixed $hint
     */
    public function setHint($hint)
    {
        $this->hint = $hint;
    }

    /**
     * @return mixed
     */
    public function getHintId()
    {
        return $this->hintId;
    }

    /**
     * @param mixed $hintId
     */
    public function setHintId($hintId)
    {
        $this->hintId = $hintId;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }


}