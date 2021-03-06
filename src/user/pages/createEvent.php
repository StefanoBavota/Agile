<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$errMsg = '';
$userId = $loggedInUser->id;
$eventMgr = new Event();

if (isset($_POST['create'])) {

    $img = htmlspecialchars(trim($_POST['img']));
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $data = $_POST['data'];
    $posti = htmlspecialchars(trim($_POST['posti']));
    $musicType = htmlspecialchars(trim($_POST['musicType']));

    $result = $eventMgr->createEvent($img, $name, $description, $data, $posti, $userId, $musicType);

    echo '<script>location.href="' . ROOT_URL . 'public"</script>';
}

$musicTypes = $eventMgr->getAllMusicType();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('createEvent.html', [
    'musicTypes' => $musicTypes
]);
