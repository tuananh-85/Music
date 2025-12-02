<?php
// FIX: Đường dẫn tới file cấu hình Database
// Giả sử config nằm ở: root/config/database.php
require_once __DIR__ . '/../config/database.php';

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        // Kiểm tra xem class Database đã được load chưa
        if (!class_exists('Database')) {
            die("Lỗi: Không tìm thấy class Database. Kiểm tra file core/Model.php dòng require config/database.php");
        }
        
        $db = new Database();
        $this->db = $db->getConnection();
    }
    
    // Hàm find chung cho mọi model
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm lấy tất cả
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}