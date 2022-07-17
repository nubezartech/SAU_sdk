<?php
namespace SAU_sdk\Controllers;
use SAU_sdk\Models;

class AuthController
{
    private $OTPCodesController;
    private $SessionsController;
    private $ComunicationsController;
    private $UserModel;
    public function __construct()
    {
        $this->SessionsController = new SessionsController();
        $this->OTPCodesController = new OTPCodesController();
        $this->ComunicationsController = new ComunicationsController();
        $this->UserModel = new Models\User();
    }
    private function verifyCredentials($username, $password)
    {
        if($user=$this->UserModel->getBasicDataByUsername($username)){
            if(PasswordsController::verify($password, $user["user_hash"])){
                return $user;
            }else{
                return false;
            }
        }
    }
    public function authenticate($username, $password)
    {
        if($user=$this->verifyCredentials($username, $password)){
            $session = $this->SessionsController->makeSession($user);
            return array("authentication_status"=>"success", "OTPCode_description"=>"A OTP Code has been sended to your phone number.",
            "2FA_type"=>"phone", "Verification_code_url"=>$_ENV["APP_URL"]."/verify_OTP.php");
        }else{
            return false;
        }
    }

    public function getSessionTokenByOTP($username, $otp)
    {
        if($user=$this->UserModel->getBasicDataByUsername($username)){
            if($this->OTPCodesController->verifyOTPCode($user["user_id"], $otp)){
                return $this->SessionsController->getActiveByUser($user["user_id"]);
            }else{
                return array("no"=>"no");
            }
        }
    }






















    public function AmILogged($email)
    {
    }
    public function logOut($email, $password)
    {
    }















    /*
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

                $otp = $this->OTPCodesController->generateOTPCode(false);
                //$this->ComunicationsController->sendSMS($user->user_2fa, $otp);
                return json_encode(array(
                    "otp_token" => $otp,
                    "otp_user_id" => $user->user_id,
                    "otp_expiration_time" => 2000,
                    "url_get_session_token" => "http://sau.nubezartech.es/auth/get_session_token"
                ));
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
        

        return $this->SessionsController->makeSession($email, $otp);
    }
    */
    
}
