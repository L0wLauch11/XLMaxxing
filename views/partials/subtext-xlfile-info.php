<?php
$xlfileLanguage = $props['xlfileLanguage'];
$supportedSoftware = $props['supportedSoftware'];
?>

<p class="subtext">
    <img class="subtext-icon" src="/assets/img/icons/language.svg" alt="" srcset="">
    <?= $xlfileLanguage['name']; ?>
    &middot;
    <?= $supportedSoftware['free'] ? '<span class="accent-100">' : '<span>'; ?>
        <?= $supportedSoftware['name']; ?>
    </span>
</p>