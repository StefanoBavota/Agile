<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;
use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$errMsg = '';

if ($loggedInUser) {
    echo '<script>location.href="' . ROOT_URL . 'public"</script>';
    exit;
}

$eventMgr = new Event();

if (isset($_POST['register'])) {

    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
    $musicType = htmlspecialchars(trim($_POST['musicType']));

    $userMgr = new UserManager();
    if ($userMgr->passwordMatch($password, $confirm_password)) {
        $result = $userMgr->register($nome, $cognome, $email, $password, $musicType);

        if ($result > 0) {
            echo '<script>location.href="' . ROOT_URL . 'auth?page=login"</script>';
            exit;
        } else {
            $errMsg = 'Mail già utilizzata...';
        }
    } else {
        $errMsg = "Le password non corrsipondono...";
    }
}

$musicTypes = $eventMgr->getAllMusicType();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('register.html', [
    'musicTypes' => $musicTypes
]);
