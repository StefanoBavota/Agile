<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$eventMgr = new Event();
global $alertMsg;
$userId = $loggedInUser->id;


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

if (isset($_POST['remove'])) {
    $eventId = htmlspecialchars(trim($_POST['id']));
    $eventMgr->delete_favorite($eventId, $userId);
}

if (isset($loggedInUser)) {
    $favoriteEvent = $eventMgr->getCurrentUserFavorites($userId);

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader, []);

    echo $twig->render('sidebar.html', [
        'favoriteEvent' => $favoriteEvent,
        'loggedInUser' => $loggedInUser
    ]);
}
