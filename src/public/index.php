<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "homepage";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<?php if ($page == 'homepage') : ?>
    <?php include ROOT_PATH . 'public/pages/carousel.php' ?>
<?php endif; ?>

<div id="main" class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <?php if ($page == 'homepage' and $loggedInUser) : ?>
            <?php include ROOT_PATH . 'public/pages/suggest.php' ?>
        <?php endif; ?>

        <?php if (!$loggedInUser or $page == 'allEvent') : ?>
            <div class="col-md-12 col-xs-12">
        <?php else : ?>
            <div class="col-md-8 col-xs-12 mt-5">
        <?php endif; ?>
            <?php include ROOT_PATH . 'public/pages/' . $page . '.php' ?>
        </div>

        <?php if ($loggedInUser and $page == 'homepage') : ?>
            <?php include ROOT_PATH . 'public/template-parts/sidebar.php' ?>
        <?php endif; ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>