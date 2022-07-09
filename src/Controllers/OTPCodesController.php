<?php
namespace SAU_sdk\Controllers;
use SAU_sdk\Models;

require_once "Models/OTPCode.php";
class OTPCodesController
{
    private $OTPCode;
    public function __construct()
    {
        $this->OTPCode = new Models\OTPCode();
    }

    /*
    * @param bool $longToken (opcional, by default is false)
    * @return string $OTPCode (longToken = 18 characters, shortToken = 6 characters)
    */
    public function generateOTPCode($longToken=true)
    {
        $lenght=$longToken? 18 : 6;
        $caracteres = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $aleatoria = substr(str_shuffle($caracteres), 0, $lenght);
        return $aleatoria;
    }
}
