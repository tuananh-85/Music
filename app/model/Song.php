<?php
require_once __DIR__ . '/../../core/Model.php';

class Song extends Model
{
    protected $table = 'songs';

    public function getLatest($limit = 10)
    {
        $stmt = $this->db->prepare("SELECT s.*, a.name as artist_name FROM songs s LEFT JOIN artists a ON s.artist_id = a.id ORDER BY s.created_at DESC LIMIT :l");
        $stmt->bindValue(':l', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT s.*, a.name as artist_name FROM songs s LEFT JOIN artists a ON s.artist_id = a.id WHERE s.id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getByArtist($artistId)
    {
        $stmt = $this->db->prepare("SELECT * FROM songs WHERE artist_id = :aid ORDER BY created_at DESC");
        $stmt->execute(['aid' => $artistId]);
        return $stmt->fetchAll();
    }

    public function countAll()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as c FROM songs");
        $row = $stmt->fetch();
        return $row['c'] ?? 0;
    }
}
