<?php 

require_once __DIR__ . '/../../classes/Event.php';
use App\Classes\Event;

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$eventMgr = new Event();
$userId = $loggedInUser->id;
$events = $eventMgr->getCurrentUserFavorites($userId);
$errorMessage = null;


if (isset($_POST['remove_fav'])) {
    $eventId = htmlspecialchars(trim($_POST['id']));
   
    $eventMgr->delete_favorite($eventId,$userId);
}

if (isset($user)) {
    $favoriteEvent = $eventMgr->getCurrentUserFavorites($user->id);
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('favoriteEvent.html', [
    'favoriteEvent' => $favoriteEvent
]);
