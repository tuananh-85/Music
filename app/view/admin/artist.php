<div class="admin-layout">
    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
    <section class="admin-main">
        <h2>Quản lý nghệ sĩ</h2>
        <p><a class="btn" href="?r=adminArtist/create">Thêm nghệ sĩ mới</a></p>
        <table class="table">
            <thead><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($artists as $a): ?>
                <tr>
                    <td><?php echo $a['id']; ?></td>
                    <td><?php echo htmlspecialchars($a['name']); ?></td>
                    <td>
                        <a href="?r=adminArtist/edit/<?php echo $a['id']; ?>">Edit</a> |
                        <a href="?r=adminArtist/delete/<?php echo $a['id']; ?>" data-confirm="true">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
