<?php /** @var array $errors */ /** @var \App\Models\Post $post */ /** @var Framework\Support\LinkGenerator $link */ ?>
<div class="container mt-5">
    <h2>Upraviť príspevok</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php include __DIR__ . '/../../../snippets/form.snippet.view.php'; ?>
    <a href="<?= $link->url('post.index') ?>" class="btn btn-secondary mt-3">Späť</a>
</div>

