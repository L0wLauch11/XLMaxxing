<?php
$xlfile = DatabaseOperations::select('xlfile_by_id', ['id' => $id])[0];
$page->passProps([
    'xlfile' => $xlfile,
]);
?>

<?php function sectionTitle($props) { ?>
    <title>XLFile &mdash; <?= $props['xlfile']['name']; ?></title>
<?php } ?>


<?php function sectionMain($props) { ?>
   
<?php } ?>