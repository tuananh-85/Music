<?php
require_once __DIR__ . '/../../core/Model.php';

class Rating extends Model
{
    protected $table = 'ratings';

    public function add($songId, $userId, $score)
    {
        $stmt = $this->db->prepare("INSERT INTO ratings (song_id, user_id, score) VALUES (:sid, :uid, :score)");
        return $stmt->execute(['sid' => $songId, 'uid' => $userId, 'score' => $score]);
    }

    public function getBySong($songId)
    {
        $stmt = $this->db->prepare("SELECT * FROM ratings WHERE song_id = :sid ORDER BY created_at DESC");
        $stmt->execute(['sid' => $songId]);
        return $stmt->fetchAll();
    }

    public function getAverage($songId)
    {
        $stmt = $this->db->prepare("SELECT AVG(score) as avg_score, COUNT(*) as cnt FROM ratings WHERE song_id = :sid");
        $stmt->execute(['sid' => $songId]);
        return $stmt->fetch();
    }
}
