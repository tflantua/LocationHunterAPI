<?php

class Signup
{
    private $userName;
    private $password;
    private $conn;

    /**
     * @param $userName
     * @param $password
     */
    public function __construct($userName, $password)
    {
        $this->userName = $userName;
        $this->password = $password;
        $database = new DatabaseLocationHunter();
        $this->conn = $database->connect();
    }


    public function signup()
    {
        $randomString = GenerateRandom::generateString($this->userName);
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        $query = "SELECT `ID` FROM `User` WHERE `Name` = '$this->userName'";
        $result = mysqli_query($this->conn, $query);

        if ($result->num_rows <= 0) {
            $query = "INSERT INTO `User` (
                    `Name`,
                    `Password`,
                    `Key`
                ) VALUES (
                    '$this->userName',
                    '$passwordHash',
                    '$randomString'
                )";

            $result = mysqli_query($this->conn, $query);

            if ($result) {
                $data["key"] = $randomString;
                $data["Name"] = $this->userName;
                $data["Score"] = 0;

                $query = "SELECT `ID` FROM User WHERE Name = '$this->userName'";
                $result = mysqli_query($this->conn, $query);
                if ($result){
                    $info = mysqli_fetch_array($result);

                    $data["ID"] = $info["ID"];


                    Status::showOk($data);
                } else {
                    Status::ServerError();
                }

            } else {
                Status::ServerError();
            }

        } else {
            Status::alreadyExists();
        }
        $this->conn->close();
    }
}