<?php function sectionTitle() { ?>
    <title>XLMaxxing</title>
<?php } ?>

<?php function sectionMain() {
    $loginCallback = $_GET['login_callback'] ?? '';
    ?>
    
    <?= renderPartial('login-callback', [
        'loginCallback' => $loginCallback,
        'checkMatches' => ['success']
    ]) ?>

    <div class="xlfiles-grid">
        <?php $xlfiles = DatabaseOperations::select('xlfiles') ?>
        <?php foreach ($xlfiles as $xlfile): ?>
            <a class="xlfiles-grid-entry" href="/xlfile/<?= $xlfile['id'] ?>">
                <img class="xlfiles-grid-entry-thumbnail" src="/assets/img/xlfiles/<?= $xlfile['id'] ?>/thumbnail.png">
                <div class="subtext-info-container-index">
                    <?= renderPartial('subtext-xlfile-info', [
                        'compactView' => true,
                        'props' => [
                            'xlfileLanguage' => DatabaseOperations::select('language_by_shortcode', ['shortcode' => $xlfile['language']])[0],
                            'supportedSoftware' => DatabaseOperations::select('software_by_id', ['id' => $xlfile['supported_software']])[0],
                        ]
                    ]) ?>
                </div>
                <p class="xlfiles-grid-text">
                    <span class="xlfiles-grid-name"><?= $xlfile['name'] ?></span>
                    <span class="xlfiles-grid-description"><?= $xlfile['description'] ?></span>
                </p>
            </a>
        <?php endforeach ?>
    </div>
<?php } ?>