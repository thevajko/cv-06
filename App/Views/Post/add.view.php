<?php
/** @var array $data */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('root');
?>

<div class="container mt-4">
    <?php if (!empty($old['id'])): ?>
        <h2>Edituj príspevok</h2>
    <?php else: ?>
        <h2>Pridať príspevok</h2>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $link->url('post.save') ?>">
        <?php if (!empty($old['id'])): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($old['id'], ENT_QUOTES, 'UTF-8') ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="text" class="form-label"><?= !empty($old['id']) ? 'Upraviť príspevok' : 'Text' ?></label>
            <textarea required id="text" name="text" class="form-control" rows="5"><?= htmlspecialchars($old['text'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (isset($errors['text'])): ?>
                <div class="text-danger small"><?= htmlspecialchars($errors['text'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">URL obrázka</label>
            <input required id="picture" name="picture" type="url" class="form-control" value="<?= htmlspecialchars($old['picture'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errors['picture'])): ?>
                <div class="text-danger small"><?= htmlspecialchars($errors['picture'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
        </div>

        <div class="text-end">
            <button class="btn btn-primary" type="submit">Uložiť</button>
        </div>
    </form>
</div>
