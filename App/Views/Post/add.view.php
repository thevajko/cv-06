<?php
/** @var array $data */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('root');
?>

<div class="container mt-4">
    <h2>Pridať príspevok</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $link->url('post.add') ?>">
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" class="form-control" rows="5"><?= htmlspecialchars($old['text'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (isset($errors['text'])): ?>
                <div class="text-danger small"><?= htmlspecialchars($errors['text'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">URL obrázka</label>
            <input id="picture" name="picture" type="text" class="form-control" value="<?= htmlspecialchars($old['picture'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errors['picture'])): ?>
                <div class="text-danger small"><?= htmlspecialchars($errors['picture'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
        </div>

        <div class="text-end">
            <button class="btn btn-primary" type="submit">Uložiť</button>
        </div>
    </form>
</div>
