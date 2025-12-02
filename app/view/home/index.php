<section class="home-page">
    <header class="page-header">
        <h2>Khám phá âm nhạc</h2>
        <p class="muted">Các bài hát mới nhất và đề xuất cho bạn</p>
    </header>

    <?php if (empty($songs)): ?>
        <p>Chưa có bài hát nào trong hệ thống.</p>
    <?php else: ?>
        <div class="cards">
            <?php foreach ($songs as $s): ?>
                <article class="song-card">
                    <h3><?php echo htmlspecialchars($s['title']); ?></h3>
                    <p class="muted"><?php echo htmlspecialchars($s['artist_name'] ?? '—'); ?></p>
                    <p class="desc"><?php echo htmlspecialchars(substr($s['description'] ?? '', 0, 140)); ?></p>
                    <p>
                        <a class="btn" href="?r=music/detail/<?php echo $s['id']; ?>">Chi tiết</a>
                        <a class="" href="?r=artist/profile/<?php echo intval($s['artist_id'] ?? 0); ?>">Xem nghệ sĩ</a>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
