<?php

class DatabaseLocationHunter
{
    private $serverName = "localhost";
    private $dbName = "location_hunter";

    public function connect()
    {
        return mysqli_connect($this->serverName, "LocationHunters-u", "locationhunters", $this->dbName);
    }
}