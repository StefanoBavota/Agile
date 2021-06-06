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

$userId = $loggedInUser->id;
$email = $emailUsm->getEmailById($userId)[0]['email'];
$calendarEvent = $eventMgr->getCurrentRegisterEvent($email);

if (isset($_POST['filtra'])) {

    //$posti = htmlspecialchars(trim($_POST['posti']));
    $mese = htmlspecialchars(trim($_POST['mese']));
    $anno = htmlspecialchars(trim($_POST['anno']));

    $calendarEvent = $eventMgr->filterCalendar($email, $anno, $mese);
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('calendar.html', [
    'calendarEvent' => $calendarEvent
]);
