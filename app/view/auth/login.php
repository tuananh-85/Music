<div class="container" style="display: flex; justify-content: center; align-items: center; min-height: 60vh;">
    <div class="card" style="width: 100%; max-width: 400px; padding: 40px;">
        <h2 style="text-align: center; color: var(--primary); margin-bottom: 20px;">Đăng nhập</h2>
        
        <?php if (!empty($error)): ?>
            <div style="background: rgba(231, 76, 60, 0.2); border: 1px solid var(--danger); color: #ff6b6b; padding: 10px; border-radius: 4px; margin-bottom: 20px; font-size: 0.9rem; text-align: center;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="?r=user/login" class="form">
            <div style="margin-bottom: 20px;">
                <label style="color: var(--text-muted);">Email</label>
                <input type="email" name="email" required placeholder="name@example.com" style="background: #2c2c35; border-color: #444;">
            </div>
            
            <div style="margin-bottom: 30px;">
                <label style="color: var(--text-muted);">Mật khẩu</label>
                <input type="password" name="password" required placeholder="••••••••" style="background: #2c2c35; border-color: #444;">
            </div>

            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 1rem;">Đăng nhập</button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; font-size: 0.9rem;" class="muted">
            Admin Demo: admin@example.com / 123456
        </p>
    </div>
</div>
