<?php
/** @var array $values */
/** @var array $errors */
/** @var Framework\Support\LinkGenerator $link */
?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?= $link->url('post.save') ?>">
    <label for="picture" class="form-label">URL obrázka</label>
    <div class="input-group mb-3 has-validation">
        <input type="text" class="form-control" name="picture" id="picture" value="<?= htmlspecialchars($values['picture'] ?? '') ?>">
    </div>

    <label for="post-text" class="form-label">Text príspevku</label>
    <div class="input-group has-validation mb-3">
        <textarea class="form-control" name="text" id="post-text"><?= htmlspecialchars($values['text'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Uložiť</button>
</form>

