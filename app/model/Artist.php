<?php
require_once __DIR__ . '/../../core/Model.php';

class Artist extends Model
{
    protected $table = 'artists';

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM artists WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function countAll()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as c FROM artists");
        $row = $stmt->fetch();
        return $row['c'] ?? 0;
    }
}
