<?php

class Locations
{
    private $conn;
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
        $database = new DatabaseLocationHunter();
        $this->conn = $database->connect();
    }

    public function getLocations()
    {
        if ($this->conn != null) {
            $userId = CheckKey::check($this->key, $this->conn);
            if ($userId != null) {
                $query = "SELECT  
`North` as 'north', `East` as 'east', `Name` as 'name', `RiddleName` as 'riddleName',
`Riddle` as 'riddle', `Points` as 'points', `Difficulty` as 'difficulty', GROUP_CONCAT(`Hint` SEPARATOR ';') as 'hint', group_concat(`HintsID` SEPARATOR ';') as hintId, group_concat(`Cost` SEPARATOR ';') as cost
                            FROM Location INNER JOIN Hints ON Location.ID = Hints.LocationID GROUP BY `North`, `East`, `Name`, `RiddleName`, `Riddle`, `Points`, `Difficulty`";
                $result = mysqli_query($this->conn, $query);
                if ($result) {
                    $info = mysqli_fetch_array($result);
                    var_dump($info);
                    for ($i = 0; $i < sizeof($info); $i++) {
                        unset($info[$i]);
                    }
                    $infoJson = json_encode($info);
                    $infoJson = json_decode($infoJson);
                    $locationData = new LocationListData();
                    $locationData->set($infoJson);
                }

            } else Status::notAccepted();
        } else Status::ServerError();

        $this->conn->close();
    }
}