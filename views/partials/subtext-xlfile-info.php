<?php
$xlfileLanguage = $props['xlfileLanguage'];
$supportedSoftware = $props['supportedSoftware'];

$compactView ??= false;
$compactViewClass = $compactView ? ' subtext-compact' : '';
?>

<p class="subtext<?= $compactViewClass; ?>">
    <img class="subtext-icon<?= $compactViewClass; ?>" src="/assets/img/icons/language.svg" alt="" srcset="">
    <?= $xlfileLanguage['name']; ?>
    &middot;
    <span class="<?= $compactViewClass; ?>">
        <img class="subtext-icon<?= $compactViewClass; ?>" src="/assets/img/icons/document.svg" alt="" srcset="">
        <?php if ($compactView): ?>
            <?= $supportedSoftware['name']; ?>
        <?php else: ?>
            <a href="<?= $supportedSoftware['url']; ?>">
                <?= $supportedSoftware['name']; ?>
            </a>
        <?php endif; ?>
    </span>
</p>