<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

global $loggedInUser;

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('header.html', [
    'loggedInUser' => $loggedInUser
]);
