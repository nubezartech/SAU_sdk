<?php
namespace SAU_sdk\Models;

class OTPCode extends Model{
    private $table = "otp_codes";
    public function getStatusByCode($user_id, $code)
    {
        $sql = "SELECT otp_status FROM  $this->table " .
            "WHERE otp_user'" . $user_id . "' AND otp_code = '" . $code . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return array(
                "otp_code" => $row['otp_code'],
                "otp_status" => $row['otp_status']
            );
        } else {
            return false;
        }
    }
}