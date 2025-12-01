<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../model/Review.php';
require_once __DIR__ . '/../model/Song.php';

class ReviewController extends Controller
{
    // Show reviews for a song
    public function index($songId = null)
    {
        $songId = intval($songId);
        $songModel = new Song();
        // song model uses find()
        $song = $songModel->find($songId);
        if (!$song) {
            echo 'Song not found';
            return;
        }
        $reviewModel = new Review();
        $reviews = $reviewModel->getBySong($songId);
        $this->render('review/index', ['song' => $song, 'reviews' => $reviews, 'count' => count($reviews)]);
    }

    // Show form to create a review
    public function create($songId = null)
    {
        $songId = intval($songId);
        $this->render('review/form', ['song_id' => $songId]);
    }

    // Store review (simple, requires user session)
    public function store()
    {
        session_start();
        if (empty($_SESSION['user'])) {
            header('Location: ?r=user/login'); exit;
        }
        $user = $_SESSION['user'];
        $song_id = intval($_POST['song_id'] ?? 0);
        $content = trim($_POST['content'] ?? '');
        $rating = intval($_POST['rating'] ?? 0);
        $reviewModel = new Review();
        // create() may be implemented on model; if not, ensure it exists
        if (method_exists($reviewModel, 'create')) {
            $reviewModel->create($song_id, $user['id'], $content, $rating);
        }
        header('Location: ?r=review/index/'.$song_id); exit;
    }
}
