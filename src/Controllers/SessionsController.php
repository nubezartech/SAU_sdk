<?php
namespace SAU_sdk\Controllers;
use SAU_sdk\Models;

class SessionsController
{
    private $Session;
    private $OTPCodesController;
    private $session_token;
    public function __construct()
    {
        $this->Session = new Models\Session();
        $this->OTPCodesController = new OTPCodesController();
    }

    /*
    * @param Model/User $user required.
    * @param int $expiration_time (optional, 90min. by default) Expiration time of the session in seconds.
    * @return Model/Session An object with data of the session.
    */
    public function makeSession($user,$expiration_time=5400)
    {
        
    }
    public function destoySession(){
        
    }
}
