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
$eventMgr = new Event();
$userMgr = new UserManager();

$users = $userMgr->getAllUser();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('admin.html', [
    'users' => $users,
    'alertMsg' => $alertMsg
]);