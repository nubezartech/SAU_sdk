<?php
namespace NubezarTech\SAU_sdk\Controllers;

require_once "Controllers/SessionsController.php";

class AuthController{
    public function __construct()
    {
        $this->SessionsController = new SessionsController();
    }
    public function logIn($email, $password){
        if(!empty($email) && !empty($password)){
            if($email!=$password){
                $user=(object) json_decode(json_encode(array("user_id"=>45236,
                                                             "user_username" => $email,
                                                             "user_2fa" => array("2fa_type"=>"phone"),
                                                                                 "2fa_method"=>"+34643042261"),false));
                return $this->SessionsController->makeSession($user);
            }
        }
        return array("error"=>"Invalid credentials");
    }
    public function AmILogged($email){
        
    }
    public function logOut($email, $password){
        
    }
}