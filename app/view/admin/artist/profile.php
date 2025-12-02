<section class="artist-profile">
    <div class="artist-hero">
        <h2><?php echo htmlspecialchars($artist['name']); ?></h2>
        <p class="muted"><?php echo nl2br(htmlspecialchars($artist['bio'] ?? 'Chưa có thông tin')); ?></p>
    </div>

    <section class="artist-songs">
        <h3>Bài hát của nghệ sĩ</h3>
        <?php if (empty($songs)): ?>
            <p>Chưa có bài hát.</p>
        <?php else: ?>
            <div class="cards">
                <?php foreach ($songs as $song): ?>
                    <article class="song-card">
                        <h4><a href="?r=music/detail/<?php echo $song['id']; ?>"><?php echo htmlspecialchars($song['title']); ?></a></h4>
                        <p class="muted"><?php echo htmlspecialchars($song['created_at'] ?? ''); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</section>
