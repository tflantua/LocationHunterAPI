<?php


class Status
{

    private function showError($statusCode)
    {
        $userInfo = [];

        $userInfo[] = StatusMessage::code($statusCode);

        echo json_encode($userInfo);
    }

    //Show oke
    public function showOk($data)
    {
        $userInfo = [];

        $userInfo[] = StatusMessage::code(200);
        if (!empty($data)) {
            $userInfo[] = $data;
        }

        echo json_encode($userInfo);
    }

    //Show server error
    public function ServerError()
    {
        $this->showError(503);
    }

    //If it's not acceptable
    public function notAcceptable()
    {
        $this->showError(406);
    }

    //Already exists
    public function alreadyExists()
    {
        $this->showError(104);
    }

    //Not found the object
    public function notFound()
    {
        $this->showError(404);
    }

    //The object is empty
    public function isEmpty()
    {
        $this->showError(206);
    }

    //Token is not valid
    public function tokenInvalid(){
        $this->showError(498);
    }

    //Request not accepted
    public function notAccepted(){
        $this->showError(406);
    }

}