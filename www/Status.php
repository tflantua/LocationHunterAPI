<?php


class Status
{

    private static function showError($statusCode)
    {
        $userInfo = [];

        $userInfo[] = StatusMessage::code($statusCode);

        echo json_encode($userInfo);
    }

    //Show oke
    public static function showOk($data)
    {
        $userInfo = [];

        $userInfo["Status"] = StatusMessage::code(200);
        if (!empty($data)) {
            $userInfo["data"] = $data;
        }

        echo json_encode($userInfo);
    }

    //Show server error
    public static function ServerError()
    {
        self::showError(503);
    }

    //If it's not acceptable
    public static function notAcceptable()
    {
        self::showError(406);
    }

    //Already exists
    public static function alreadyExists()
    {
        self::showError(104);
    }

    //Not found the object
    public static function notFound()
    {
        self::showError(404);
    }

    //The object is empty
    public static function isEmpty()
    {
        self::showError(206);
    }

    //Token is not valid
    public static function tokenInvalid()
    {
        self::showError(498);
    }

    //Request not accepted
    public static function notAccepted()
    {
        self::showError(406);
    }

}