<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "login";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id="main" class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div class="col-5">

            <?php include ROOT_PATH . 'auth/pages/' . $page . '.php' ?>

        </div>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>