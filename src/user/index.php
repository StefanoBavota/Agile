<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "createEvent";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id="main" class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <?php if ($page == 'createEvent' or $page == 'viewAdmin' or $page == 'profile') : ?>
            <div class="col-6">
        <?php else : ?>
            <div class="col-md-12 col-xs-12">
        <?php endif; ?>

            <?php include ROOT_PATH . 'user/pages/' . $page . '.php' ?>

            </div>

        </div>
    </div>

    <?php include ROOT_PATH . 'public/template-parts/footer.php' ?>