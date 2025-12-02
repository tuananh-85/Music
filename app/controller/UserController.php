<?php
require_once __DIR__ . '/../../core/Controller.php';
// Lưu ý: Đảm bảo tên thư mục là Models (viết hoa chữ cái đầu) để đồng bộ
require_once __DIR__ . '/../Models/User.php';

class UserController extends Controller
{
    public function login()
    {
        // Xử lý login đơn giản
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $userModel = new User();
            $user = $userModel->authenticate($email, $password);
            
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                // Chuyển hướng về trang chủ hoặc trang admin tùy role
                header('Location: ?r=home');
                exit;
            } else {
                $error = 'Email hoặc mật khẩu không đúng!';
                $this->render('auth/login', ['error' => $error]);
                return;
            }
        }
        $this->render('auth/login');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ?r=home');
        exit;
    }
}