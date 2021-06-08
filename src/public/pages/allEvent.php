<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$eventMgr = new Event();
$errMsg = '';

//paginazione
$pagination = 0;
if (isset($_GET['pagination'])) {
    $pagination = intval($_GET['pagination']);
}
//funzione che da gli eventi con il limite
$events = $eventMgr->getEventHomepagePaginated($pagination);
//end 

if (isset($_POST['addToFavourite'])) {
    $userId = $loggedInUser->id;
    $eventId = htmlspecialchars(trim($_POST['id']));
    $addToFavoriteOutcome = $eventMgr->addToFavoriteList($eventId, $userId);

    if (isset($addToFavoriteOutcome)) {
        $errMsg = "errore";
    }
}

//paginazione
$pagesNumber = $eventMgr->countEventHomepagePages();
$pagesNumbersList = array();
for($pageNumber = 0; $pageNumber < $pagesNumber; $pageNumber++) {
    array_push($pagesNumbersList, $pageNumber);
}
//end

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('allEvent.html', [
    'events' => $events,
    'loggedInUser' => $loggedInUser,
    'pagesNumber' => $pagesNumbersList
]);