<?php

/**
 * Renders a partial view from `views/partials/`
 */
function renderPartial(string $partialName, array $passedVariables = []): string {
    ob_start();
    
    extract($passedVariables);
    include "views/partials/$partialName.php";
    $output = ob_get_contents();

    ob_end_clean();

    return $output;
}