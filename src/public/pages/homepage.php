<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$eventMgr = new Event();
$errorMessage = null;
$userId = $loggedInUser->id;

$events = $eventMgr->getAllEvent();

if (isset($_POST['addToFavourite'])) {
    $eventId = htmlspecialchars(trim($_POST['id']));
    $addToFavoriteOutcome = $eventMgr->addToFavoriteList($eventId, $userId);

    if (isset($addToFavoriteOutcome)) {
        print_r("tonno");
        die();
        $errorMessage = $addToFavoriteOutcome['error'];
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('homepage.html', [
    'events' => $events,
]);
