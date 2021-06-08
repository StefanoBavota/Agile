<!-- <?php

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
$userMgr = new Event();
$userMgr = new UserManager();

if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $eventId = htmlspecialchars($id);
}

if (isset($_SESSION['user'])) {
    $userId = $loggedInUser->id;
    $id = $userMgr->getUserById($id)[0]['id'];
   
}

$user = $userMgr->getUserById($id)[0];

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('viewUser.html', [
    'event' => $event,
    'loggedInUser' => $loggedInUser,
]);

/*<?php

require_once __DIR__ . '/../../classes/Event.php';
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\Event;
use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$userMgr = new UserManager();

//lettura dati
if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    //$user = $userMgr->get($id);
}

//aggiornamento dati
if (isset($_POST['update'])) {

    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $email = trim($_POST['email']);
    $user_type_id = trim($_POST['user_type_id']);
    $id = trim($_POST['id']);

    if ($id != '' && $id != '0' && $nome != '' && $cognome != '' && $email != '' && $user_type_id != '') {

        $numUpdated = $userMgr->update(new User($id, $nome, $cognome, $email, $user_type_id), $id);

        if ($numUpdated > 0) {
            echo "<script>location.href='" . ROOT_URL . "user?page=admin&msg=updated';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('viewAdmin.html', [
    'alertMsg' => $alertMsg,
    //'user' => $user
]);