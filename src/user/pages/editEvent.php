<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$eventMgr = new Event();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $event = $eventMgr->getEventById($id)[0];
}

if (isset($_POST['edit'])) {

    $img = htmlspecialchars(trim($_POST['img']));
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $data = $_POST['data'];
    $posti = htmlspecialchars(trim($_POST['posti']));

    if ($img != '' && $name != '' && $description != '' && $data != '' && $posti != '') {

        $result = $eventMgr->editEvent($id, $img, $name, $description, $data, $posti);

        echo '<script>location.href="' . ROOT_URL . 'user?page=event"</script>';
        exit;
    } else {
        $alertMsg = 'mandatory_fields';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('editEvent.html', [
    'event' => $event
]);
