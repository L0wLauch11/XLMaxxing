<div class="advanced-input-wrapper">
    <label for="<?= $name ?>" class="input-descriptor"><?= tl($placeholderText) ?></label>
    <input
        type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>"

        placeholder="<?= tl($placeholderText) ?>"
        onfocus="this.placeholder=''"
        onblur="this.placeholder='<?= tl($placeholderText) ?>'"
    >
</div>