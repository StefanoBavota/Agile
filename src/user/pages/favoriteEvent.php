<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$eventMgr = new Event();
global $alertMsg;
$userId = $loggedInUser->id;

//paginazione
$pagination = 0;
if (isset($_GET['pagination'])) {
    $pagination = intval($_GET['pagination']);
}
//end

if (isset($_POST['remove_fav'])) {
    $eventId = htmlspecialchars(trim($_POST['id']));
    $eventMgr->delete_favorite($eventId, $userId);
}

$favoriteEvent = $eventMgr->getCurrentUserFavorites($userId, $pagination);

//paginazione
$pagesNumber = $eventMgr->countEventFavoritesPages();
$pagesNumbersList = array();
for($pageNumber = 0; $pageNumber < $pagesNumber; $pageNumber++) {
    array_push($pagesNumbersList, $pageNumber);
}
//end

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('favoriteEvent.html', [
    'favoriteEvent' => $favoriteEvent,
    'pagesNumber' => $pagesNumbersList
]);
