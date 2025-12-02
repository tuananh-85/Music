</main>
<footer class="site-footer">
    <div class="container">
        <p>© Music Project - demo</p>
    </div>
</footer>
<?php
// include main script if exists
$script = $_SERVER['SCRIPT_NAME'] ?? '';
$base = rtrim(str_replace('/index.php','', $script), '/');
$jsPath = $base . '/js/main.js';
?>
<script src="<?php echo htmlspecialchars($jsPath); ?>"></script>
</body>
</html>
