<?php

namespace App\Models;

use PDO;
use PDOException;

class RegisterModel
{
    private PDO|null $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param array $data
     * @return int
     */
    public function create(array $data): int
    {
        try {
            $sql = "INSERT INTO users SET username = :username, `password` = :password";
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':username', $data['username'] ?? null, PDO::PARAM_STR);
            $stmt->bindValue(':password', $data['password'] ?? null, PDO::PARAM_STR);
            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                return -1;
            } else {
                return 0;
            }
        }
    }
}