<?php
class Model
{

    public function message($message, $status)
    {
        $rsp = array(
            "message" => $message,
            "status" => $status
        );
        return json_encode($rsp);
    }
}
