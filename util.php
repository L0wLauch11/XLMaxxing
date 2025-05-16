<?php

function renderPartial(string $partialName, array $passedVariables = []) {
    ob_start();
    
    extract($passedVariables);
    include "views/partials/$partialName.php";
    $output = ob_get_contents();

    ob_end_clean();

    return $output;
}