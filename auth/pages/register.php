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

?>

<div class="mt-4">
    <h2>Registrazione</h2>
</div>

<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="cognome">Cognome</label>
        <input name="cognome" id="cognome" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Conferma Password</label>
        <input name="confirm_password" id="confirm_password" type="password" class="form-control" required>
    </div>

    <button class="btn btn-primary mb-5 mt-3" type="submit" name="register">Register</button>
</form>

Hai già un account? <a class="underline scuro" href="<?php echo ROOT_URL; ?>auth?page=login">Effettua il Login! &raquo;</a>