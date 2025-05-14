<?php function sectionTitle() { ?>
    <title>XLMaxxing</title>
<?php } ?>


<?php function sectionMain() { ?>
    <div class="xlfiles-grid">
        <?php $xlfiles = DatabaseOperations::select('xlfiles'); ?>
        <?php foreach ($xlfiles as $xlfile): ?>
            <a class="xlfiles-grid-entry" href="/xlfile/<?= $xlfile['id'] ?>">
                <img class="xlfiles-grid-entry-thumbnail" src="/asset/img/xlfiles/<?= $xlfile['id']; ?>.png">
                <p class="xlfiles-grid-text">
                    <span class="xlfiles-grid-name"><?= $xlfile['name']; ?></span>
                    <span class="xlfiles-grid-description"><?= $xlfile['description']; ?></span>
                </p>
            </a>
        <?php endforeach; ?>
    </div>
<?php } ?>