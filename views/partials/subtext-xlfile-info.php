<?php
$xlfileLanguage = $props['xlfileLanguage'];
$supportedSoftware = $props['supportedSoftware'];

$compactViewClass = $compactView ? ' subtext-compact' : '';
?>

<p class="subtext<?= $compactViewClass; ?>">
    <img class="subtext-icon<?= $compactViewClass; ?>" src="/assets/img/icons/language.svg" alt="" srcset="">
    <?= $xlfileLanguage['name']; ?>
    &middot;
    <span class="<?= $compactViewClass; ?>">
        <img class="subtext-icon<?= $compactViewClass; ?>" src="/assets/img/icons/document.svg" alt="" srcset="">
        <?= $supportedSoftware['name']; ?>
    </span>
</p>