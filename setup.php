<?php

require_once 'Env.class.php';
require_once 'database/operations/DatabaseOperations.class.php';
require_once 'views/templates/Page.class.php';
require_once 'vendor/autoload.php';
require_once 'util.php';

$databaseMeta = glob("database/meta/.{class.php}", GLOB_BRACE);
foreach ($databaseMeta as $databaseMetaItem) {
    require_once $databaseMetaItem;
}