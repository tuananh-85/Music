<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/Song.php';
require_once __DIR__ . '/../model/StreamingLink.php';
require_once __DIR__ . '/../model/Review.php';

class MusicController extends Controller
{
    public function detail($id = null)
    {
        $id = intval($id);
        $songModel = new Song();
        $song = $songModel->find($id);
        if (!$song) {
            echo 'Song not found';
            return;
        }
        $linkModel = new StreamingLink();
        $links = $linkModel->getBySongId($id);

        // load reviews for the song (so view can show them)
        $reviewModel = new Review();
        $reviews = $reviewModel->getBySong($id);

        $this->render('music/detail', ['song' => $song, 'links' => $links, 'reviews' => $reviews]);
    }
}
