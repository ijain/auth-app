<?php

namespace App\Models;

use PDO;
use PDOException;

class LoginModel
{
    private PDO | null $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getEntry(array $data) : array
    {
        try {
            $sql = "SELECT username, password FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':username', $data['username'] ?? null, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return !$result ? [] : $result;
        } catch (PDOException $e) {
            return [];
        }
    }
}