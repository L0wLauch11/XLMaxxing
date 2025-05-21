<?php
global $auth;

if (!isset($pageName)) {
    $pageName = 'index';
}

// `$page` needs to be accessible in `$pageName.php`
$page = new Page();

// File names are case insensitive in PHP thankfully...
require_once Env::ROOT."/views/$pageName.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= renderPartial('head-data') ?>
    <?= $page->renderSection('sectionTitle') ?>
</head>

<body>
    <header>
        <ul>
            <li><a href="/" style="text-decoration: none;"><h1>XLMaxxing</h1></a></li>
            <li>
                <form class="search-bar" action="/search" method="post">
                    <input class="input" type="text" name="search" id="search" placeholder="<?= tl('Search') ?>">
                </form>
            </li>

            <li>
                <?php if ($auth->isLoggedIn()): ?>
                    <a class="button" href="/auth/logout"><?= tl('Welcome') ?>, <b><?= $auth->getUsername() ?></b></a>
                <?php else: ?>
                    <a class="login button" href="/login">
                        <img src="/assets/img/icons/key.svg" alt="">&nbsp;<span><?= tl('Login') ?></span>
                    </a>
                <?php endif ?>
            </li>
        </ul>
    </header>

    <main>
        <?= $page->renderSection('sectionMain') ?>
    </main>
</body>

</html>