<?php
require_once __DIR__ . '/../../core/Model.php';

class Review extends Model
{
    protected $table = 'reviews';

    public function getBySong($songId)
    {
        $stmt = $this->db->prepare("SELECT r.*, u.name as user_name FROM reviews r LEFT JOIN users u ON r.user_id = u.id WHERE r.song_id = :sid ORDER BY r.created_at DESC");
        $stmt->execute(['sid' => $songId]);
        return $stmt->fetchAll();
    }

    public function create($songId, $userId, $content, $rating = 0)
    {
        $stmt = $this->db->prepare("INSERT INTO reviews (song_id, user_id, content, rating, created_at) VALUES (:sid, :uid, :content, :rating, :now)");
        $stmt->execute([
            'sid' => $songId,
            'uid' => $userId,
            'content' => $content,
            'rating' => $rating,
            'now' => date('Y-m-d H:i:s'),
        ]);
        return $this->db->lastInsertId();
    }
}
