<?php

class Login
{
    private $username;
    private $password;
    private $conn;

    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $database = new DatabaseLocationHunter();
        $this->conn = $database->connect();
    }

    public function logIn()
    {
        if ($this->conn != null) {
            $query = "SELECT `ID`, `Score`, `Password`, `Key`, `Name` FROM `User` WHERE `Name` = '$this->username'";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                $userInfo = mysqli_fetch_assoc($result);

                if ($result->num_rows > 0) {
                    if (password_verify($this->password, $userInfo["Password"])) {
                        unset($userInfo['Password']);

                        Status::showOk($userInfo);
                    } else {
                        Status::notAcceptable();
                    }
                } else {
                    Status::notFound();
                }
            } else {
                Status::ServerError();
            }
            $this->conn->close();
        } else Status::ServerError();
    }
}