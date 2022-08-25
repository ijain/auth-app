<?php

namespace App\Core;

use Exception;
use PDO;
use PDOException;

class Db
{
    private static ?Db $instance = null;
    private PDO $conn;

    public function getConnection() : PDO
    {
        return $this->conn;
    }

    public static function getInstance() : self
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    private function __construct()
    {
        try {
            $this->conn = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASSWORD'));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException|Exception $e) {
            if (isset($this->conn)) {
                unset($this->conn);
            }
        }
    }

    private function __clone()
    {
    }
}
