<?php

require_once __DIR__ . '/../../classes/Event.php';
use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$userId = $loggedInUser->id;
$eventMgr = new Event();

//paginazione
$pagination = 0;
if (isset($_GET['pagination'])) {
    $pagination = intval($_GET['pagination']);
}
//end

if (isset($_POST['remove'])) {

    $eventId = htmlspecialchars(trim($_POST['id']));
    $eventMgr->deleteEvent($eventId);
    $alertMsg = 'deleted';
}

$events = $eventMgr->eventByUserId($userId, $pagination);

//paginazione
$pagesNumber = $eventMgr->countEventPages($userId);
$pagesNumbersList = array();
for($pageNumber = 0; $pageNumber < $pagesNumber; $pageNumber++) {
    array_push($pagesNumbersList, $pageNumber);
}
//end

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('event.html', [
    'events' => $events,
    'pagesNumber' => $pagesNumbersList
]);