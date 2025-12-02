<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/Artist.php';
require_once __DIR__ . '/../model/Song.php';

class ArtistController extends Controller
{
    public function profile($id = null)
    {
        $id = intval($id);
        $artistModel = new Artist();
        $artist = $artistModel->find($id);
        if (!$artist) {
            echo 'Artist not found';
            return;
        }
        $songModel = new Song();
        $songs = $songModel->getByArtist($id);
        $this->render('artist/profile', ['artist' => $artist, 'songs' => $songs]);
    }
}
