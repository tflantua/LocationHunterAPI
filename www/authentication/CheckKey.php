<?php

class CheckKey
{
    public static function check($key, $conn)
    {
        $query = "SELECT `ID` FROM User WHERE `Key` = '$key'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result->num_rows > 0) {
                $info = mysqli_fetch_array($result);

                return $info[0];
            }
        }

        return null;
    }

}