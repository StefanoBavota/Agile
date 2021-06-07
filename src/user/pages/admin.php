<?php
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$userMgr = new UserManager();

if (isset($_POST['delete'])) {
    $id = trim($_POST['id']);
    $userMgr->delete($id);
}

$users = $userMgr->getAllUser();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('admin.html', [
    'users' => $users,
    'alertMsg' => $alertMsg
]);