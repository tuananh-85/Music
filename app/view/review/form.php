<div class="container" style="max-width: 600px;">
    <div class="card">
        <h2 style="margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
            Viết đánh giá mới
        </h2>
        
        <form method="post" action="?r=review/store" class="form">
            <!-- Hidden ID -->
            <input type="hidden" name="song_id" value="<?php echo intval($song_id ?? 0); ?>">
            
            <div style="margin-bottom: 15px;">
                <label>Đánh giá sao:</label>
                <select name="rating" style="width: 150px;">
                    <option value="5">★★★★★ (Tuyệt vời)</option>
                    <option value="4">★★★★ (Hay)</option>
                    <option value="3">★★★ (Bình thường)</option>
                    <option value="2">★★ (Tệ)</option>
                    <option value="1">★ (Rất tệ)</option>
                </select>
            </div>

            <label>Nội dung đánh giá:</label>
            <textarea name="content" required placeholder="Chia sẻ cảm nghĩ của bạn về bài hát này..." style="min-height: 150px;"></textarea>
            
            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button type="submit" class="btn">Gửi đánh giá</button>
                <a href="javascript:history.back()" class="btn" style="background: var(--bg-body); border: 1px solid var(--border);">Hủy</a>
            </div>
        </form>
    </div>
</div>
