<?php

require_once __DIR__ . '/../../classes/Event.php';
require_once __DIR__ . '/../../classes/UserManager.php';
use App\Classes\Event;
use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

require_once(AUTOLOAD_PATH);



$eventMgr = new Event();
$User = new UserManager();
$userId = $loggedInUser->id;
$errMsg = '';


$events = $eventMgr->getFeaturedEvents();

$music = $User->getMusicTypeById($userId)[0]['music_type_id'];
$SuggestedEvents = $eventMgr->getUserMusicType($music);


$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render(
    'carousel.html', ['events' => $events,'suggestedEvents'  => $SuggestedEvents]);
