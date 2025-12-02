<section class="user-profile">
    <!-- Header Profile -->
    <div class="card" style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
        <!-- Avatar giả lập -->
        <div style="width: 80px; height: 80px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold;">
            <?php echo strtoupper(substr($user['name'] ?? 'U', 0, 1)); ?>
        </div>
        
        <div style="flex: 1;">
            <h2 style="margin: 0;"><?php echo htmlspecialchars($user['name'] ?? 'Người dùng'); ?></h2>
            <p class="muted" style="margin-top: 5px;">📧 <?php echo htmlspecialchars($user['email'] ?? 'Chưa cập nhật email'); ?></p>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <a href="?r=user/edit" class="btn" style="background: var(--bg-body); border: 1px solid var(--border);">⚙️ Sửa</a>
            <a href="?r=auth/logout" class="btn" style="background: var(--danger);">Đăng xuất</a>
        </div>
    </div>

    <!-- Danh sách Review -->
    <section>
        <h3 style="margin-bottom: 20px; border-left: 4px solid var(--primary); padding-left: 10px;">
            Lịch sử đánh giá
        </h3>
        
        <?php if (empty($reviews)): ?>
            <p class="muted">Bạn chưa viết đánh giá nào.</p>
        <?php else: ?>
            <div class="cards">
                <?php foreach ($reviews as $r): ?>
                    <article class="card song-card">
                        <div style="margin-bottom: 10px;">
                            <span class="muted" style="font-size: 0.8rem;">
                                <?php echo htmlspecialchars($r['created_at'] ?? ''); ?>
                            </span>
                            <h4 style="margin: 5px 0;">
                                <a href="?r=music/detail/<?php echo intval($r['song_id']); ?>" style="color: var(--primary);">
                                    🎵 <?php echo htmlspecialchars($r['song_title'] ?? 'Bài hát không tên'); ?>
                                </a>
                            </h4>
                        </div>
                        
                        <p style="font-style: italic; color: #ddd; margin-bottom: 15px;">
                            "<?php echo nl2br(htmlspecialchars(substr($r['content'], 0, 100))); ?>..."
                        </p>
                        
                        <a href="?r=music/detail/<?php echo intval($r['song_id']); ?>" style="font-size: 0.9rem; text-decoration: underline;">
                            Xem bài hát &rarr;
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</section>
