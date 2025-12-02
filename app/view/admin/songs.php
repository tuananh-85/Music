<div class="admin-layout">
    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
    <section class="admin-main">
        <h2>Quản lý bài hát</h2>
        <p><a class="btn" href="?r=adminSong/create">Thêm bài hát mới</a></p>
        <table class="table">
            <thead><tr><th>ID</th><th>Title</th><th>Artist</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($songs as $s): ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo htmlspecialchars($s['title']); ?></td>
                    <td><?php echo htmlspecialchars($s['artist_name'] ?? ''); ?></td>
                    <td>
                        <a href="?r=adminSong/edit/<?php echo $s['id']; ?>">Edit</a> |
                        <a href="?r=adminSong/delete/<?php echo $s['id']; ?>" data-confirm="true">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
