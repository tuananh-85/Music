<div class="admin-layout">
    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
    <section class="admin-main">
        <h2><?php echo !empty($artist) ? 'Sửa nghệ sĩ' : 'Thêm nghệ sĩ'; ?></h2>
        <form method="post" action="<?php echo !empty($artist) ? '?r=adminArtist/edit/'.$artist['id'] : '?r=adminArtist/create'; ?>" class="form">
            <label>Tên nghệ sĩ: <input type="text" name="name" value="<?php echo htmlspecialchars($artist['name'] ?? ''); ?>" required></label>
            <label>Bio:<textarea name="bio"><?php echo htmlspecialchars($artist['bio'] ?? ''); ?></textarea></label>
            <button type="submit" class="btn">Lưu</button>
        </form>
    </section>
</div>
