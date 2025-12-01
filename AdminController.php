<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Song.php';
require_once __DIR__ . '/../model/Artist.php';

class AdminController extends Controller
{
    public function dashboard()
    {
        $u = new User();
        $s = new Song();
        $a = new Artist();
        $counts = [
            'users' => $u->countAll(),
            'songs' => $s->countAll(),
            'artists' => $a->countAll(),
        ];
        $this->render('admin/dashboard', ['counts' => $counts]);
    }
}
