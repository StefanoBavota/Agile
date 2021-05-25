<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$eventMgr = new Event();

//if (isset($_GET['id'])) {$id = trim($_GET['id']);}
$event = $eventMgr->getEventById(12)[0];

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('viewEvent.html', [
    'event' => $event
    //'loggedInUser' => $loggedInUser
]);
