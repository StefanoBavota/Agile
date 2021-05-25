<?php

require_once __DIR__ . '/../../classes/Event.php';
use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$eventMgr = new Event();

$events = $eventMgr->getAllEvent();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('homepage.html', [
    'events' => $events,
]);