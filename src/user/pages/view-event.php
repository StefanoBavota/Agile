
<?php

require_once __DIR__ . '/../../classes/Event.php';
use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

//$userId = $loggedInUser->id;
$eventMgr = new Event();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

if (!isset($_GET['id'])) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

$id = htmlspecialchars(trim($_GET['id']));
//$pm = new Event();
//$event = $pm->getEvent($id)[0];
//$events = $eventMgr->eventByUserId($userId);
//$events = $eventMgr->eventById($id);
$events = $eventMgr->getEventById($id);

echo $twig->render('view-event.html', [
    'events' => $events
    //'loggedInUser' => $loggedInUser
]);


