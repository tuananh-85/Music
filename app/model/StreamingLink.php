<?php
require_once __DIR__ . '/../../core/Model.php';

class StreamingLink extends Model
{
    protected $table = 'streaming_links';

    public function getBySongId($songId)
    {
        $stmt = $this->db->prepare("SELECT * FROM streaming_links WHERE song_id = :sid ORDER BY id");
        $stmt->execute(['sid' => $songId]);
        return $stmt->fetchAll();
    }
}
