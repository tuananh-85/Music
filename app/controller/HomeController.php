<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/Song.php';

class HomeController extends Controller
{
    public function index()
    {
        $songModel = new Song();
        $songs = $songModel->getLatest(10);
        $this->render('home/index', ['songs' => $songs]);
    }
}
