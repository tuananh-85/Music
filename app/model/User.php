<?php
require_once __DIR__ . '/../../core/Model.php';

class User extends Model
{
    protected $table = 'users';

    public function authenticate($email, $password)
    {
        $stmt = $this->db->prepare("SELECT id, name, email FROM users WHERE email = :email AND password = :pwd LIMIT 1");
        $stmt->execute(['email' => $email, 'pwd' => $password]);
        return $stmt->fetch();
    }

    public function countAll()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as c FROM users");
        $row = $stmt->fetch();
        return $row['c'] ?? 0;
    }
}
