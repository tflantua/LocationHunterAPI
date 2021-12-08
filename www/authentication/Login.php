<?php

class Login
{
    private $username;
    private $password;
    private $status;

    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->status = new Status();
    }

    public function logIn()
    {
        $userInfo[0] = "hallo";

        $this->status->showOk($userInfo);
    }
}