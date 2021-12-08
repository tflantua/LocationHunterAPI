<?php

class Database
{
    private $serverName = "localhost";
    private $dbName = "location_hunter";
    private $conn;

    public function connect($username, $password)
    {
        $this->conn = mysqli_connect($this->serverName, $username, $password, $this->dbName);
        return $this->conn;
    }

    public function close()
    {
        if ($this->conn != null) {
            $this->conn->close();
        }
    }
}