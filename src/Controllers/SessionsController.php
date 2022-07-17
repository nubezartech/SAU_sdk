<?php
namespace SAU_sdk\Controllers;
use SAU_sdk\Models;

class SessionsController
{
    private $SessionModel;
    private $OTPCodesController;
    private $session_token;
    public function __construct()
    {
        $this->SessionModel = new Models\Session();
        $this->OTPCodesController = new OTPCodesController();
    }

    /*
    * @param Model/User $user required.
    * @param int $expiration_time (optional, 90min. by default) Expiration time of the session in seconds.
    * @return Model/Session An object with data of the session.
    */
    public function makeSession($user)
    {
        $this->session_token = $this->OTPCodesController->generateOTPCode();
        $this->SessionModel->newSession($user->user_id, $this->session_token);
    }
    public function destroySession(){
        
    }

    public function getActiveByUser($user_id){
        if($session=$this->SessionModel->getActiveByUserId($user_id)){
            return $session;
        }else{
            return array("err"=>"no");
        }
    }

}
