<?php /* This file should be included in every page */ ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
$stylesheetsCascading = [
    'theme',
    'accents',
    'main',
    'header',
    'xlfiles-grid',
    'subtext'
];
?>

<?php foreach ($stylesheetsCascading as $stylesheet): ?>
    <link rel="stylesheet" href="/assets/styles/<?= $stylesheet; ?>.css">
<?php endforeach; ?>