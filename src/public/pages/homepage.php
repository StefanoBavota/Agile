<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$eventMgr = new Event();
$errMsg = '';

$events = $eventMgr->getAllEvent();

if (isset($_POST['addToFavourite'])) {
    $userId = $loggedInUser->id;
    $eventId = htmlspecialchars(trim($_POST['id']));
    $addToFavoriteOutcome = $eventMgr->addToFavoriteList($eventId, $userId);

    if (isset($addToFavoriteOutcome)) {
        $errMsg = "errore";
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('homepage.html', [
    'events' => $events,
    'loggedInUser' => $loggedInUser
]);
