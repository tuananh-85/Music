<div class="admin-layout">
    <!-- Include Sidebar -->
    <?php include __DIR__ . '/../../Views/layouts/sidebar.php'; // Điều chỉnh path nếu cần ?>
    
    <section class="admin-main">
        <h2 style="margin-bottom: 20px;">Tổng quan hệ thống</h2>
        
        <div class="cards">
            <div class="card" style="border-left: 4px solid var(--primary);">
                <h3>Users</h3>
                <p style="font-size: 2rem; font-weight: bold;"><?php echo intval($counts['users'] ?? 0); ?></p>
            </div>
            <div class="card" style="border-left: 4px solid #2ecc71;">
                <h3>Songs</h3>
                <p style="font-size: 2rem; font-weight: bold;"><?php echo intval($counts['songs'] ?? 0); ?></p>
            </div>
            <div class="card" style="border-left: 4px solid #e67e22;">
                <h3>Artists</h3>
                <p style="font-size: 2rem; font-weight: bold;"><?php echo intval($counts['artists'] ?? 0); ?></p>
            </div>
        </div>
        
        <div style="margin-top: 40px; padding: 20px; background: var(--bg-card); border-radius: 8px;">
            <h3>Hướng dẫn nhanh</h3>
            <p class="muted">Sử dụng menu bên trái để thêm bài hát mới hoặc chỉnh sửa thông tin nghệ sĩ.</p>
        </div>
    </section>
</div>