<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music Project Admin</title>
    
    <?php
    // Tự động nhận diện đường dẫn gốc (Base URL)
    // Giả sử cấu trúc: /public/index.php
    $base = dirname($_SERVER['SCRIPT_NAME']); 
    // Nếu chạy trực tiếp file view (không khuyến khích), cố gắng sửa lại path
    if (strpos($base, '/app/Views') !== false) {
        $base = str_replace('/app/Views/layouts', '/public', $base); 
    }
    // Xóa dấu / ở cuối nếu có để tránh lỗi //css
    $base = rtrim($base, '/\\');
    ?>

    <!-- Link đến file CSS vừa tạo -->
    <link rel="stylesheet" href="<?php echo $base; ?>/css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <h1 class="site-title">
            <a href="?r=home">Music<span style="color:white">App</span></a>
        </h1>
        <nav class="site-nav">
            <a href="?r=home">Trang chủ</a>
            <a href="?r=admin/dashboard" class="admin-link">Admin Dashboard</a>
            <a href="?r=auth/logout">Đăng xuất</a>
        </nav>
    </div>
</header>
<main class="container">