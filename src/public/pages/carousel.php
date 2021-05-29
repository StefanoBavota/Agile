<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once(AUTOLOAD_PATH);

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('carousel.html', []);
