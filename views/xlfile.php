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

    <title>XLFile &mdash; <?= $xlfile['name']; ?></title>
<?php } ?>


<?php function sectionMain($props) {
    $xlfile = $props['xlfile'];
    ?>
    
    <div class="container">
        <h1><?= $xlfile['name']; ?></h1>
        
        <?= renderPartial('subtext-xlfile-info', [
            'props' => $props,
            'compactView' => false,
        ]); ?>
        
        <p><?= $xlfile['description']; ?></p>

        <?php
        $spreadsheetsPath = Env::ROOT."/assets/spreadsheets/{$xlfile['id']}";
        $spreadsheets = glob("$spreadsheetsPath.{ods,csv,xls,xlsx,gsheet,xlsb,xlsm,xlt,xltx,numbers}", GLOB_BRACE);
        ?>

        <?php foreach ($spreadsheets as $spreadsheet): ?>
            <?php $spreadsheetExtension = explode('.', basename($spreadsheet))[1]; ?>
            <a
                href="/assets/spreadsheets/<?= basename($spreadsheet); ?>"
                download="<?= $xlfile['name']; ?>.<?= $spreadsheetExtension; ?>"
                class="button"
            >
            Download <?= "{$xlfile['name']}.$spreadsheetExtension"; ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php } ?>