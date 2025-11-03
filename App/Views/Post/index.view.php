<?php
/** @var array $posts */
/** @var Framework\Support\LinkGenerator $link */
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Príspevky</h1>
        <a class="btn btn-success" href="<?= $link->url('post.add') ?>">Pridať príspevok</a>
    </div>

    <?php if (empty($posts)) : ?>
        <p>Žiadne príspevky.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <?php include __DIR__ . '/../../../snippets/post.snippet.view.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
