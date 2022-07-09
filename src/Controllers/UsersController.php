<?php
namespace NubezarTech\SAU_sdk\Controllers;
use NubezarTech\SAU_sdk\Models;

require_once "Models/User.php";

class UsersController{
    private $User;
    public function __construct(){
        $this->User = new Models\User();
    }
    public function getUsers($limit=20, $page=1, $order="DESC"){

    }
    public function getUser($dataType="all", $page=1, $order="DESC"){

    }
}



