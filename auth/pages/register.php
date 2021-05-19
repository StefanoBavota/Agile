<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

if ($loggedInUser) {
    echo '<script>location.href="' . ROOT_URL . 'public"</script>';
    exit;
}

if (isset($_POST['register'])) {

    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    $userMgr = new UserManager();
    if ($userMgr->passwordMatch($password, $confirm_password)) {
        $result = $userMgr->register($nome, $cognome, $email, $password);

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

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('register.html', [
]);