<?php

require_once __DIR__ . '/../../classes/Event.php';

use App\Classes\Event;
use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$userId = $loggedInUser->id;

$userMgr = new UserManager;
$eventMgr = new Event;

$user = $userMgr->getUserById($userId);
$musicTypes = $eventMgr->getAllMusicType();

if (isset($_POST['update'])) {

    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $musicType = htmlspecialchars(trim($_POST['musicType']));

    $user = $userMgr->updateUser($userId, $nome, $cognome, $email, $musicType);
    
    echo '<script>location.href="' . ROOT_URL . 'public"</script>';
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('profile.html', [
    'user' => $user,
    'musicTypes' => $musicTypes
]);