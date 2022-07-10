<?php
namespace SAU_sdk;
//use \Controllers;
require_once "Controllers/SessionsController.php";
require_once "Controllers/OTPCodesController.php";
require_once "Controllers/ComunicationsController.php";

class AuthController
{
    private $OTPCodesController;
    public function __construct()
    {
        $this->SessionsController = new Controllers\SessionsController();
        $this->OTPCodesController = new Controllers\OTPCodesController();
        $this->ComunicationsController = new Controllers\ComunicationsController();
    }
    public function logIn($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            if ($email != $password) {
                $user = (object) json_decode(json_encode(array(
                    "user_id" => 45236,
                    "user_username" => $email,
                    "user_2fa" => array("2fa_type" => "phone"),
                    "2fa_method" => "+34643042261"
                ), false));

                $otp=$this->OTPCodesController->generateOTPCode(false);
                $this->ComunicationsController->sendSMS($user->user_2fa, $otp);
                return (object) json_decode(json_encode(array("otp_token"=>$otp,
                                                              "otp_user_id" => $user->user_id,
                                                              "otp_expiration_time" => 2000,
                                                              "url_get_session_token"=>"http://sau.nubezartech.es/auth/get_session_token")),false);
            }
        }
        return array("error" => "Invalid credentials");
    }

    public function GetSessionTokenWithOTP($email, $otp)
    {
        //1o pide otp,
        // el user intercambia el otp por el token  
        $user = (object) json_decode(json_encode(array(
            "user_id" => 45236,
            "user_username" => $email,
            "user_2fa" => array("2fa_type" => "phone"),
            "2fa_method" => "+34643042261"
        ), false));
                                                                 
        return $this->SessionsController->makeSession($user);
    }
    public function AmILogged($email)
    {
    }
    public function logOut($email, $password)
    {
    }
}

