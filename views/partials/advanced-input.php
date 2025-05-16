<div class="advanced-input-wrapper">
    <label for="<?= $name; ?>" class="input-descriptor"><?= $placeholderText; ?></label>
    <input
        type="<?= $type; ?>" name="<?= $name; ?>" id="<?= $name; ?>"

        placeholder="<?= $placeholderText; ?>"
        onfocus="this.placeholder=''"
        onblur="this.placeholder='<?= $placeholderText; ?>'"
    >
</div>