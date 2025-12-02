
<section class="song-detail">
    <div class="song-meta">
        <h2><?php echo htmlspecialchars($song['title']); ?></h2>
        <p class="muted">Nghệ sĩ: <a href="?r=artist/profile/<?php echo intval($song['artist_id'] ?? 0); ?>"><?php echo htmlspecialchars($song['artist_name'] ?? '—'); ?></a></p>
        <p><?php echo nl2br(htmlspecialchars($song['description'] ?? 'Không có mô tả')); ?></p>
        <p>
            <a class="btn" href="<?php echo htmlspecialchars($song['audio_url'] ?? '#'); ?>" target="_blank">Nghe</a>
            <a class="btn" href="?r=review/form/<?php echo intval($song['id']); ?>">Viết review</a>
        </p>
    </div>

    <aside class="song-links">
        <h3>Liên kết nghe nhạc</h3>
        <?php if (empty($links)): ?>
            <p>Không có liên kết streaming.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($links as $l): ?>
                    <li><a href="<?php echo htmlspecialchars($l['url']); ?>" target="_blank"><?php echo htmlspecialchars($l['platform']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </aside>

    <section class="song-reviews">
        <h3>Review</h3>
        <?php if (empty($reviews)): ?>
            <p>Chưa có review nào.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($reviews as $rv): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($rv['user_name'] ?? 'User'); ?></strong>
                        <span class="muted">(<?php echo htmlspecialchars($rv['created_at']); ?>)</span>
                        <div><?php echo nl2br(htmlspecialchars($rv['content'])); ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
</section>
