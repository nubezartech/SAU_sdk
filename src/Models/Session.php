<?php
namespace SAU_sdk\Models;

class Session extends Model
{
    private $table = "sessions";
    public function getById($id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "WHERE session_id = '" . $id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "session_id" => $row['session_id'],
                "session_user" => $row['session_user'],
                "session_token" => $row['session_token']
            );
        } else {
            return false;
        }
    }
    public function getActiveByUserId($user_id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "WHERE session_user = '" . $user_id . "' AND session_status=1";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "session_id" => $row['session_id'],
                "session_user" => $row['session_user'],
                "session_token" => $row['session_token']
            );
        } else {
            return false;
        }
    }
    public function newSession($user_id,$session_token)
    {
        $sql = "INSERT INTO $this->table (session_user, session_token) VALUES ('" . $user_id . "','" . $session_token . "')";
        if ($this->newsql($sql)) {

            return $this->last_id();
        } else {
            return false;
        }
    }
}
