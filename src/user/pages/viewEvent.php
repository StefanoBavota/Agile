<?php

require_once __DIR__ . '/../../classes/Event.php';
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\Event;
use App\Classes\UserManager;
use phpDocumentor\Reflection\Types\String_;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$eventMgr = new Event();
$userMgr = new UserManager();

if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $eventId = htmlspecialchars($id);
}

if (isset($_SESSION['user'])) {
    $userId = $loggedInUser->id;
    $email = $userMgr->getEmailById($userId)[0]['email'];
   
}

if (isset($_POST['register'])) {

    if(!$loggedInUser) {
        $emailUns = htmlspecialchars(trim($_POST['email']));
        $addToRegister = $eventMgr->addToRegister($eventId, $emailUns);
    } else {
        $addToRegister = $eventMgr->addToRegister($eventId, $email);
    }

    if (isset($addToRegister)) {
        $errMsg = "errore";
    }
}

if (isset($_POST['comment'])) {
    $answer = htmlspecialchars(trim($_POST['answer']));

    $addToArgument = $eventMgr->addComment($answer, $eventId, $userId);
}

if (isset($_POST['remove'])) {
    $answerId = htmlspecialchars(trim($_POST['id']));

    $eventMgr->deleteComment($answerId);
}

$allAnswer = $eventMgr->getCommentByEventId($eventId);
$event = $eventMgr->getEventById($id)[0];

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('viewEvent.html', [
    'event' => $event,
    'loggedInUser' => $loggedInUser,
    'allAnswer' => $allAnswer
]);
