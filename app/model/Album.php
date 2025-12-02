<?php
require_once __DIR__ . '/../../core/Model.php'; 

class Album extends Model
{
    protected $table = 'albums';

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM albums WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getAll($limit = 50)
    {
        $stmt = $this->db->prepare("SELECT * FROM albums ORDER BY created_at DESC LIMIT :l");
        $stmt->bindValue(':l', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countAll()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as c FROM albums");
        $row = $stmt->fetch();
        return $row['c'] ?? 0;
    }
}
