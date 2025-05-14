<?php
$xlfile = DatabaseOperations::select('xlfile_by_id', ['id' => $id])[0];
$page->passProps([
    'xlfile' => $xlfile,
]);
?>

<?php function sectionTitle($props) { 
    $xlfile = $props['xlfile'];
    ?>

    <title>XLFile &mdash; <?= $xlfile['name']; ?></title>
<?php } ?>


<?php function sectionMain($props) {
    $xlfile = $props['xlfile'];
    ?>
    
    <h1><?= $xlfile['name']; ?></h1>
    <p><?= $xlfile['description']; ?></p>

    <?php
    $spreadsheetsPath = Env::ROOT."/asset/spreadsheets/{$xlfile['id']}";
    $spreadsheets = glob("$spreadsheetsPath.{ods,csv,xls,xlsx,gsheet,xlsb,xlsm,xlt,xltx,numbers}", GLOB_BRACE);
    ?>

    <?php foreach ($spreadsheets as $spreadsheet): ?>
        <?php $spreadsheetExtension = explode('.', basename($spreadsheet))[1]; ?>
        <a
            href="/asset/spreadsheets/<?= basename($spreadsheet); ?>"
            download="<?= $xlfile['name']; ?>.<?= $spreadsheetExtension; ?>"
        >
        Download <?= "{$xlfile['name']}.$spreadsheetExtension"; ?>
        </a>
    <?php endforeach; ?>
<?php } ?>