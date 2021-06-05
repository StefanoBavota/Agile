<?php

include 'ICS.php';

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=invite.ics');

require_once __DIR__ . '/Event.php';
require_once __DIR__ . '/UserManager.php';
require_once __DIR__ . '../../inc/init.php';

use App\Classes\Event;
use App\Classes\UserManager;

$eventMgr = new Event();
$emailUsm = new UserManager();
$userId = $loggedInUser->id;
$email = $emailUsm->getEmailById($userId)[0]['email'];
$calendarEventsList = $eventMgr->getCurrentRegisterEvent($email);

$icsEvents = array();
$outputIcs = "";
foreach ($calendarEventsList as $event) {
    $currentIcs = new ICS([]);
    $currentIcs->set('location', $event['name']);
    $currentIcs->set('description', $event['description']);
    $currentIcs->set('dtstart', $event['data']);
    $currentIcs->set('dtend', $event['data']);
    $currentIcs->set('summary', $event['name']);

    array_push($icsEvents, $currentIcs);
}

foreach ($icsEvents as $icsEvent) {
    echo $icsEvent->to_string();
    echo "\n";
}