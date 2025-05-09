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
    <?php include Env::ROOT.'/head-data.php'; ?>
    <?= $page->renderSection('sectionTitle'); ?>
</head>

<body>
    <header>
        <ul>
            <h1 class="accent-100">XLMaxxing</h1>
            <!-- <li>
                <a href="/">Spreadsheets</a>
            </li> -->
        </ul>
    </header>

    <main>
        <?= $page->renderSection('sectionMain'); ?>
    </main>
</body>

</html>