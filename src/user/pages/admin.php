<?php
require_once __DIR__ . '/../../classes/UserManager.php';

use App\Classes\UserManager;

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $alertMsg;
$userMgr = new UserManager();

//paginazione
$pagination = 0;
if (isset($_GET['pagination'])) {
    $pagination = intval($_GET['pagination']);
}
//end

if (isset($_POST['delete'])) {
    $id = trim($_POST['id']);
    $userMgr->delete($id);
}

$users = $userMgr->getAllUser($pagination);

//paginazione
$pagesNumber = $userMgr->countAdminPages();
$pagesNumbersList = array();
for($pageNumber = 0; $pageNumber < $pagesNumber; $pageNumber++) {
    array_push($pagesNumbersList, $pageNumber);
}
//end

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('admin.html', [
    'users' => $users,
    'alertMsg' => $alertMsg,
    'pagesNumber' => $pagesNumbersList
]);