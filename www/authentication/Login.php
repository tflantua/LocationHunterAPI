<?php

class Login
{
    private $username;
    private $password;

    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function logIn()
    {
        $userInfo[0] = "hallo";

        Status::showOk($userInfo);
    }
}