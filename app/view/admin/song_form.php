<div class="admin-layout">
    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
    <section class="admin-main">
        <h2><?php echo !empty($song) ? 'Sửa bài hát' : 'Thêm bài hát'; ?></h2>
        <form method="post" action="<?php echo !empty($song) ? '?r=adminSong/edit/'.$song['id'] : '?r=adminSong/create'; ?>" class="form">
            <label>Title: <input type="text" name="title" value="<?php echo htmlspecialchars($song['title'] ?? ''); ?>" required></label>
            <label>Artist:
                <select name="artist_id">
                    <option value="">--Chọn nghệ sĩ--</option>
                    <?php foreach ($artists as $a): ?>
                        <option value="<?php echo $a['id']; ?>" <?php if (!empty($song) && $song['artist_id'] == $a['id']) echo 'selected'; ?>><?php echo htmlspecialchars($a['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Description:<textarea name="description"><?php echo htmlspecialchars($song['description'] ?? ''); ?></textarea></label>
            <button type="submit" class="btn">Lưu</button>
        </form>
    </section>
</div>
