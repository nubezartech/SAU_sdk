<?php

require_once "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
if(isset($_POST['username']) && isset($_POST['otpcode'])){
    $username=$_POST['username'];
    $otpcode=$_POST['otpcode'];
    $auth=new SAU_sdk\Controllers\AuthController();
    SAU_sdk\Views\JSON::render($auth->getSessionTokenByOTP($username,$otpcode));
}