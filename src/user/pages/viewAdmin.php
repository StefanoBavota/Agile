<?php

require_once __DIR__ . '/../../classes/UserManager.php';

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

$user = $userMgr->getUserByIdNoMusic($id)[0];

if (isset($_POST['update'])) {

    $userId = htmlspecialchars(trim($_POST['userId']));
    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $user_type_id = htmlspecialchars(trim($_POST['user_type_id']));

    $user = $userMgr->updateUserType($userId, $nome, $cognome, $email, $user_type_id);

    echo "<script>location.href='" . ROOT_URL . "user?page=admin&msg=updatedUserType';</script>";
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('viewAdmin.html', [
    'user' => $user,
]);
