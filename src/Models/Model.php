<?php

namespace SAU_sdk\Models;
use mysqli;
use PDOException;
use Dotenv;

class Model
{
    private $db_host;
    private $db_user;
    private $db_password;
    private $db;
    private $conex;

    public function __construct()
    {
        $this->db_host = $_ENV["DB_SAU_HOST"];
        $this->db_host = $_ENV["DB_SAU_PORT"];
        $this->db_user = $_ENV["DB_SAU_USER"];
        $this->db_password = $_ENV["DB_SAU_PASS"];
        $this->db = $_ENV["DB_SAU_NAME"];

        $this->conex = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db)
            or die(mysqli_error($this->conex));
        $this->conex->set_charset("utf8");
    }

    public function newsql($query)
    {
        try {
            $result = $this->conex->query($query) or die($this->conex->error);
            return $result;
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
    public function last_id()
    {
        try {
            $result = $this->conex->insert_id or die($this->conex->error);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        //$this->close();
        return $result;
    }
    public function close($result)
    {
        mysqli_close($this->conex);
    }
}
