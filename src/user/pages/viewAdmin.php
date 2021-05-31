<?php

require_once __DIR__ . '/../../classes/Event.php';
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\Event;
use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$userMgr = new UserManager;

if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
}

$user = $userMgr->getUserById($id);

if (isset($_POST['update'])) {

    $id = trim($_POST['id']);
    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $user_type_id = htmlspecialchars(trim($_POST['user_type_id']));

    if ($id != '' && $id != '0' && $nome != '' && $cognome != '' && $email != '' && $user_type_id != '') {

        $user = $userMgr->updateUserType($id, $nome, $cognome, $email, $user_type_id);

        if ($user > 0) {
            echo "<script>location.href='" . ROOT_URL . "user?page=admin&msg=updatedUserType';</script>";
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
    'user' => $user,
]);
