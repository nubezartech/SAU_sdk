<?php
require_once "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
//echo $_ENV["DB_SAU_HOST"];
$auth=new SAU_sdk\Controllers\AuthController();
SAU_sdk\Views\JSON::render($auth->authenticate("adanabad","patata"));