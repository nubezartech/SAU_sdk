<?php

namespace SAU_sdk\Controllers;

class ComunicationsController
{
    public function sendSMS($receiver, $msg)
    {
        //API URL
        $url = 'http://nubezartech.es/apps/connect/sendSMS.php';

        //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        $payload = json_encode(array("user" => $receiver,"msg" => $msg));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);
    }
}
