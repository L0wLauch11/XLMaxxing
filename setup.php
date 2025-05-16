<?php

require_once 'Env.class.php';
require_once 'database/operations/DatabaseOperations.class.php';
require_once 'views/templates/Page.class.php';
require_once 'vendor/autoload.php';

$databaseMeta = glob("database/meta/.{class.php}", GLOB_BRACE);
foreach ($databaseMeta as $databaseMetaItem) {
    require_once $databaseMetaItem;
}

function renderPartial(string $partialName, array $passedVariables = []) {
    ob_start();
    
    extract($passedVariables);
    include "views/partials/$partialName.php";
    $output = ob_get_contents();

    ob_end_clean();

    return $output;
}