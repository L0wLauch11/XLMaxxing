<!DOCTYPE html>
<html lang="en">

<?php

if (!isset($pageName)) {
    $pageName = 'index';
}

// `$page` needs to be accessible in `$pageName.php`
$page = new Page();

// File names are case insensitive in PHP thankfully...
require_once Env::ROOT."/views/$pageName.php";

?>

<head>
    <?= renderPartial('head-data'); ?>
    <?= $page->renderSection('sectionTitle'); ?>
</head>

<body>
    <header>
        <ul>
            <a href="/" style="text-decoration: none;"><h1>XLMaxxing</h1></a>
            <a href="/login"></a>
        </ul>
    </header>

    <main>
        <?= $page->renderSection('sectionMain'); ?>
    </main>
</body>

</html>