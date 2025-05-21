<?php
$tags = DatabaseOperations::select('search_tags');
?>

<form action="/search-xlfiles" method="post">
    <?php foreach ($tags as $tag):
        $tagName = $tag['name'];
        ?>
        <div class="checkbox">
            <input type="checkbox" name="<?= $tagName ?>" id="<?= $tagName ?>">
            <label for="<?= $tagName ?>"><?= $tagName ?></label>
        </div>
    <?php endforeach ?>
</form>