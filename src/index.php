<?php
namespace SAU_sdk;
require_once "Controllers/AuthController.php";

$auth=new AuthController();
echo $auth->logIn("sdsadas","dfdfads");