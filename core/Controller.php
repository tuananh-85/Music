<?php

class Controller
{
    protected function render($viewPath, $data = [])
    {
        extract($data);
        $layout = __DIR__ . '/../app/view/layouts/header.php';
        $footer = __DIR__ . '/../app/view/layouts/footer.php';
        if (file_exists($layout)) include $layout;
        $fullView = __DIR__ . '/../app/view/' . $viewPath . '.php';
        if (file_exists($fullView)) {
            include $fullView;
        } else {
            echo "View not found: {$fullView}";
        }
        if (file_exists($footer)) include $footer;
    }
}
