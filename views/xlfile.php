<?php
$xlfile = DatabaseOperations::select('xlfile_by_id', ['id' => $id])[0];
$xlfileLanguage =
    DatabaseOperations::select('language_by_shortcode', ['shortcode' => $xlfile['language']])[0];
$supportedSoftware = DatabaseOperations::select('software_by_id', ['id' => $xlfile['supported_software']])[0];

$page->passProps(
    compact(
        'xlfile',
        'xlfileLanguage',
        'supportedSoftware'
    )
);
?>

<?php function sectionTitle($props) { 
    $xlfile = $props['xlfile'];
    ?>

    <title>XLFile &mdash; <?= $xlfile['name'] ?></title>
<?php } ?>


<?php function sectionMain($props) {
    $xlfile = $props['xlfile'];
    ?>
    
    <div class="container">
        <div class="spacer"></div>
        
        <?php $screenshots = glob(Env::ROOT."/assets/img/xlfiles/{$xlfile['id']}/screenshot_*.{png}", GLOB_BRACE); ?>
        <div class="xlfile-screenshot-container <?= count($screenshots) > 0 ? 'xlfile-screenshot-container-mask' : '' ?>">
            <img class="screenshot screenshot-big" src="/assets/img/xlfiles/<?= $xlfile['id'] ?>/thumbnail.png" alt="">
            
            <?php if (count($screenshots) > 0): ?>
                <?php foreach ($screenshots as $screenshot): ?>
                    <img class="screenshot" src="/assets/img/xlfiles/<?= $xlfile['id'] ?>/<?= basename($screenshot) ?>" alt="">
                <?php endforeach ?>

                <!-- Prevents bottom image from fading out -->
                <div class="spacer-big"></div>
            <?php endif ?>
        </div>

        <div class="xlfile-info-container">
            <h1><?= $xlfile['name'] ?></h1>
        
            <?= renderPartial('subtext-xlfile-info', [
                'props' => $props,
                'compactView' => false,
            ]) ?>
            
            <?php if (isset($xlfile['description'])): ?>
                <h3><?= tl('Description') ?></h3>
                <p><span class="gray-text">└</span> <?= $xlfile['description'] ?></p>
            <?php endif ?>

            <?php if (isset($xlfile['instructions'])): ?>
                <h3><?= tl('Usage instructions') ?></h3>
                <p><span class="gray-text">└</span> <?= $xlfile['instructions'] ?></p>
            <?php endif ?>
            
            <?php
            $spreadsheetsPath = Env::ROOT."/assets/spreadsheets/{$xlfile['id']}";
            $spreadsheets = glob("$spreadsheetsPath.{ods,csv,xls,xlsx,gsheet,xlsb,xlsm,xlt,xltx,numbers}", GLOB_BRACE);
            ?>

            <?php foreach ($spreadsheets as $spreadsheet): ?>
                <?php $spreadsheetExtension = explode('.', basename($spreadsheet))[1] ?>
                <a
                    href="/assets/spreadsheets/<?= basename($spreadsheet) ?>"
                    download="<?= $xlfile['name'] ?>.<?= $spreadsheetExtension ?>"
                    class="button"
                >
                Download <b><?= "{$xlfile['name']}.$spreadsheetExtension" ?></b>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php } ?>