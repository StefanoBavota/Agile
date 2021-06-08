<?php

require_once __DIR__ . '/../../classes/Event.php';
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\Event;
use App\Classes\UserManager;

require_once(AUTOLOAD_PATH);

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$eventMgr = new Event();
$emailUsm = new UserManager();
global $alertMsg;

//paginazione
$pagination = 0;
if (isset($_GET['pagination'])) {
    $pagination = intval($_GET['pagination']);
}
//end

$userId = $loggedInUser->id;

$email = $emailUsm->getEmailById($userId)[0]['email'];

$historicEvent = $eventMgr->getCurrentHistoricEvent($email, $pagination);

//paginazione
$pagesNumber = $eventMgr->countHistoricPages($email);
$pagesNumbersList = array();
for($pageNumber = 0; $pageNumber < $pagesNumber; $pageNumber++) {
    array_push($pagesNumbersList, $pageNumber);
}
//end

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('historicEvent.html', [
    'historicEvent' => $historicEvent,
    'pagesNumber' => $pagesNumbersList
]);