<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/Song.php';

class SongController extends Controller {
    public function detail($id) {
        $songModel = new Song();
        $song = $songModel->find(intval($id));

        if (!$song) {
            echo "Bài hát không tồn tại";
            return;
        }

        // Render using the standard view
        $this->render('music/detail', ['song' => $song, 'links' => [], 'reviews' => []]);
    }
}
?>