<?php

class Locations
{
    private $conn;
    private $key;
    private $userId;

    public function __construct($key)
    {
        $this->key = $key;
        $database = new DatabaseLocationHunter();
        $this->conn = $database->connect();
    }

    public function getLocations()
    {
        if ($this->conn != null) {
            $this->userId = CheckKey::check($this->key, $this->conn);
            if ($this->userId != null) {
                $query = "SELECT all `ID`,
`North` as 'north', `East` as 'east', `Name` as 'name', `RiddleName` as 'riddleName',
`Riddle` as 'riddle', `Points` as 'points', `Difficulty` as 'difficulty', GROUP_CONCAT(`Hint` SEPARATOR ';') as 'hint', group_concat(`HintsID` SEPARATOR ';') as hintId, group_concat(`Cost` SEPARATOR ';') as cost
                            FROM Location INNER JOIN Hints ON Location.ID = Hints.LocationID GROUP BY `North`, `East`, `Name`, `RiddleName`, `Riddle`, `Points`, `Difficulty`";
                $result = mysqli_query($this->conn, $query);
                if ($result) {
                    $locationList = [];
                    while ($location = $result->fetch_assoc()) {
                        $locationJson = json_encode($location);
                        $locationJson = json_decode($locationJson);
                        $locationData = new LocationData();
                        $locationData->set($locationJson);
                        $locationList[] = $locationData;
                    }

                    for ($i = 0; $i < sizeof($locationList); $i++) {
                        $location = $locationList[$i];
                        if ($location instanceof LocationData) {
                            $this->getHintsUnlocked($location->hintsList);
                            $this->getLocationViseted($location);
                        }
                    }

                    Status::showOk($locationList);
                } else Status::ServerError();

            } else Status::notAccepted();
        } else Status::ServerError();

        $this->conn->close();
    }

    private function getHintsUnlocked($hints)
    {
        if ($hints) {
            $query = "SELECT `HintID`, `Unlocked` FROM User_Hints WHERE UserID = $this->userId AND (";
            for ($i = 0; $i < sizeof($hints); $i++) {
                $hint = $hints[$i];
                if ($hint instanceof HintData) {
                    if ($i == 0) {
                        $query .= "HintID = $hint->ID";
                    } else $query .= " OR HintID = $hint->ID";
                }
            }
            $query .= ")";

            $result = mysqli_query($this->conn, $query);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($user_hint = $result->fetch_assoc()) {
                        for ($i = 0; $i < sizeof($hints); $i++) {
                            $hint = $hints[$i];
                            if ($hint instanceof HintData) {
                                if ($hint->ID == $user_hint["HintID"]) {
                                    $hint->unlocked = $user_hint["Unlocked"] > 0;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    private function getLocationViseted(LocationData $location)
    {
        $query = "SELECT `UserWasHere` FROM Location_User WHERE UserID = $this->userId AND LocationID = $location->ID";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            if ($result->num_rows > 0) {
                $result = $result->fetch_assoc();
                $location->visited = $result["UserWasHere"];
            }
        }
    }
}